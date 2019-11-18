@extends('layouts.app')

@section('content')
    <div class="col-md-12">
        <div class="card shadow">
            <div class="card-header m-0 bg-primary">
                <div class="row">
                    <div class="col-sm-9"><h5 class="font-weight-bold text-white">Factura
                            numero: {{ $factura->num_factura }}</h5></div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-2">
                        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                            <a class="nav-link active" id="detalle-factura" data-toggle="pill" href="#pila-detalle-factura"
                               role="tab" aria-controls="detalle-factura" aria-selected="true">Factura</a>
                            <a class="nav-link" id="detalle-recibo" data-toggle="pill" href="#pila-detalle-recibo"
                               role="tab" aria-controls="pila-detalle-recibo" aria-selected="false">Recibos</a>
                        </div>
                    </div>
                    <div class="col-md-10">
                        <div class="tab-content" id="v-pills-tabContent">
                            <div class="tab-pane fade show active" id="pila-detalle-factura" role="tabpanel"
                                 aria-labelledby="detalle-factura">
                                @include('frontend.facturas.detail')
                            </div>

                            <div class="tab-pane fade" id="pila-detalle-recibo" role="tabpanel"
                                 aria-labelledby="detalle-recibo">
                                @include('frontend.recibos.detail')
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection