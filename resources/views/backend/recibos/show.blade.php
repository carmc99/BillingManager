@extends('backend.home')

@section('dashboard-title')
    <div class="row">
        <div class="col-sm-9"><h5 class="pl-2 font-weight-bold text-white text-left">Recibo numero: {{ $factura->num_factura }}</h5></div>
    </div>
@endsection

@section('dashboard-content')
    <div class="card-body">

    </div>
@endsection
