@extends('backend.home')

@section('dashboard-title')
    <div class="row">
        <div class="col-sm-9"><h5 class="pl-2 font-weight-bold text-left">Recibos</h5></div>

    </div>
@endsection

@section('dashboard-content')
    <div class="card-body">
        <table class="table table-responsive-lg" id="tabla-facturas">
            <thead>
            <tr class="text-center">
                <th scope="col">Num recibo</th>
                <th scope="col">Num factura</th>
                <th>Empresa</th>
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
                    <td>{{ $recibo->empresa->nombre }}</td>
                    <td>{{ $recibo->descripcion }}</td>
                    <td>{{ date('d/M/Y', strtotime($recibo->created_at)) }}</td>
                    <td><a href="{{ action('Backend\ReciboController@getFile', $recibo->id) }}">Descargar</a></td>
                    <td>
                        <div class="btn-group" role="group" aria-label="">
                            @can('ver_recibos')
                                <a href="{{ action('Backend\ReciboController@show', $recibo->id) }}"
                                   name="confirm_item" class="btn btn-primary"
                                   data-toggle="tooltip" data-placement="top" title="ver">
                                    <span class="fas fa-eye" aria-hidden="true"></span>
                                </a>
                            @endcan
                            @can('editar_recibos')
                                <a href="{{ action('Backend\ReciboController@edit', $recibo->id) }}"
                                   name="confirm_item" class="btn btn-warning"
                                   data-toggle="tooltip" data-placement="top" title="">
                                    <span class="fas fa-edit" aria-hidden="true"></span>
                                </a>
                            @endcan
                            @can('eliminar_recibos')
                                <form action="{{ action('Backend\ReciboController@destroy', $recibo->id) }}"
                                      method="POST">
                                    {{method_field('DELETE')}}
                                    @csrf
                                    <button type="submit" class="btn btn-danger">
                                        <span class="fas fa-trash" aria-hidden="true"></span>
                                    </button>
                                </form>
                            @endcan
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection

