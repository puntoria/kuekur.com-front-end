<!doctype html>
<html>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>{{$title or "kuekur"}}</title>

    <link rel="stylesheet" href="/toolkit/fonts/font-awesome/css/font-awesome.min.css">
    <!-- toolkit styles -->
    <link rel="stylesheet" href="/toolkit/styles/toolkit.css">
    <!-- /toolkit styles -->

</head>
<body>

    <!-- app icons -->
    <svg style="display: none;">
      <symbol id="i-info" viewBox="0 0 20 20">
        <title>info</title>
        <path d="M10 0.4c-5.303 0-9.601 4.298-9.601 9.6 0 5.303 4.298 9.601 9.601 9.601 5.301 0 9.6-4.298 9.6-9.601s-4.299-9.6-9.6-9.6zM10.896 3.866c0.936 0 1.211 0.543 1.211 1.164 0 0.775-0.62 1.492-1.679 1.492-0.886 0-1.308-0.445-1.282-1.182 0-0.621 0.519-1.474 1.75-1.474zM8.498 15.75c-0.64 0-1.107-0.389-0.66-2.094l0.733-3.025c0.127-0.484 0.148-0.678 0-0.678-0.191 0-1.022 0.334-1.512 0.664l-0.319-0.523c1.555-1.299 3.343-2.061 4.108-2.061 0.64 0 0.746 0.756 0.427 1.92l-0.84 3.18c-0.149 0.562-0.085 0.756 0.064 0.756 0.192 0 0.82-0.232 1.438-0.719l0.362 0.486c-1.513 1.512-3.162 2.094-3.801 2.094z"></path>
      </symbol>
    
      <symbol id="i-like" viewBox="0 0 20 20">
        <title>like</title>
        <path d="M17.19 4.156c-1.672-1.535-4.383-1.535-6.055 0l-1.135 1.041-1.136-1.041c-1.672-1.535-4.382-1.535-6.054 0-1.881 1.726-1.881 4.519 0 6.245l7.19 6.599 7.19-6.599c1.88-1.726 1.88-4.52 0-6.245zM16.124 9.375l-6.124 5.715-6.125-5.715c-0.617-0.567-0.856-1.307-0.856-2.094s0.138-1.433 0.756-1.999c0.545-0.501 1.278-0.777 2.063-0.777s1.517 0.476 2.062 0.978l2.1 1.825 2.099-1.826c0.546-0.502 1.278-0.978 2.063-0.978s1.518 0.276 2.063 0.777c0.618 0.566 0.755 1.212 0.755 1.999s-0.238 1.528-0.856 2.095z"></path>
      </symbol>
    
      <symbol id="i-like-fill" viewBox="0 0 20 20">
        <title>like fill</title>
        <path d="M17.19 4.155c-1.672-1.534-4.383-1.534-6.055 0l-1.135 1.042-1.136-1.042c-1.672-1.534-4.382-1.534-6.054 0-1.881 1.727-1.881 4.52 0 6.246l7.19 6.599 7.19-6.599c1.88-1.726 1.88-4.52 0-6.246z"></path>
      </symbol>
    
      <symbol id="i-arrow-down" viewBox="0 0 32 32">
        <title>arrow down</title>
        <path d="M28.267 6.133l-12.267 12.267-12.267-12.267-3.733 3.733 16 16 16-16z"></path>
      </symbol>
    
      <symbol id="i-map" viewBox="0 0 14 14">
        <title>map</title>
        <path d="M6 5q0-0.828-0.586-1.414t-1.414-0.586-1.414 0.586-0.586 1.414 0.586 1.414 1.414 0.586 1.414-0.586 0.586-1.414zM8 5q0 0.852-0.258 1.398l-2.844 6.047q-0.125 0.258-0.371 0.406t-0.527 0.148-0.527-0.148-0.363-0.406l-2.852-6.047q-0.258-0.547-0.258-1.398 0-1.656 1.172-2.828t2.828-1.172 2.828 1.172 1.172 2.828z"></path>
      </symbol>
    
      <symbol id="i-check" viewBox="0 0 16 16">
        <title>check</title>
        <path d="M13.5 2l-7.5 7.5-3.5-3.5-2.5 2.5 6 6 10-10z"></path>
      </symbol>
    
      <symbol id="i-close" viewBox="0 0 16 16">
        <title>close</title>
        <path d="M15.854 12.854c-0-0-0-0-0-0l-4.854-4.854 4.854-4.854c0-0 0-0 0-0 0.052-0.052 0.090-0.113 0.114-0.178 0.066-0.178 0.028-0.386-0.114-0.529l-2.293-2.293c-0.143-0.143-0.351-0.181-0.529-0.114-0.065 0.024-0.126 0.062-0.178 0.114 0 0-0 0-0 0l-4.854 4.854-4.854-4.854c-0-0-0-0-0-0-0.052-0.052-0.113-0.090-0.178-0.114-0.178-0.066-0.386-0.029-0.529 0.114l-2.293 2.293c-0.143 0.143-0.181 0.351-0.114 0.529 0.024 0.065 0.062 0.126 0.114 0.178 0 0 0 0 0 0l4.854 4.854-4.854 4.854c-0 0-0 0-0 0-0.052 0.052-0.090 0.113-0.114 0.178-0.066 0.178-0.029 0.386 0.114 0.529l2.293 2.293c0.143 0.143 0.351 0.181 0.529 0.114 0.065-0.024 0.126-0.062 0.178-0.114 0-0 0-0 0-0l4.854-4.854 4.854 4.854c0 0 0 0 0 0 0.052 0.052 0.113 0.090 0.178 0.114 0.178 0.066 0.386 0.029 0.529-0.114l2.293-2.293c0.143-0.143 0.181-0.351 0.114-0.529-0.024-0.065-0.062-0.126-0.114-0.178z"></path>
      </symbol>
    
      <symbol id="i-download" viewBox="0 0 24 24">
        <title>download</title>
        <path d="M5.016 18h13.969v2.016h-13.969v-2.016zM18.984 9l-6.984 6.984-6.984-6.984h3.984v-6h6v6h3.984z"></path>
      </symbol>
    
      <symbol id="i-forward" viewBox="0 0 20 20">
        <title>forward</title>
        <path d="M12 11.874v4.357l7-6.69-7-6.572v3.983c-8.775 0-11 9.732-11 9.732 2.484-4.388 6.237-4.81 11-4.81z"></path>
      </symbol>
    
      <symbol id="i-globe" viewBox="0 0 20 20">
        <title>globe</title>
        <path d="M10 0.4c-5.295 0-9.601 4.307-9.601 9.6s4.306 9.6 9.601 9.6c5.293 0 9.6-4.307 9.6-9.6s-4.307-9.6-9.6-9.6zM18.188 10c0 1.873-0.636 3.6-1.696 4.98-0.3-0.234-0.619-0.867-0.319-1.523 0.303-0.66 0.382-2.188 0.312-2.783-0.066-0.594-0.375-2.025-1.214-2.039-0.838-0.012-1.413-0.289-1.911-1.283-1.033-2.068 1.939-2.465 0.906-3.609-0.289-0.322-1.783 1.322-2.002-0.869-0.014-0.157 0.135-0.392 0.336-0.636 3.244 1.090 5.588 4.157 5.588 7.762zM8.875 1.893c-0.196 0.382-0.713 0.537-1.027 0.824-0.684 0.619-0.978 0.533-1.346 1.127-0.371 0.594-1.567 1.449-1.567 1.879s0.604 0.936 0.906 0.838c0.302-0.1 1.099-0.094 1.567 0.070 0.469 0.166 3.914 0.332 2.816 3.244-0.348 0.926-1.873 0.77-2.279 2.303-0.061 0.225-0.272 1.186-0.285 1.5-0.025 0.486 0.344 2.318-0.125 2.318-0.471 0-1.738-1.639-1.738-1.936s-0.328-1.338-0.328-2.23c0-0.891-1.518-0.877-1.518-2.062 0-1.068 0.823-1.6 0.638-2.113-0.181-0.51-1.627-0.527-2.23-0.59 1.053-2.731 3.53-4.758 6.516-5.172zM7.424 17.77c0.492-0.26 0.542-0.596 0.988-0.613 0.51-0.023 0.925-0.199 1.5-0.326 0.51-0.111 1.423-0.629 2.226-0.695 0.678-0.055 2.015 0.035 2.375 0.689-1.295 0.861-2.848 1.363-4.514 1.363-0.899 0-1.765-0.149-2.575-0.418z"></path>
      </symbol>
    
      <symbol id="i-question" viewBox="0 0 20 20">
        <title>question</title>
        <path d="M10 0.4c-5.302 0-9.6 4.298-9.6 9.6s4.298 9.6 9.6 9.6c5.301 0 9.6-4.298 9.6-9.601 0-5.301-4.299-9.599-9.6-9.599zM9.849 15.599h-0.051c-0.782-0.023-1.334-0.6-1.311-1.371 0.022-0.758 0.587-1.309 1.343-1.309l0.046 0.002c0.804 0.023 1.35 0.594 1.327 1.387-0.023 0.76-0.578 1.291-1.354 1.291zM13.14 9.068c-0.184 0.26-0.588 0.586-1.098 0.983l-0.562 0.387c-0.308 0.24-0.494 0.467-0.563 0.688-0.056 0.174-0.082 0.221-0.087 0.576v0.090h-2.145l0.006-0.182c0.027-0.744 0.045-1.184 0.354-1.547 0.485-0.568 1.555-1.258 1.6-1.287 0.154-0.115 0.283-0.246 0.379-0.387 0.225-0.311 0.324-0.555 0.324-0.793 0-0.334-0.098-0.643-0.293-0.916-0.188-0.266-0.545-0.398-1.061-0.398-0.512 0-0.863 0.162-1.072 0.496-0.216 0.341-0.325 0.7-0.325 1.067v0.092h-2.211l0.004-0.096c0.057-1.353 0.541-2.328 1.435-2.897 0.563-0.361 1.264-0.544 2.081-0.544 1.068 0 1.972 0.26 2.682 0.772 0.721 0.519 1.086 1.297 1.086 2.311-0.001 0.567-0.18 1.1-0.534 1.585z"></path>
      </symbol>
    
      <symbol id="i-link" viewBox="0 0 20 20">
        <title>link</title>
        <path d="M7.859 14.691l-0.81 0.805c-0.701 0.695-1.843 0.695-2.545 0-0.336-0.334-0.521-0.779-0.521-1.252s0.186-0.916 0.521-1.252l2.98-2.955c0.617-0.613 1.779-1.515 2.626-0.675 0.389 0.386 1.016 0.384 1.403-0.005 0.385-0.389 0.383-1.017-0.006-1.402-1.438-1.428-3.566-1.164-5.419 0.675l-2.98 2.956c-0.715 0.709-1.108 1.654-1.108 2.658 0 1.006 0.394 1.949 1.108 2.658 0.736 0.73 1.702 1.096 2.669 1.096s1.934-0.365 2.669-1.096l0.811-0.805c0.389-0.385 0.391-1.012 0.005-1.4s-1.014-0.39-1.403-0.006zM16.891 3.207c-1.547-1.534-3.709-1.617-5.139-0.197l-1.009 1.002c-0.389 0.386-0.392 1.013-0.006 1.401 0.386 0.389 1.013 0.391 1.402 0.005l1.010-1.001c0.74-0.736 1.711-0.431 2.346 0.197 0.336 0.335 0.522 0.779 0.522 1.252s-0.186 0.917-0.522 1.251l-3.18 3.154c-1.454 1.441-2.136 0.766-2.427 0.477-0.389-0.386-1.016-0.383-1.401 0.005s-0.384 1.017 0.005 1.401c0.668 0.662 1.43 0.99 2.228 0.99 0.977 0 2.010-0.492 2.993-1.467l3.18-3.153c0.712-0.71 1.107-1.654 1.107-2.658s-0.395-1.949-1.109-2.659z"></path>
      </symbol>
    
      <symbol id="i-mail" viewBox="0 0 22 22">
        <title>mail</title>
        <path d="M20 19h-18c-1.104 0-2-0.896-2-2v-12c0-1.104 0.896-2 2-2h18c1.104 0 2 0.896 2 2v12c0 1.104-0.896 2-2 2zM19 17l-5.732-5.016-2.268 2.016-2.268-2.016-5.732 5.016h16zM2 16l5.625-5-5.625-5v10zM3 5l8 7 8-7h-16zM20 6l-5.625 5 5.625 5v-10z"></path>
      </symbol>
    
      <symbol id="i-menu" viewBox="0 0 20 20">
        <title>menu</title>
        <path d="M16.4 9h-12.8c-0.552 0-0.6 0.447-0.6 1s0.048 1 0.6 1h12.8c0.552 0 0.6-0.447 0.6-1s-0.048-1-0.6-1zM16.4 13h-12.8c-0.552 0-0.6 0.447-0.6 1s0.048 1 0.6 1h12.8c0.552 0 0.6-0.447 0.6-1s-0.048-1-0.6-1zM3.6 7h12.8c0.552 0 0.6-0.447 0.6-1s-0.048-1-0.6-1h-12.8c-0.552 0-0.6 0.447-0.6 1s0.048 1 0.6 1z"></path>
      </symbol>
    
      <symbol id="i-phone" viewBox="0 0 16 16">
        <title>phone</title>
        <path d="M11 10c-1 1-1 2-2 2s-2-1-3-2-2-2-2-3 1-1 2-2-2-4-3-4-3 3-3 3c0 2 2.055 6.055 4 8s6 4 8 4c0 0 3-2 3-3s-3-4-4-3z"></path>
      ></symbol>
    
      <symbol id="i-warning" viewBox="0 0 20 20">
        <title>warning</title>
        <path d="M19.511 17.98l-8.907-16.632c-0.124-0.215-0.354-0.348-0.604-0.348s-0.481 0.133-0.604 0.348l-8.906 16.632c-0.121 0.211-0.119 0.471 0.005 0.68 0.125 0.211 0.352 0.34 0.598 0.34h17.814c0.245 0 0.474-0.129 0.598-0.34 0.124-0.209 0.126-0.469 0.006-0.68zM11 17h-2v-2h2v2zM11 13.5h-2v-6.5h2v6.5z"></path>
      </symbol>
    
      <symbol id="i-search" viewBox="0 0 20 20">
        <title>search</title>
        <path d="M17.545 15.467l-3.779-3.779c0.57-0.935 0.898-2.035 0.898-3.21 0-3.417-2.961-6.377-6.378-6.377s-6.186 2.769-6.186 6.186c0 3.416 2.961 6.377 6.377 6.377 1.137 0 2.2-0.309 3.115-0.844l3.799 3.801c0.372 0.371 0.975 0.371 1.346 0l0.943-0.943c0.371-0.371 0.236-0.84-0.135-1.211zM4.004 8.287c0-2.366 1.917-4.283 4.282-4.283s4.474 2.107 4.474 4.474c0 2.365-1.918 4.283-4.283 4.283s-4.473-2.109-4.473-4.474z"></path>
      </symbol>
    
      <symbol id="i-plus" viewBox="0 0 20 20">
        <title>plus</title>
        <path d="M16 10c0 0.553-0.048 1-0.601 1h-4.399v4.399c0 0.552-0.447 0.601-1 0.601s-1-0.049-1-0.601v-4.399h-4.399c-0.552 0-0.601-0.447-0.601-1s0.049-1 0.601-1h4.399v-4.399c0-0.553 0.447-0.601 1-0.601s1 0.048 1 0.601v4.399h4.399c0.553 0 0.601 0.447 0.601 1z"></path>
      </symbol>  
    </svg>
    <!-- /app icons -->

    <header class="header">
        <div class="header-top">
    
            <div class="header-brand">
                <img src="/toolkit/images/header-logo.png" alt="">
            </div>
    
            <div class="header-user-profile">
                @unless(Auth::guest())
                    <ul href="#" class="header-user-profile-menu" data-dropdown-menu>
                        <li>
                            <a href="#">
                                <img src="/toolkit/images/user-profile.png" class="header-user-profile-image">
                                <span class="header-user-profile-name">{{ Auth::user()->fullname }}</span>
                                <span class="header-user-profile-icon fa fa-cog"></span>
                            </a>
                            <ul>
                                <li><a href="{{ url('/logout') }}">Logout</a></li>
                            </ul>
        
                        </li>
                    </ul>                
                @endif
            </div>
    
            <div class="container">
                <div class="row">
    
                    <form class="header-search">
                        <input type="text" name="q" placeholder="Search events or places" class="header-search-input">
                        <button type="submit" class="header-search-button">
                            <span class="fa fa-search"></span>
                        </button>
                    </form>
    
                    <ul class="header-menu">
                        <li class="header-menu-item">
                            <a href="/">Home</a>
                        </li>
                        <li class="header-menu-item">
                            <a href="/events">Browse Events</a>
                        </li>
                    </ul>
    
                </div>
            </div>
        </div>
        <div class="header-bottom">
    
            <div class="hero " style="background-image: url(/toolkit/images/hero-image-purple.jpg)">
            
                <div class="container">
                    <div class="row">
            
                        <div class="hero-content">
                                <title>{{$title or "Goal Tracker"}}</title>
                                @if(isset($main_header))
                                    <h1 class="hero-title">{!! nl2br($main_header) !!} </h1>
                                @else
                                    <h1 class="hero-title">Main Header</h1>
                                @endif        
            
                        </div>
            
                    </div>
                </div>
            
            </div>
        </div>
    </header>

    <!-- JavaScripts -->
    <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>
    <script type="text/javascript" src="{{ asset('js/main.js') }}"></script>
    
    @yield('content')
