@extends('backend.home')

@section('dashboard-title')
    <div class="row">
        <div class="col-sm-9"><h5 class="font-weight-bold text-white  text-left">Factura
                numero: {{ $recibo->num_pago }}</h5></div>
    </div>
@endsection

@section('dashboard-content')
    <form class="form-horizontal" method="post"
          action="{{action('Backend\ReciboController@update', $recibo->id)}}">
        @csrf
        {!! method_field('put') !!}
        <ul class="list-group">
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <label for="input-num-factura" class="control-label">Número recibo:</label>
                <div class="col-md-9">
                    <input type="number" class="form-control" id="num-recibo" name="num-recibo" required
                           value="{{ $recibo->num_recibo }}">
                </div>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <label for="input-cliente" class="control-label">Fecha pago:</label>
                <div class="col-md-9">
                    <input type="date" class="form-control" id="fecha-recibo" name="fecha-recibo" required
                           value="{{ date('Y-m-d', strtotime($recibo->fecha_recibo)) }}">
                </div>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <label for="input-descripcion" class="control-label">Descripcion:</label>
                <div class="col-md-9">
                    <textarea class="form-control" rows="3" name="descripcion"
                              id="descripcion">{{ $recibo->descripcion }}</textarea>
                </div>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <label for="input-valor" class="control-label">Archivo adjunto (Max: 10 mb):</label>
                <div class="col-md-9">
                    <input type="file" class="form-control" name="file" id="file">
                </div>
            </li>
            <input type="hidden" id="generador" name="generador" value="{{ $recibo->empresa_generadora_nit }}">
            <input type="hidden" id="factura_id" name="factura_id" value="{{ $recibo->factura_id }}">
            <input type="hidden" id="cliente" name="cliente" value="{{ $recibo->empresa_nit }}">
            <button type="submit" class="btn btn-primary">Guardar</button>
        </ul>
    </form>
@endsection

