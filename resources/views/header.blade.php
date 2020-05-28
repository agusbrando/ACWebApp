<header>
    <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
        <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="/">Aula Campus</a>
        <!-- <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search"> -->
        <ul class="navbar-nav ml-auto">
            <!-- Authentication Links -->
        <div class="notificationsDropDown">
            <div class="dropdown show">
                <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="far fa-bell dropDownIcon"></i>
                     @if (Session::get('countNotifications') != 0)
                <span class="badge badge-light">{{Session::get('countNotifications')}}</span>
                    @endif
                </a>

<<<<<<< HEAD
=======
                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    
                </div>
>>>>>>> a6ba7995fb16984d2945d6e5f94cae2ad688c15c
              </div>



            @guest
            <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
            </li>
            @if (Route::has('register'))
            <li class="nav-item">
                <a class="nav-link" href="{{ route('register') }}">{{ __('Registrate') }}</a>
            </li>
            @endif
            @else
            <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle text-white" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}<span class="caret"></span>
                </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown" >
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        {{ __('Desconectarse') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </li>
            @endguest
        </div>
        </ul>
    </nav>
</header>
