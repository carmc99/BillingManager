@extends('backend.home')

@section('dashboard-title')
    <div class="row">
        <div class="col-sm-9"><h5 class="pl-2 font-weight-bold text-left">Facturas</h5></div>
        @can('crear_facturas')
            <div class="col-sm-3">
                <div class="text-right">
                    <a class="btn btn-light" href="{{ action('Backend\FacturaController@create') }}">
                    <span class="icon">
                      <i class="fas fa-circle"></i>
                    </span>
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
                <th scope="col">Estado</th>
                <th scope="col">Descripcion</th>
                <th scope="col">Valor total</th>
                <th>Fecha creación</th>
                <th>Descargar</th>
                <th scope="col">Acciones</th>
            </tr>
            </thead>
            <tbody>
            @foreach($facturas as $factura)
                <tr class="text-center">
                    <th scope="row">{{ $factura->num_pago }}</th>
                    @if($factura->estado)
                        <td class="btn btn-success">Pago</td>
                    @else
                        <td class="badge badge-danger">Pendiente</td>
                    @endif

                    <td>{{ $factura->descripcion }}</td>
                    <td>{{ $factura->valor_total }}</td>
                    <td>{{ $factura->created_at->format('d/m/y') }}</td>
                    <td>Descargar</td>
                    <td>
                        <div class="btn-group" role="group" aria-label="">
                            @can('ver_facturas')
                                <a href="{{ action('Backend\FacturaController@show', $factura->id) }}"
                                   name="confirm_item" class="btn btn-primary"
                                   data-toggle="tooltip" data-placement="top" title="ver"><b>Ver</b>
                                </a>
                            @endcan
                            @can('editar_facturas')
                                <a href="{{ action('Backend\FacturaController@edit', $factura->id) }}"
                                   name="confirm_item" class="btn btn-warning"
                                   data-toggle="tooltip" data-placement="top" title=""><b>Editar</b>
                                </a>
                            @endcan
                            @can('eliminar_facturas')
                                <form action="{{ action('Backend\FacturaController@destroy', $factura->id) }}"
                                      method="POST">
                                    {{method_field('DELETE')}}
                                    @csrf
                                    <button type="submit" class="btn btn-danger"><b>Eliminar</b></button>
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

