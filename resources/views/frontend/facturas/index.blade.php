@extends('layouts.app')

@section('content')
    <div class="col-md-12">
        <div class="card shadow">
            <div class="card-header m-0 bg-primary">
                <div class="row">
                    <div class="col-sm-9"><h5 class="font-weight-bold text-white">Facturas {{ Auth::user()->empresa->nombre }}</h5></div>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-responsive-lg" id="tabla-facturas">
                    <thead>
                    <tr class="text-center">
                        <th scope="col">#</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Descripcion</th>
                        <th scope="col">Valor total</th>
                        <th>Fecha facturacion</th>
                        <th>Adjunto</th>
                        <th scope="col">Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($facturas as $factura)
                        <tr class="text-center">
                            <th scope="row">{{ $factura->num_factura }}</th>
                            @if(App\Models\Factura::getEstado($factura->num_factura)->first() == 'pago')
                                <td class="badge badge-success">Pago</td>
                            @elseif(App\Models\Factura::getEstado($factura->num_factura)->first() == 'afavor')
                                <td class="badge badge-warning">Saldo a favor</td>
                            @else
                                <td class="badge badge-danger">Pendiente</td>
                            @endif

                            <td>{{ $factura->descripcion }}</td>
                            <td>$ {{ number_format($factura->valor_total) }}</td>
                            <td>{{ date('d/M/Y', strtotime($factura->fecha_facturacion)) }}</td>
                            <td><a href="{{ action('Frontend\FacturaController@getFactura', $factura->id) }}">Descargar</a></td>
                            <td>
                                <div class="btn-group" role="group" aria-label="">
                                    @can('ver_facturas')
                                        <a href="{{ action('Frontend\FacturaController@show', $factura->id) }}"
                                           name="confirm_item" class="btn btn-primary"
                                           data-toggle="tooltip" data-placement="top" title="ver"><span class="fas fa-eye" aria-hidden="true"></span>
                                        </a>
                                    @endcan
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
