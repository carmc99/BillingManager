@extends('backend.home')

@section('dashboard-title')
    <div class="row">
        <div class="col-sm-9"><h5 class="pl-2 font-weight-bold text-left">Facturas</h5></div>
        @can('crear_facturas')
            <div class="col-sm-3">
                <div class="text-right">
                    <a class="btn btn-light" href="{{ action('Backend\FacturaController@create') }}">
                        <span class="text font-weight-bold">Nuevo registro</span>
                    </a>
                </div>
            </div>
        @endcan
    </div>
@endsection

@section('dashboard-content')
    <div class="card-body">
        <table class="table table-responsive-lg" id="tabla-facturas">
            <thead>
            <tr class="text-center">
                <th scope="col">#</th>
                <th scope="col">Empresa</th>
                <th scope="col">Estado</th>
                <th scope="col">Descripcion</th>
                <th scope="col">Valor total</th>
                <th>Fecha creación</th>
                <th>Adjunto</th>
                <th scope="col">Acciones</th>
            </tr>
            </thead>
            <tbody>
            @foreach($facturas as $factura)
                <tr class="text-center">
                    <th scope="row">{{ $factura->num_factura }}</th>
                    <th scope="row">{{ $factura->empresa->nombre }}</th>
                    @if($factura->getEstado($factura->num_factura)->first() == 'pago')
                        <td class="badge badge-success">Pago</td>
                    @elseif($factura->getEstado($factura->num_factura)->first() == 'afavor')
                        <td class="badge badge-warning">Saldo a favor</td>
                    @else
                        <td class="badge badge-danger">Pendiente</td>
                    @endif

                    <td>{{ $factura->descripcion }}</td>
                    <td>${{ number_format($factura->valor_total) }}</td>
                    <td>{{ date('d/M/Y', strtotime($factura->created_at)) }}</td>
                    <td><a href="{{ action('Backend\FacturaController@getFile', $factura->id) }}">Descargar</a></td>
                    <td>
                        <div class="btn-group" role="group" aria-label="">
                            @can('ver_facturas')
                                <a href="{{ action('Backend\FacturaController@show', $factura->id) }}"
                                   name="confirm_item" class="btn btn-primary"
                                   data-toggle="tooltip" data-placement="top" title="ver">
                                    <span class="fas fa-eye" aria-hidden="true"></span>
                                </a>
                            @endcan
                            @can('editar_facturas')
                                <a href="{{ action('Backend\FacturaController@edit', $factura->id) }}"
                                   name="confirm_item" class="btn btn-warning"
                                   data-toggle="tooltip" data-placement="top" title="">
                                    <span class="fas fa-edit" aria-hidden="true"></span>
                                </a>
                            @endcan
                            @can('eliminar_facturas')
                                <form action="{{ action('Backend\FacturaController@destroy', $factura->id) }}"
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

