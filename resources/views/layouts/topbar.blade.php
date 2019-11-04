<div class="collapse navbar-collapse" id="navbarSupportedContent">
    <!-- Left Side Of Navbar -->
    @if(Auth::check() && Auth::user()->hasRole('Estandar'))
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="{{ action('Frontend\FacturaController@index') }}">Mis facturas</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ action('Frontend\ReciboController@index') }}">Mis recibos</a>
            </li>
        </ul>
    @endif
<!-- Right Side Of Navbar -->
    <ul class="navbar-nav ml-auto">

        <!-- Authentication Links -->
        @guest
            <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}">{{ __('Ingresar') }}</a>
            </li>
        @else
            <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }} <span class="caret"></span>
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    @role('Administrador')
                    <a href="{{ action('Backend\DashboardController@index') }}" class="dropdown-item">Dashboard</a>
                    @endrole
                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        {{ __('Cerrar sesion') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                          style="display: none;">
                        @csrf
                    </form>
                </div>
            </li>
        @endguest
    </ul>
</div>