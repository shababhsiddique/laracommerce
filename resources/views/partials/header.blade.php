<header>

    <!--Navbar-->
    <nav class="navbar navbar-expand-lg navbar-light blue-grey lighten-5 fixed-top scrolling-navbar">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="{{asset('public/img/mdb-transparent.png')}}" height="30" alt=""></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item {{ Request::is('/') ? 'active' : '' }}">
                        <a class="nav-link" href="{{URL::to('/')}}">Shop
                            <span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item {{ Request::is('about') ? 'active' : '' }}">
                        <a class="nav-link" href="{{URL::to('/about')}}">About</a>
                    </li>
                    <li class="nav-item {{ Request::is('contact') ? 'active' : '' }}">
                        <a class="nav-link" href="{{URL::to('/contact')}}">Contact</a>
                    </li>                    
                </ul>   
                <hr class="visible-md"/>
                <form class="form-inline" method="get" action="{{url('/search')}}">
                    <input name="q" class="form-control mr-md-5 ecomheadersearch" type="text" placeholder="Search" aria-label="Search">
                    <button class="btn btn-primary btn-md" type="submit"><i class="fa fa-search"></i></button>
                </form> 

                <ul class="navbar-nav ml-auto nav-flex-icons" style="margin-left: 5px !important;
    font-weight: 500;
    padding-top: 5px;">
                    @guest
                    <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Login</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">Register</a></li>
                    @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                           <?php
                           $name = explode(" ",Auth::user()->name);
                           echo $name[0];
                           ?> <span class="fa fa-user-circle"></span>
                        </a>

                        <ul class="dropdown-menu">
                            <li class="nav-item">
                                <a class="nav-link  nav-username" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                           document.getElementById('logout-form').submit();">
                                        <span class="fa fa-power-off"></span>&nbsp;Logout
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                    @endguest                   
                </ul>

            </div>
        </div>
    </nav>
    <!--/.Navbar-->
</header>