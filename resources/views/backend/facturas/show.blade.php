@extends('backend.home')

@section('dashboard-title')
    <div class="row">
        <div class="col-sm-8"><h5 class="pl-2 font-weight-bold text-white text-left">Factura
                numero: {{ $factura->num_factura }}</h5></div>
    </div>
@endsection

@section('dashboard-content')
    <div class="card-body">
        <div class="row">
            <div class="col-md-2">
                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <a class="nav-link active" id="detalle-factura" data-toggle="pill" href="#pila-detalle-factura"
                       role="tab" aria-controls="detalle-factura" aria-selected="true">Factura</a>
                    <a class="nav-link" id="detalle-recibo" data-toggle="pill" href="#pila-detalle-recibo"
                       role="tab" aria-controls="pila-detalle-recibo" aria-selected="false">Recibos</a>

                    <a class="nav-link" id="registro-recibo" data-toggle="pill" href="#pila-registro-recibo" role="tab"
                       aria-controls="pila-registro-recibo" aria-selected="false">Registrar pago</a>
                </div>
            </div>
            <div class="col-md-10">
                <div class="tab-content" id="v-pills-tabContent">
                    <div class="tab-pane fade show active" id="pila-detalle-factura" role="tabpanel"
                         aria-labelledby="detalle-factura">
                        @include('backend.facturas.detail')
                    </div>

                    <div class="tab-pane fade" id="pila-detalle-recibo" role="tabpanel"
                         aria-labelledby="detalle-recibo">
                        @include('backend.recibos.detail')
                    </div>

                    <div class="tab-pane fade" id="pila-registro-recibo" role="tabpanel"
                         aria-labelledby="registro-recibo">
                        @can('crear_recibos')
                            @include('backend.recibos.register')
                        @elsecan()
                            <span class="text-center bg-danger text-white">Sin permisos</span>
                        @endcan
                    </div>

                </div>
            </div>
        </div>

    </div>
@endsection
