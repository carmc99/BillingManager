@extends('backend.home')

@section('dashboard-title')
    <div class="row">
        <div class="col-sm-9"><h5 class="font-weight-bold text-white  text-left">Editar usuario: {{ $usuario->name }}</h5></div>
    </div>
@endsection

@section('dashboard-content')
        <form action="{{ action('Backend\UserController@update', $usuario->id) }}" method="post">
            {{ csrf_field() }}
            {!! method_field('put') !!}
            <ul class="list-group">
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <label for="input-nombre" class="control-label font-weight-bold">Nombre:</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $usuario->name }}" required>
                    </div>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <label for="input-email" class="control-label font-weight-bold">Email:</label>
                    <div class="col-md-9">
                        <input type="email" class="form-control" id="email" name="email" value="{{ $usuario->email }}" required>
                    </div>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <label for="input-identificacion" class="control-label font-weight-bold">Identificacion:</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" id="identificacion" name="identificacion" value="{{ $usuario->identificacion }}" required>
                    </div>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <label for="input-rol" class="control-label font-weight-bold">Rol:</label>
                    <div class="col-md-9">
                        <select name="rol" id="rol" class="form-control" required>
                            <option value="null">Seleccionar una opcion</option>
                            <option value="Estandar">Estandar</option>
                            <option value="Administrador">Administrador</option>
                        </select>

                    </div>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <label for="input-empresa" class="control-label font-weight-bold">Empresa:</label>
                    <div class="col-md-9">
                        <select name="empresa" id="empresa" class="form-control" required>
                            @foreach($empresas as $empresa)
                                <option value="{{ $empresa->nit }}">{{ $empresa->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <label for="input-generador" class="control-label font-weight-bold">Contraseña:</label>
                    <div class="col-md-9">
                        <input type="password" class="form-control" name="contraseña" id="contraseña">
                    </div>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <label for="input-confirmar-contraseña" class="control-label font-weight-bold">Confirmar contraseña:</label>
                    <div class="col-md-9">
                        <input type="password" class="form-control" name="confirmar_contraseña" id="confirmar_contraseña">
                    </div>
                </li>
                <button type="submit" class="btn btn-primary "><h5>Guardar</h5></button>
            </ul>
        </form>
@endsection
