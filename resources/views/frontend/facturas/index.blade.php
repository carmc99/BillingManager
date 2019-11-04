@extends('layouts.app')

@section('content')
    <div class="col-md-12">
        <div class="card shadow">
            <div class="card-header m-0 bg-primary">
                <div class="row">
                    <div class="col-sm-9"><h5 class="font-weight-bold text-white">Facturas</h5></div>
                </div>
            </div>
            <div class="card-body">
                <table class="table" id="tabla-facturas">
                    <thead>
                    <tr class="text-center">
                        <th scope="col">#</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Descripcion</th>
                        <th scope="col">Valor total</th>
                        <th>Adjunto</th>
                        <th scope="col">Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($facturas as $factura)
                        <tr class="text-center">
                            <th scope="row">{{ $factura->num_factura }}</th>
                            @if($factura->estado)
                                <td class="badge badge-success">Pago</td>
                            @else
                                <td class="badge badge-danger">Pendiente</td>
                            @endif

                            <td>{{ $factura->descripcion }}</td>
                            <td>{{ $factura->valor_total }}</td>
                            <td><a href="{{ action('Frontend\FacturaController@getFactura', $factura->id) }}">Descargar</a></td>
                            <td>
                                <div class="btn-group" role="group" aria-label="">
                                    @can('ver_facturas')
                                        <a href="{{ action('Frontend\FacturaController@show', $factura->id) }}"
                                           name="confirm_item" class="btn btn-primary"
                                           data-toggle="tooltip" data-placement="top" title="ver"><b>Ver</b>
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
