@extends('layouts.app')

@section('content')
    <div class="card shadow">
        <div class="card-header badge-light m-0"><h5>Factura numero: {{ $factura->num_pago }}</h5></div>
            <form class="form-horizontal" method="post"
                  action="{{action('Backend\FacturaController@update', $factura->id)}}">
                @csrf
                {!! method_field('put') !!}
                <ul class="list-group">
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <label for="input-num-factura" class="control-label">Número factura:</label>
                        <div class="col-md-9">
                            <input type="number" class="form-control" id="num-factura" name="num-factura" value="{{ $factura->num_pago }}" required>
                        </div>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <label for="input-cliente" class="control-label">Cliente:</label>
                        <div class="col-md-9">
                            <select class="form-group" name="cliente" id="cliente">

                            </select>
                        </div>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <label for="input-generador" class="control-label">Generador:</label>
                        <div class="col-md-9">
                            <select class="form-group" name="cliente" id="cliente">
                                <option value="solutech">Solutech</option>
                                <option value="otro">Otro</option>
                            </select>
                        </div>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <label for="input-cliente" class="control-label">Fecha facturacion:</label>
                        <div class="col-md-9">
                            <input type="date" class="form-control" id="num-factura" name="num-factura" value="{{ $factura->fecha_facturacion }}"required>
                        </div>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <label for="input-descripcion" class="control-label">Descripcion:</label>
                        <div class="col-md-9">
                                <textarea class="form-group" name="descripcion" id="descripcion" cols="107" rows="4" >
                                    {{ $factura->descripcion }}
                                </textarea>
                        </div>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <label for="input-valor" class="control-label">Valor total ($):</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" id="valor" name="valor" value="{{ $factura->valor_total   }}">
                        </div>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <label for="input-valor" class="control-label">Archivo adjunto:</label>
                        <div class="col-md-9">
                            <input type="file" name="adj-factura" id="adj-factura">
                        </div>
                    </li>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </ul>
            </form>
    </div>

@endsection