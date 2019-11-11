@extends('backend.home')

@section('dashboard-title')
    <div class="row">
        <div class="col-sm-9"><h5 class="font-weight-bold text-white  text-left">Factura
                numero: {{ $factura->num_pago }}</h5></div>
    </div>
@endsection

@section('dashboard-content')
    <form class="form-horizontal" method="post"
          action="{{action('Backend\FacturaController@update', $factura->id)}}">
        @csrf
        {!! method_field('put') !!}
        <ul class="list-group">
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <label for="input-num-factura" class="control-label">Número factura:</label>
                <div class="col-md-9">
                    <input type="number" class="form-control" id="num-factura" name="num-factura"
                           value="{{ $factura->num_factura }}" required>
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
                    <input type="date" class="form-control" id="fecha-factura" name="fecha-factura"
                           value="{{ $factura->fecha_facturacion }}" required>
                </div>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <label for="input-descripcion" class="control-label">Descripcion:</label>
                <div class="col-md-9">
                    <textarea class="form-control" rows="3" name="descripcion" id="descripcion">{{ $factura->descripcion }}</textarea>
                </div>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <label for="input-valor" class="control-label">Valor total ($):</label>
                <div class="col-md-9">
                    <input type="text" class="form-control" id="valor" name="valor"
                           value="{{ $factura->valor_total   }}">
                </div>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <label for="input-valor" class="control-label">Archivo adjunto:</label>
                <div class="col-md-9">
                    <input type="file" name="file" id="file">
                </div>
            </li>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </ul>
    </form>
@endsection