<footer class="footer">
    <div class="container">
        <div class="row">

            <div class="footer-content">
                <div class="footer-column">
                    <h6 class="footer-column-title">Events</h6>
                    <ul class="footer-list">
                        <li><a href="#">Browse Events</a></li>
                        <li><a href="#">Popular</a></li>
                        <li><a href="#">Latest</a></li>
                        <li><a href="#">To be announced</a></li>
                    </ul>
                </div>
                <div class="footer-column">
                    <h6 class="footer-column-title">Categories</h6>
                    <ul class="footer-list">
                        <li><a href="#">Technology</a></li>
                        <li><a href="#">Art & Culture</a></li>
                        <li><a href="#">Business</a></li>
                        <li><a href="#">City & Social</a></li>
                    </ul>
                </div>
                <div class="footer-column">
                    <h6 class="footer-column-title">Pages</h6>
                    <ul class="footer-list">
                        <li><a href="#">Terms of Use</a></li>
                        <li><a href="#">F.A.Q</a></li>
                        <li><a href="#">Contact us</a></li>
                    </ul>
                </div>
                <div class="footer-column">
                    <h6 class="footer-column-title">Account</h6>
                    <ul class="footer-list">
                        <li><a href="#">Sign in / Sign up</a></li>
                        <li><a href="#">Create an event</a></li>
                        <li><a href="#">My Events</a></li>
                        <li><a href="#">User Profile</a></li>
                    </ul>
                </div>
                <div class="footer-column">
                    <h6 class="footer-column-title">Social</h6>

                    <div class="footer-social">
                        <ul class="footer-social-icons">
                            <li class="footer-social-icon">
                                <a href="#">
                                    <i class="fa fa-facebook"></i>
                                </a>
                            </li>
                            <li class="footer-social-icon">
                                <a href="#">
                                    <i class="fa fa-twitter"></i>
                                </a>
                            </li>
                            <li class="footer-social-icon">
                                <a href="#">
                                    <i class="fa fa-instagram"></i>
                                </a>
                            </li>
                        </ul>
                        <p><a href="#">Follow us</a> to stay in touch</p>
                    </div>

                </div>
            </div>

        </div>
    </div>
</footer>


    <!-- <<script src="https://code.jquery.com/jquery-2.1.4.min.js"></script> -->
    <!-- Load jQuery locally if CDN fails -->
    <script>window.jQuery || document.write('<script src="/toolkit/scripts/jquery.min.js"><\/script>')</script>


    <!-- toolkit scripts -->

    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCg3fGxAQxRePl_cmCw-S7TODJkS7dmhPw&amp;sensor=false&amp;ver=3.0.0"></script>

    <script src="/toolkit/scripts/toolkit.js"></script>
    <!-- /toolkit scripts -->

</body>
</html>
