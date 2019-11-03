@extends('backend.home')

@section('dashboard-title')
    <div class="row">
        <div class="col-sm-9"><h5 class="font-weight-bold text-white  text-left">Registrar empresa</h5></div>
    </div>
@endsection

@section('dashboard-content')
    <form action="{{ action('Backend\EmpresaController@store') }}" method="post">
        {{ csrf_field() }}
        <ul class="list-group">
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <label for="input-nombre" class="control-label font-weight-bold">Nombre:</label>
                <div class="col-md-9">
                    <input type="text" class="form-control" id="nombre" name="nombre" required>
                </div>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <label for="input-email" class="control-label font-weight-bold">Email:</label>
                <div class="col-md-9">
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <label for="input-nit" class="control-label font-weight-bold">Nit:</label>
                <div class="col-md-9">
                    <input type="number" class="form-control" id="nit" name="nit" required>
                </div>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <label for="input-direccion" class="control-label font-weight-bold">Direccion:</label>
                <div class="col-md-9">
                    <input type="text" class="form-control" id="direccion" name="direccion">
                </div>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <label for="input-telefono" class="control-label font-weight-bold">Telefono:</label>
                <div class="col-md-9">
                    <input type="text" class="form-control" id="telefono" name="telefono">
                </div>
            </li>
            <button type="submit" class="btn btn-primary "><h5>Guardar</h5></button>
        </ul>
    </form>
@endsection

