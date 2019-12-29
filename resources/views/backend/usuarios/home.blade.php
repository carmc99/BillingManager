@extends('backend.home')

@section('dashboard-title')
    <div class="row">
        <div class="col-sm-9"><h5 class="pl-2 font-weight-bold text-white text-left">Usuarios</h5></div>
        @can('crear_usuarios')
            <div class="col-sm-3">
                <div class="text-right">
                    <a class="btn btn-light" href="{{ action('Backend\UserController@create') }}">
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
                <th scope="col">Identificación</th>
                <th scope="col">Nombre</th>
                <th>Rol</th>
                <th scope="col">Email</th>
                <th>Empresa</th>
                <th>Fecha creación</th>
                <th scope="col">Acciones</th>
            </tr>
            </thead>
            <tbody>
            @foreach($usuarios as $usuario)
                <tr class="text-center">
                    <th scope="row">{{ $usuario->identificacion }}</th>
                    <td>{{ $usuario->name }}</td>
                    <td>{{ $usuario->getRoleNames()->first() }}</td>
                    <td>{{ $usuario->email }}</td>
                    <td>{{ $usuario->empresa->nombre }}</td>
                    <td>{{ date('d/M/Y', strtotime($usuario->created_at)) }}</td>
                    <td>
                        <div class="btn-group" role="group" aria-label="">
                            @can('crear_usuarios')
                                <a href="{{ action('Backend\UserController@show', $usuario->id) }}"
                                   name="confirm_item" class="btn btn-primary"
                                   data-toggle="tooltip" data-placement="top" title="ver"><span class="fas fa-eye" aria-hidden="true"></span>
                                </a>
                            @endcan
                            @can('editar_usuarios')
                                <a href="{{ action('Backend\UserController@edit', $usuario->id) }}"
                                   name="confirm_item" class="btn btn-warning"
                                   data-toggle="tooltip" data-placement="top" title=""><span class="fas fa-edit" aria-hidden="true"></span>
                                </a>
                            @endcan
                            @can('eliminar_usuarios')
                                <form action="{{ action('Backend\UserController@destroy', $usuario->id) }}"
                                      method="POST">
                                    {{method_field('DELETE')}}
                                    @csrf
                                    <button type="submit" class="btn btn-danger"><span class="fas fa-trash" aria-hidden="true"></span></button>
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
