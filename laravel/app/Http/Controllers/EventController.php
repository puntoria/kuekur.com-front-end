<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\EventRequest;
use App\Event;
use App\Category;
use App\City;
use App\Country;
use App\MediaFile;

class EventController extends Controller
{

    public function index( Request $request )
    {
        $request['status'] = "upcoming";

        if( \Request::ajax() ){
            $events = Event::filter( $request->all(), ['category', 'country', 'city', 'featured_image'] )->appends( $request->all() );
            return $events;
        }else{
            $events = Event::filter( $request->all() )->appends( $request->all() );
            $categories = Category::lists( true );
            $cities = City::lists( true );
            $countries = Country::lists( true );
        	return view('events.index', compact('events','categories', 'cities', 'countries'));
        }
    }

    public function create()
    {
        $categories = Category::lists();
        $cities = City::lists();
        $countries = Country::lists();

        return view('events.create', compact('categories', 'cities', 'countries') ); 
    }

    public function store(EventRequest $request)
    {
        if( $request->file("featured_image") ){
            $featured_image = MediaFile::createFromUpload( $request->file("featured_image") );
            $request['featured_image_id'] = $featured_image->id;
        }

        $request["organizer_id"] = \Auth::user()->id;
        $event = Event::store( $request->all() );

    	return redirect( 'events/'. $event->id );
    }

    public function edit( Event $event )
    {
        $categories = Category::lists();
        $cities = City::lists();
        $countries = Country::lists();

        return view('events.edit', compact('event', 'categories', 'cities', 'countries') ); 
    }

    public function update( Event $event, Request $request )
    {
        if( $request->file("featured_image") ){
            $featured_image = MediaFile::createFromUpload( $request->file("featured_image") );
            $request['featured_image_id'] = $featured_image->id;
        }

        $event->updateEvent( $request->all() );

        return redirect('events/'. $event->id );
    }


    public function show(Event $event)
    {   
        $attendedUsers = $event->attendedUsers()->limit(5)->get();

    	return view('events.show', compact('event','attendedUsers') );
    }

    public function attend( Event $event, Request $request ){
        \Auth::user()->attend( $event->id );

        return [
            'eventId'=>$event->id, 
            'attended' => true, 
            'users' => $event->attendedUsers
        ];
    }

    public function unattend( Event $event, Request $request ){
        \Auth::user()->unattend( $event->id );

        return [
            'eventId'=>$event->id, 
            'attended' => false, 
            'users' => $event->attendedUsers
        ];
    }
}
