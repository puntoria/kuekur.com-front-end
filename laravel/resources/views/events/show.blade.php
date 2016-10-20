@extends('layouts.app')

@section('content')

<div class="container" 
     data-module="attend_module" 
     ng-controller="AttendController as attendCtrl" 
     eventId="{{ $event->id }}"
     attended="{{ \Auth::user()->attendedToEvent($event->id) ?true :false }}">
      
    <section id="sort">
        <ul class="nav nav-pills">

            @if (\Auth::check())
                
                @if ( $event->organizer_id == \Auth::user()->id ) 

                    <!-- Logged in user is the organizer -->
                    <a class="btn btn-primary btn-lg" href="{{ url('events/'. $event->id .'/edit') }}">Edit</a>

                @else

                    <button class="btn btn-primary btn-lg" ng-click="attendCtrl.toggleAttend()">
                        <span ng-show="attendCtrl.attended">Unattend</span>
                        <span ng-show="!attendCtrl.attended">Attend</span>
                    </button>

                @endif

            @else
                <button class="btn btn-primary btn-lg">
                    Login to Attend
                </button>
            @endif

        </ul>
    </section>
    <section id="single">
        <div class="col-lg-4 preview">

            @if ( $event->featuredImage )
                <img src="{{ $event->featuredImage->url('single-event-thumb') }}">
            @endif

            <div id="attend">
                <h1>Who is attending</h1>
               
                <ul class="users">
                    <li ng-repeat="user in attendCtrl.attendedUsers">
                        @{{ user.firstname }} @{{ user.lastname }}
                    </li>
                </ul>

                <h2>
                    <span class="total_attendants">@{{ attendCtrl.attendedUsersCount }}</span> students enrolled
                </h2>
            </div>
        </div>
        <div class="col-lg-4 description">
            <h1 class="title">{{ $event->name }}</h1>
            <div id="content">
                {{ $event->description }}
            </div>
        </div>
        <div class="col-lg-4 details">
            <ul class="detail">
                <li class="user">
                    <h1>Organizator</h1>
                    <span class="name">{{ $event->organizer->name }}</span>
                </li>

                <li>
                    <h1>Status</h1>
                    <p>{{ ucfirst( $event->status ) }}</p>
                </li>
                   
                <li> 
                    <h1>Start</h1>
                    <p>{{ $event["start"]->toDayDateTimeString() }}</p>
                </li>

                <li>
                    <h1>End</h1>
                    <p>{{ $event["end"]->toDayDateTimeString() }}</p>
                </li>

                <li>
                    <h1>Location</h1>
                    <p>{{ $event->country->name }}, {{ $event->city->name }}, {{ $event->zip }}</p>
                    <p>{{ $event->address_1 }}</p>
                    <p>{{ $event->address_2 }}</p>
                </li>

                <li>
                    <h1>Category</h1>
                    <p>{{ $event->category->name }}</p>
                </li>

                <li>
                    <h1>Capacity</h1>
                    <p>{{ $event->capacity }}</p>
                </li>

            </ul>
        </div>
    </section>  

</div> <!-- /container -->

@endsection
