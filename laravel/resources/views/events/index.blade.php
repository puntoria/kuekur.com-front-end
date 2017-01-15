@extends('layouts.app',['title'=>'Events','main_header'=>'events'])
@section('content')

<div class="content-area">
    <div class="content-area-sidebar">

        <div class="sidebar-area">

            <div class="sidebar-section icon-boxes horizontal">
                <div class="icon-box-column">
                    <a href="#" class="icon-box active">
                        <div class="icon-box-content">
                            <i class="fa fa-bolt"></i>
                            <div class="icon-box-label">Popular</div>
                        </div>
                    </a>
                </div>

                <div class="icon-box-column">
                    <a href="#" class="icon-box">
                        <div class="icon-box-content">
                            <i class="fa fa-bars"></i>
                            <div class="icon-box-label">Latest</div>
                        </div>
                    </a>
                </div>
            </div>

            <div class="sidebar-section no-border">
                <div class="sidebar-map">
                    <div class="google-map"></div>
                </div>
            </div>


            <div class="sidebar-section button">
                Register
            </div>


            <div class="sidebar-section content">
                <div class="sidebar-dropdown">
                    <a class="sidebar-dropdown-toggle">
                        Location
                        <i class="fa fa-angle-double-down"></i>
                    </a>
                    <div class="sidebar-dropdown-content">

                        <ul class="radio-buttons-list">
                            <li>
                                <label>
                                    <input type="radio" name="location[]"><span>Prishtine</span>
                                </label>
                            </li>
                            <li>
                                <label>
                                    <input type="radio" name="location[]"><span>Peje</span>
                                </label>
                            </li>
                        </ul>

                    </div>
                </div>
            </div>

            <div class="sidebar-section content">
                <div class="sidebar-dropdown">
                    <a class="sidebar-dropdown-toggle">
                        Category
                        <i class="fa fa-angle-double-down"></i>
                    </a>
                    <div class="sidebar-dropdown-content">
                        <ul>
                            <li>Prishtine</li>
                            <li>Peje</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="sidebar-section content">
                <div class="sidebar-dropdown">
                    <a class="sidebar-dropdown-toggle">
                        Event Type
                        <i class="fa fa-angle-double-down"></i>
                    </a>
                    <div class="sidebar-dropdown-content">
                        <ul>
                            <li>Prishtine</li>
                            <li>Peje</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="sidebar-section content">
                <div class="sidebar-dropdown">
                    <a class="sidebar-dropdown-toggle">
                        Date/period
                        <i class="fa fa-angle-double-down"></i>
                    </a>
                    <div class="sidebar-dropdown-content">
                        <ul>
                            <li>Prishtine</li>
                            <li>Peje</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="sidebar-section content">
                <div class="sidebar-dropdown">
                    <a class="sidebar-dropdown-toggle">
                        Price
                        <i class="fa fa-angle-double-down"></i>
                    </a>
                    <div class="sidebar-dropdown-content">
                        <ul>
                            <li>Prishtine</li>
                            <li>Peje</li>
                        </ul>
                    </div>
                </div>
            </div>


        </div>

    </div>
    <div class="content-area-main">

        <div class="events-list">
            @if($events)
            @foreach($events as $event)
            <div class="events-list-item">
                <div class="events-list-item-image" style="background-image: url(/toolkit/images/event-image-1.jpg)">
                    <a href="#"></a>
                </div>

                <div class="events-list-item-details">
                    <div class="events-list-item-price"><span>free</span></div>

                    <div class="events-list-item-date">
                        <i class="fa fa-calendar-check-o" aria-hidden="true"></i>{{ event.start }}
                    </div>

                    <h4 class="events-list-item-title"><a href="events/{{ event.id }}">{{ event.name }}</a></h4>

                    <div class="events-list-item-content">
                        {{ event.description }}
                    </div>

                    <div class="events-list-item-footer">

                        <ul class="events-list-item-tags">
                            <li><a href="#">#tech</a></li>
                            <li><a href="#">#prishtina</a></li>
                            <li><a href="#">#22 may</a></li>
                        </ul>

                        <div class="events-list-item-actions">
                            <a href="#">
                                <i class="fa fa-heart"></i>
                                Fav It
                            </a>
                            <a href="#">
                                <i class="fa fa-share"></i>
                                Share
                            </a>
                        </div>

                    </div>

                </div>
            </div>
            @endforeach
            @endif

            <div class="events-list-item">
                <div class="events-list-item-image" style="background-image: url(/toolkit/images/event-image-2.jpg)">
                    <a href="#"></a>
                </div>

                <div class="events-list-item-details">
                    <div class="events-list-item-price"><span>paid</span></div>

                    <div class="events-list-item-date">
                        <i class="fa fa-calendar-check-o" aria-hidden="true"></i>
                        27 May 2016
                    </div>

                    <h4 class="events-list-item-title"><a href="#">TEDx <br>Prishtina</a></h4>

                    <div class="events-list-item-content">
                        Open Source Conference Albania (OSCAL) is the international annual conference in organized to promote free open source software/hardware, open knowledge, open data, online provacy and...
                    </div>

                    <div class="events-list-item-footer">

                        <ul class="events-list-item-tags">
                            <li><a href="#">#tech</a></li>
                            <li><a href="#">#prishtina</a></li>
                            <li><a href="#">#22 may</a></li>
                        </ul>

                        <div class="events-list-item-actions">
                            <a href="#">
                                <i class="fa fa-heart"></i>
                                Fav It
                            </a>
                            <a href="#">
                                <i class="fa fa-share"></i>
                                Share
                            </a>
                        </div>

                    </div>

                </div>
            </div>



            <div class="pagination">

                <ul class="pagination-pages">
                    <li><a href="#">1</a></li>
                    <li class="active"><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                </ul>

                <ul class="pagination-nav">
                    <li><a href="#">Prev</a></li>
                    <li><a href="#">Next</a></li>
                </ul>

            </div>

        </div>

    </div>
</div>

@endsection