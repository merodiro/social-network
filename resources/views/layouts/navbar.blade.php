<nav class="navbar navbar-expand-md navbar-dark bg-dark mb-5">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/home') }}">
            {{ config('app.name', 'Laravel') }}
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation" style="">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarColor02">
            @if (Auth::check())
                <ul class="navbar-nav mr-md-4">
                    <li class="nav-item ml-md-0 ml-3">
                        <a class="nav-link" href="{{ Auth::user()->url}}">My profile</a>
                    </li>
                    <unread></unread>
                </ul>
            @endif
            
            <search></search>
            {{-- <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="text" placeholder="Search">
                <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
            </form> --}}

            <ul class="navbar-nav ml-md-auto">
                @if (Auth::guest())
                    <li class="nav-item ml-md-0 ml-3">
                        <a class="nav-link" href="{{ url('/login') }}">Login</a>
                    </li>
                    <li class="nav-item ml-md-0 ml-3">
                        <a class="nav-link" href="{{ url('/register') }}">Register</a>
                    </li>
                @else
                    <hr class="d-md">
                    <li class="nav-item ml-md-0 ml-3 dropdown">
                            <a href="#" class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown"
                               aria-haspopup="true" aria-expanded="false">
                                {{ Auth::user()->name }}
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                <a href="{{ route('logout') }}" class="dropdown-item"
                                   onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                    Logout
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                      style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </div>
                        </li>
                @endif
            </ul>
        </div>
    </div>
</nav>
