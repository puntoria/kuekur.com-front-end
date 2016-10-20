<!DOCTYPE html>
<html lang="en" ng-app="kuekurApp">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700,600' rel='stylesheet' type='text/css'>

    <!-- Styles -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <style>
        .fa-btn {
            margin-right: 6px;
        }
    </style>
</head>
<body id="app-layout">
    
    <div class="modal fade" id="logginRequired" tabindex="-1" role="dialog" aria-labelledby="logginRequiredLabel" aria-hidden="true">
        <form action="">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="alert alert-info">You should be logged in to attend to event</div>
              <div class="modal-body">
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-primary" value="Add">Close</button>
              </div>
            </div>
          </div>
        </form>
      </div>
      
      <!-- Fixed navbar -->
      <div class="navbar navbar-default navbar-top" role="navigation">
        <div class="container">
          <div class="navbar-header">
            <a class="navbar-brand" href="{{ url('/') }}"><img src="<?php echo asset("/images/logo.png"); ?>" alt=""></a>        
          </div>
          <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar">
                <li><a href="{{ url('/home') }}">Home</a></li>
                <li><a href="{{ url('/events') }}">Events</a></li>
                <li><a href="{{ url('/categories') }}">Categories</a></li>
            </ul>
            <ul class="nav navbar-nav navbar pull-right">

              <li class="author">

                @if (Auth::check())
                    <span class="logged_user">Logged in as <a href="#">{{ Auth::user()->fullname }}</a></span>
                    <a href="{{ url('/logout') }}">Logout</a> 

                    <a href="#">
                        <!-- 30x30 image -->
                    </a>
                @else

                    <a href="{{ url('/login') }}">Login</a> 
                    <a href="{{ url('/register') }}">Register</a> 

                 @endif
              </li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>



    <!-- JavaScripts -->
    <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>
    <script type="text/javascript" src="{{ asset('js/main.js') }}"></script>
    
    @yield('content')
    
    {{ JavascriptHelper::outputData() }}

    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
</body>
</html>
