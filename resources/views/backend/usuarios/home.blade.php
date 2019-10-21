@extends('backend.home')

@section('dashboard-title')
    <div class="row">
        <div class="col-sm-9"><h5 class="pl-2 font-weight-bold text-white text-left">Usuarios</h5></div>
        @can('crear_usuarios')
            <div class="col-sm-3">
                <div class="text-right">
                    <button class="btn btn-light" data-toggle="modal"
                            data-target="#registrar-usuario-modal">
                    <span class="icon">
                      <i class="fas fa-circle"></i>
                    </span>
                        <span class="text font-weight-bold">Nuevo registro</span>
                    </button>
                </div>
            </div>
        @endcan
    </div>
@endsection

@section('dashboard-content')
    @include('backend.usuarios.register')
    <div class="card-body">
        <table class="table" id="tabla-facturas">
            <thead>
            <tr class="text-center">
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Email</th>
                <th>Fecha creación</th>
                <th scope="col">Acciones</th>
            </tr>
            </thead>
            <tbody>
            @foreach($usuarios as $usuario)
                <tr class="text-center">
                    <th scope="row">{{ $usuario->id }}</th>
                    <td>{{ $usuario->name }}</td>
                    <td>{{ $usuario->email }}</td>
                    <td>{{ $usuario->created_at->format('d/m/y') }}</td>
                    <td>
                        <div class="btn-group" role="group" aria-label="">
                            @can('crear_usuarios')
                                <a href="{{ action('Backend\UserController@show', $usuario->id) }}"
                                   name="confirm_item" class="btn btn-primary"
                                   data-toggle="tooltip" data-placement="top" title="ver"><b>Ver</b>
                                </a>
                            @endcan
                            @can('editar_usuarios')
                                <a href="{{ action('Backend\UserController@edit', $usuario->id) }}"
                                   name="confirm_item" class="btn btn-warning"
                                   data-toggle="tooltip" data-placement="top" title=""><b>Editar</b>
                                </a>
                            @endcan
                            @can('eliminar_usuarios')
                                <form action="{{ action('Backend\UserController@destroy', $usuario->id) }}"
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
