@extends('backend.home')


@section('dashboard-title')
    <div class="row">
        <div class="col-sm-9"><h5 class="pl-2 font-weight-bold text-left">Estadisticas</h5></div>
        <div class="col-sm-3">
            <div class="text-right">
                <div class="btn-group dropleft">
                    <button type="button" class="btn btn-light dropdown-toggle text-black" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                        Cambiar generador
                    </button>
                    <div class="dropdown-menu">
                        @foreach($empresasGeneradoras as $generador)
                            <a class="dropdown-item"
                               href="{{ action('Backend\Stats\HomeChartController@index', $generador->nit) }}">{{ $generador->nombre }}</a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('dashboard-content')
    <div class="row m-2">
        <div class="col-md-3">
            <div class="card border-white bg-primary mb-1" style="max-width: 18rem;">
                <div class="card-header text-white">Empresas</div>
                <div class="card-body text-white">
                    <h5 class="card-title">Total</h5>
                    <p class="card-text">12</p>
                </div>
                <a class="card-footer bg-primary text-white" href="#">Ver detalle</a>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card border-white bg-warning mb-1" style="max-width: 18rem;">
                <div class="card-header text-white">Facturas</div>
                <div class="card-body text-white">
                    <h5 class="card-title">Total</h5>
                    <p class="card-text">{{ $totalFacturas }}</p>
                </div>
                <a class="card-footer bg-warning text-white" href="#">Ver detalle</a>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card border-white bg-danger mb-1" style="max-width: 18rem;">
                <div class="card-header text-white">Facturas</div>
                <div class="card-body text-white">
                    <h5 class="card-title">Total pendiente de pago</h5>
                    <p class="card-text">$ {{ $totalSaldoPendienteFacturas }}</p>
                </div>
                <a class="card-footer bg-danger text-white" href="#">Ver detalle</a>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card border-white bg-success mb-1" style="max-width: 18rem;">
                <div class="card-header text-white">Recibos</div>
                <div class="card-body text-white">
                    <h5 class="card-title">Total pago</h5>
                    <p class="card-text">$ {{ $totalSaldoPagoFacturas }}</p>
                </div>
                <a class="card-footer bg-success text-white" href="#">Ver detalle</a>
            </div>
        </div>
    </div>
    <div class="row m-1">
        <div class="col-md-12">
            <div style="width: 100%">
                {!! $chart->container() !!}
            </div>
        </div>
        <div class="col-md-12">
            <div style="width: 100%">
                {!! $estadoDeCuenta->container() !!}
            </div>
        </div>

    </div>
    @if($chart ?? '' || $estadoDeCuenta ?? '')
        {!! $chart->script() !!}
        {!! $estadoDeCuenta->script() !!}
    @endif
@endsection