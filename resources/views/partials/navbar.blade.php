<nav class="navbar navbar-expand-lg navbar-light bg-light shadow">
    <div class="container">

        {{--  Logo  --}}
        <a class="navbar-brand fw-bold" href="{{ url('/') }}">
            Wikiprofes2.0
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        {{-- Menu links --}}
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            {{--  Links  --}}
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" href="#">Búsqueda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Top Profesores</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">FAQ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('terminos.index') }}">Terminos y condiciones</a>
                </li>
                @if ( Auth::user() && Auth::user()->email == 'eduardo@gmail.com' )
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('dashboard') }}">dashboard</a>
                    </li>
                @endif
            </ul>

            {{--  Login/Register  --}}
            <div class="d-flex gap-3">
                <ul class="navbar-nav ml-auto">
                    {{--  Authentication Links  --}}
                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item mx-3">
                                <a class="btn btn-primary px-5" href="{{ route('login') }}">{{ __('Ingresar') }}</a>
                            </li>
                        @endif

                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="btn btn-outline-primary px-5"
                                    href="{{ route('register') }}">{{ __('Registrarse') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                             document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </div>
</nav>
