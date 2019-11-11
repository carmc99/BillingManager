<div class="col-md-3">
    <div class="card shadow">
        <div class="vertical-nav bg-white" id="sidebar">
            <div class="py-4 px-3 mb-4 bg-light">
                <div class="media d-flex align-items-center"><img src="https://res.cloudinary.com/mhmd/image/upload/v1556074849/avatar-1_tcnd60.png" alt="..." width="65" class="mr-3 rounded-circle img-thumbnail shadow-sm">
                    <div class="media-body">
                        <h4 class="m-0">{{ Auth::user()->name }}</h4>
                        <p class="font-weight-light text-muted mb-0">{{ Auth::user()->getRoleNames()->first() }}</p>
                    </div>
                </div>
            </div>

            <p class="text-white font-weight-bold text-uppercase px-3 small py-2 mb-0 bg-primary rounded-2">Panel de control</p>

            <ul class="nav flex-column bg-primery mb-0">
                <li class="nav-item">
                    <a href="{{ action('Backend\DashboardController@index') }}" class="nav-link text-dark bg-light">
                        Inicio
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ action('Backend\UserController@index') }}" class="nav-link text-dark bg-light">
                        Gestión de usuarios
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ action('Backend\EmpresaController@index') }}" class="nav-link text-dark bg-light">
                        Empresas
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ action('Backend\FacturaController@index') }}" class="nav-link text-dark bg-light">
                        Facturas</a>
                </li>
                <li class="nav-item">
                    <a href="{{ action('Backend\ReciboController@index') }}" class="nav-link text-dark bg-light">
                        Recibos</a>
                </li>

            </ul>

            <p class="text-white font-weight-bold text-uppercase px-3 small py-2 mb-0 bg-primary rounded-2">Estadisticas</p>

            <ul class="nav flex-column bg-white mb-0">
                <li class="nav-item">
                    <a href="{{ action('Backend\StatsController@index') }}" class="nav-link text-dark bg-light">
                        Ver estadisticas
                    </a>
                </li>

            </ul>
        </div>
    </div>
</div>

