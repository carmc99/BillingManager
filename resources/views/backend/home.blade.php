@extends('layouts.app')

@section('dashboard-title')
    <div class="row">
        <div class="col-sm-9"><h5 class="pl-2 font-weight-bold text-left">Inicio</h5></div>
    </div>
@endsection

@section('dashboard-content')
    <div class="card-body">
        <div class="row">
            <div class="col-md-3">
                <ul class="list-group">
                    <li class="list-group-item bg-danger text-white">Top deudores</li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Empresa 1
                        <span class="badge badge-danger badge-pill">2</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Empresa 2
                        <span class="badge badge-danger badge-pill">1</span>
                    </li>
                </ul>
            </div>
            <div class="col-md-3">
                <ul class="list-group">
                    <li class="list-group-item active">Cras justo odio</li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Dapibus ac facilisis in
                        <span class="badge badge-primary badge-pill">2</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Morbi leo risus
                        <span class="badge badge-primary badge-pill">1</span>
                    </li>
                </ul>

            </div>
            <div class="col-md-6">
                <div class="list-group">
                    <li class="list-group-item active">Ultimas entradas</li>
                    <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">Registro factura</h5>
                            <small>hace 3 dias</small>
                        </div>
                        <p class="mb-1">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus
                            varius blandit.</p>
                        <small>Solutech System - Administrador</small>
                    </a>
                    <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">Registro usuario</h5>
                            <small class="text-muted">hace 3 dias</small>
                        </div>
                        <p class="mb-1">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus
                            varius blandit.</p>
                        <small class="text-muted">Solutech System - Administrador.</small>
                    </a>
                    <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">Pago factura</h5>
                            <small class="text-muted">hace 3 dias</small>
                        </div>
                        <p class="mb-1">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus
                            varius blandit.</p>
                        <small class="text-muted">Solutech System - Administrador.</small>
                    </a>
                </div>
            </div>

        </div>
    </div>
@endsection

@section('content')
    <div class="row">
        @include('layouts.sidebar')
        <div class="col-md-9">
            <div class="card shadow">
                <div class="card-header m-0 badge bg-primary text-white">@yield('dashboard-title')</div>
                @yield('dashboard-content')
            </div>
        </div>
    </div>

@endsection



