@extends('backend.home')

@section('dashboard-title')
    <div class="row">
        <div class="col-sm-9"><h5 class="pl-2 font-weight-bold text-white text-left">Empresa: {{ $empresa->nombre }}</h5></div>
    </div>
@endsection

@section('dashboard-content')
    <div class="card-body">
        <div class="row">
            <div class="col-md-3">
                <div class="card bg-primary text-white shadow">
                    <div class="card-body">
                        <h5>Usuarios</h5>
                        <div class="text-white-50">12</div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card bg-info text-white shadow">
                    <div class="card-body">
                        <h5>Facturas</h5>
                        <div class="text-white-50">123</div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card bg-success text-white shadow">
                    <div class="card-body">
                        <h5>Pagos</h5>
                        <div class="text-white-50">312</div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card bg-danger text-white shadow">
                    <div class="card-body">
                        <h5>Pendientes</h5>
                        <div class="text-white-50">123</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row pt-2">
            <div class="col-md-4">

            </div>
            <div class="col-md-4">

            </div>
            <div class="col-md-4">

            </div>
        </div>
    </div>
@endsection
