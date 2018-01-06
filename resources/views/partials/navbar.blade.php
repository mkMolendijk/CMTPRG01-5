<nav class="navbar navbar-expand-lg navbar-light bg-light justify-content-between spacing-bottom">
    @if (Auth::user()['admin'])
        <a class="navbar-brand mb-0 h1" href="{{ url('/admin') }}">
            @else
                <a class="navbar-brand mb-0 h1" href="{{ url('/dashboard') }}">
                    @endif
                    {{ config('app.name', 'My Games List') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">
                                    Login
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">
                                    Register
                                </a>
                            </li>
                        @else
                            @if (Auth::user()['admin'])
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="{{ url('/admin') }}"
                                       id="navbarDropdownMenuLink"
                                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Admin Panel
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                        <a class="dropdown-item" href="{{ url('/admin/users') }}">Users</a>
                                        <a class="dropdown-item" href="{{ url('/admin/games') }}">Games</a>
                                        <a class="dropdown-item" href="{{ url('/admin/genres') }}">Genres</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="{{ url('/admin') }}">Admin Panel</a>
                                    </div>
                                </li>

                            @else
                                <li class="nav-item">

                                    <a class="nav-link" href="{{ url('/dashboard') }}">
                                        Dashboard
                                    </a>
                                </li>
                            @endif
                            <li class="nav-item">

                                <a class="nav-link" href="{{ url('/profile') }}">
                                    Profile
                                </a>
                            </li>
                            <li class="nav-item">

                                <a class="nav-link" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    Logout
                                </a>
                                <form class="nav-link" id="logout-form" action="{{ route('logout') }}" method="POST"
                                      style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        @endguest
                    </ul>
                </div>
</nav>