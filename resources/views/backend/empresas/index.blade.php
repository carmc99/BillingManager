@extends('backend.home')

@section('dashboard-title')
    <div class="row">
        <div class="col-sm-9"><h5 class="pl-2 font-weight-bold text-left">Empresas</h5></div>
        @can('crear_empresas')
            <div class="col-sm-3">
                <div class="text-right">
                    <a class="btn btn-light" href="{{ action('Backend\EmpresaController@create') }}">
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
                <th scope="col">Nit</th>
                <th scope="col">Nombre</th>
                <th scope="col">Direccion</th>
                <th scope="col">Telefono</th>
                <th>Correo</th>
                <th>Fecha creación</th>
                <th scope="col">Acciones</th>
            </tr>
            </thead>
            <tbody>
            @foreach($empresas as $empresa)
                <tr class="text-center">
                    <th scope="row">{{ $empresa->nit }}</th>
                    <td>{{ $empresa->nombre }}</td>
                    <td>{{ $empresa->direccion }}</td>
                    <td>{{ $empresa->telefono }}</td>
                    <td>{{ $empresa->correo }}</td>
                    <td>{{ date('d/M/Y', strtotime($empresa->created_at)) }}</td>
                    <td>
                        <div class="btn-group" role="group" aria-label="">
                            @can('ver_empresas')
                                <a href="{{ action('Backend\EmpresaController@show', $empresa->nit) }}"
                                   name="confirm_item" class="btn btn-primary"
                                   data-toggle="tooltip" data-placement="top" title="ver"><b>Ver</b>
                                </a>
                            @endcan
                            @can('editar_empresas')
                                <a href="{{ action('Backend\EmpresaController@edit', $empresa->nit) }}"
                                   name="confirm_item" class="btn btn-warning"
                                   data-toggle="tooltip" data-placement="top" title=""><b>Editar</b>
                                </a>
                            @endcan
                            @can('eliminar_empresas')
                                <form action="{{ action('Backend\EmpresaController@destroy', $empresa->nit) }}"
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

