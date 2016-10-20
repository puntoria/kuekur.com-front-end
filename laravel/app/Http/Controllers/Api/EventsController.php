<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Event;
use App\Tag;
use App\Http\Requests\EventRequest;
use App\Http\Requests\GetEventRequest;

use App\Traits\Api;

use Chrisbjr\ApiGuard\Http\Controllers\ApiGuardController;

class EventsController extends ApiGuardController
{

	use Api;

	protected $apiMethods = [];

	public function __construct(){
		parent::__construct();

		$this->setUserByApiKey();
	}

	public function getEvents( GetEventRequest $request ){
		return $this->success( Event::filter( $request->all() ) );
	}

	public function getEvent( Event $event, Request $request ){
		return $this->success( $event );
	}

	public function storeEvent( EventRequest $request ){
		$event = Event::store( array_merge($request->all() , [ 'organizer_id' => $this->user->id ]));

		return $this->success( $event );
	}

	public function updateEvent( Event $event, EventRequest $request ){
		$event = $event->updateEvent( $request->except('organizer_id') );

		return $this->success( $event );
	}

}
