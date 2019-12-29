@extends('layouts.app')
@section('content-title', 'Estado de cuenta')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow">
                <div class="card-header bg-primary"><h5 class="text-white font-weight-bold">@yield('content-title')</h5></div>
                    <div class="row m-1">
                        <div class="col-md-3">
                            <div class="card border-white bg-primary mb-1" style="max-width: 18rem;">
                                <div class="card-header text-white font-weight-bold">Empresa</div>
                                <div class="card-body text-white">
                                    <h5 class="card-title">Total</h5>
                                    <p class="card-text">12</p>
                                </div>
                                <a class="card-footer bg-primary text-white" href="#">Ver detalle</a>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card border-white bg-warning mb-1" style="max-width: 18rem;">
                                <div class="card-header text-white font-weight-bold">Facturas</div>
                                <div class="card-body text-white">
                                    <h5 class="card-title">Total</h5>
                                    <p class="card-text">23</p>
                                </div>
                                <a class="card-footer bg-warning text-white" href="#">Ver detalle</a>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card border-white bg-danger mb-1" style="max-width: 18rem;">
                                <div class="card-header text-white font-weight-bold">Facturas</div>
                                <div class="card-body text-white">
                                    <h5 class="card-title">Total pendiente de pago</h5>
                                    <p class="card-text">$ 34</p>
                                </div>
                                <a class="card-footer bg-danger text-white" href="#">Ver detalle</a>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card border-white bg-success mb-1" style="max-width: 18rem;">
                                <div class="card-header text-white font-weight-bold">Facturas</div>
                                <div class="card-body text-white">
                                    <h5 class="card-title">Total pago</h5>
                                    <p class="card-text">$ 345</p>
                                </div>
                                <a class="card-footer bg-success text-white" href="#">Ver detalle</a>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
@endsection



