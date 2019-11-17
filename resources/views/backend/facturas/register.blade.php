@extends('backend.home')

@section('dashboard-title')
    <div class="row">
        <div class="col-sm-9"><h5 class="font-weight-bold text-white  text-left">Registrar factura</h5></div>
    </div>
@endsection

@section('dashboard-content')
    <form action="{{ action('Backend\FacturaController@store') }}" method="post" accept-charset="UTF-8"
          enctype="multipart/form-data">
        {{ csrf_field() }}
        <ul class="list-group">
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <label for="input-num-factura" class="control-label">Número factura:</label>
                <div class="col-md-9">
                    <input type="text" class="form-control" id="num-factura" name="num-factura" required>
                </div>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <label for="input-cliente" class="control-label">Cliente:</label>
                <div class="col-md-9">
                    <select class="form-control" name="cliente" id="cliente" required>
                        @foreach($empresas as $empresa)
                        <option value="{{ $empresa->nit }}">{{ $empresa->nombre }}</option>
                        @endforeach
                    </select>
                </div>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <label for="input-generador" class="control-label">Generador:</label>
                <div class="col-md-9">
                    <select class="form-control" name="generador" id="generador" required>
                        @foreach($empresasGeneradoras as $empresaGeneradora)
                            <option value="{{ $empresaGeneradora->nit }}">{{ $empresaGeneradora->nombre }}</option>
                        @endforeach
                    </select>
                </div>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <label for="input-cliente" class="control-label">Fecha facturacion:</label>
                <div class="col-md-9">
                    <input type="date" class="form-control" id="fecha-factura" name="fecha-factura" required>
                </div>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <label for="input-descripcion" class="control-label">Descripcion:</label>
                <div class="col-md-9">
                    <textarea class="form-control" rows="3" name="descripcion" id="descripcion"></textarea>
                </div>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <label for="input-valor" class="control-label">Valor total ($):</label>
                <div class="col-md-9">
                    <input type="number" class="form-control" id="valor" name="valor" required>
                </div>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <label for="input-valor" class="control-label">Archivo adjunto (Max: 10 mb):</label>
                <div class="col-md-9">
                    <input type="file" class="form-control" name="file" id="file">
                </div>
            </li>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </ul>
    </form>
@endsection

