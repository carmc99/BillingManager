@extends('layouts.app')

@section('content')
    <div class="card-body">
        <table class="table table-responsive-lg" id="tabla-facturas">
            <thead>
            <tr class="text-center">
                <th scope="col">Num recibo</th>
                <th scope="col">Num factura</th>
                <th>Valor abono</th>
                <th scope="col">Descripcion</th>
                <th>Fecha creación</th>
                <th>Adjunto</th>
                <th scope="col">Acciones</th>
            </tr>
            </thead>
            <tbody>
            @foreach($recibos as $recibo)
                <tr class="text-center">
                    <th scope="row">{{ $recibo->num_recibo }}</th>
                    <th scope="row">{{ $recibo->factura->num_factura }}</th>
                    <td>${{ number_format($recibo->valor_abono) }}</td>
                    <td>{{ $recibo->descripcion }}</td>
                    <td>{{ date('d/M/Y', strtotime($recibo->created_at)) }}</td>
                    <td><a href="{{ action('Frontend\ReciboController@getFile', $recibo->id) }}">Descargar</a></td>
                    <td>
                        <div class="btn-group" role="group" aria-label="">
                            @can('ver_recibos')
                                <a href="{{ action('Frontend\ReciboController@show', $recibo->id) }}"
                                   name="confirm_item" class="btn btn-primary"
                                   data-toggle="tooltip" data-placement="top" title="ver">
                                    <span class="fas fa-eye" aria-hidden="true"></span>
                                </a>
                            @endcan
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
