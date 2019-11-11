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

            </div>
        </div>
    </div>
@endsection