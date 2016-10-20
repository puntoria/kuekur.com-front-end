@extends('layouts.app')

@section('content')

<div class="container" ng-controller="SearchController as searchCtrl" data-module="filters_page">
    <div class="row">
        
        <section class="col-lg-3 sidebar">

            <form method="GET" accept-charset="UTF-8" class="form-horizontal" ng-submit="searchCtrl.filter( true )">
            {{-- Form::open(array('class'=>'form-horizontal',  'url' => '#', 'method'=>'GET', 'ng-submit' => 'searchCtrl.filter()')) --}}
                
                <h3>Search</h3>

                <!-- Name Field -->
                <div class="form-group">
                    {{ Form::label('name', 'Name' , ['class'=>'col-md-4 control-label']) }}

                    <div class="col-md-8">
                        {{ Form::text('name', Request::get('name'), ['class'=>'form-control', 'ng-model' => 'searchCtrl.filters.name']) }}
                    </div>
                </div>

                <h3>Date</h3>

                <!-- Start Field -->
                <div class="form-group">
                    {{ Form::label('start', 'Start' , ['class'=>'col-md-4 control-label']) }}

                    <div class="col-md-8">
                        {{ Form::date('start', Request::get('start'), ['class'=>'form-control', 'ng-model' => 'searchCtrl.filters.start']) }}
                    </div>
                </div>

                <!-- End Field -->
                <div class="form-group">
                    {{ Form::label('end', 'End' , ['class'=>'col-md-4 control-label']) }}

                    <div class="col-md-8">
                        {{ Form::date('end', Request::get('end'), ['class'=>'form-control', 'ng-model' => 'searchCtrl.filters.end']) }}
                    </div>
                </div>


                <h3>Recurring</h3>

                <!-- Recurring Field -->
                <div class="form-group">
                    {{ Form::label('recurring', 'Recurring' , ['class'=>'col-md-4 control-label']) }}

                    <div class="col-md-8">
                        {{ Form::select('recurring', [''=>'All', '1' => 'Recurring', '0' => 'Not Recurring'], Request::get('recurring'), ['class'=>'form-control', 'ng-model' => 'searchCtrl.filters.recurring']) }}
                    </div>
                </div>
                <h3>Category</h3>

                <!-- Category Field -->
                <div class="form-group">
                    {{ Form::label('category', 'Category' , ['class'=>'col-md-4 control-label']) }}

                    <div class="col-md-8">
                        {{ Form::select('category', $categories ,Request::get('category'), ['class'=>'form-control', 'ng-model' => 'searchCtrl.filters.category']) }}
                    </div>
                </div>

                <h3>Location</h3>

                <!-- Country Field -->
                <div class="form-group">
                    {{ Form::label('country', 'Country' , ['class'=>'col-md-4 control-label']) }}

                    <div class="col-md-8">
                        {{ Form::select('country', $countries ,Request::get('country'), ['class'=>'form-control', 'ng-model' => 'searchCtrl.filters.country']) }}
                    </div>
                </div>


                <!-- City Field -->
                <div class="form-group">
                    {{ Form::label('city', 'City' , ['class'=>'col-md-4 control-label']) }}

                    <div class="col-md-8">
                        {{ Form::select('city', $cities ,Request::get('city'), ['class'=>'form-control', 'ng-model' => 'searchCtrl.filters.city']) }}
                    </div>
                </div>

                <button type="submit" class="btn btn-primary pull-right">
                    <i class="fa fa-btn fa-search"></i>Filter
                </button>
                
            </form>
            {{-- Form::close() --}}

        </section>

        <section class="thumbnails col-lg-9 np-l" role="main">
					
            <h3>Events</h3>

            <ul class="list-group">
                
                <article class="col-lg-6 item"  ng-repeat="event in searchCtrl.events">
                    
                    <div class="image_container" ng-hide="event.status != 'ended'">
                      <span class="ended_tag">ENDED</span>
                    </div>

                    <a href="events/@{{ event.id }}">
                        <img ng-src="@{{ event.featured_image.url }}/thumb">
                    </a>

                    <h1><a href="events/@{{ event.id }}">@{{ event.name }}</a></h1>
                    <h3><a href="events/@{{ event.id }}">@{{ event.category.name }}</a></h3>

                    <ul class="details">

                        <!-- <li><?php // echo $time_left; ?></li> -->

                        <li><a href="#">@{{ event.country.name }}, @{{ event.city.name }}</a></li>

                    </ul>
                </article>

                <!-- <li class="list-group-item" ng-repeat="event in searchCtrl.events">
                    <img ng-src="@{{ event.featured_image.url }}/thumb">
                    <a href="events/@{{ event.id }}">
                        <h4>@{{ event.name }} - @{{ event.status }}</h4>
                    </a>
                    <p><strong>@{{ event.start }}</strong> - @{{ event.country.name }}, @{{ event.city.name }}</p>
                    <p>@{{ event.category.name }}</p>
                </li> -->

            </ul>

            <ul class="pagination" ng-hide=" searchCtrl.last_page == 1 ">
                <li ng-class="{ disabled: searchCtrl.filters.page == 1 }">
                    <span ng-click="searchCtrl.prevPage()">«</span>
                </li>    

                <li ng-class="{ disabled: searchCtrl.filters.page == searchCtrl.last_page }">
                    <span ng-click="searchCtrl.nextPage()">»</span>
                </li>
            </ul>

        </section>
    </div>
</div>
@endsection
