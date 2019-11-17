<div class="row">
    <div class="col-sm-9"><h5 class="font-weight-bold text-primary  text-left">Registrar recibo</h5></div>
</div>


<form action="{{ action('Backend\ReciboController@store') }}" method="post" accept-charset="UTF-8"
      enctype="multipart/form-data">
    {{ csrf_field() }}
    <ul class="list-group">
        <li class="list-group-item d-flex justify-content-between align-items-center">
            <label for="input-num-factura" class="control-label">Número recibo:</label>
            <div class="col-md-9">
                <input type="number" class="form-control" id="num-recibo" name="num-recibo" required>
            </div>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-center">
            <label for="input-cliente" class="control-label">Fecha pago:</label>
            <div class="col-md-9">
                <input type="date" class="form-control" id="fecha-recibo" name="fecha-recibo" required>
            </div>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-center">
            <label for="input-descripcion" class="control-label">Descripcion:</label>
            <div class="col-md-9">
                <textarea class="form-control" rows="3" name="descripcion" id="descripcion"></textarea>
            </div>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-center">
            <label for="input-valor" class="control-label">Valor abono ($):</label>
            <div class="col-md-9">
                <input type="number" class="form-control" id="valor-abono" name="valor-abono" required>
            </div>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-center">
            <label for="input-valor" class="control-label">Archivo adjunto (Max: 10 mb):</label>
            <div class="col-md-9">
                <input type="file" class="form-control" name="file" id="file">
            </div>
        </li>
        <input type="hidden" id="generador" name="generador" value="{{ $factura->empresa_generadora_nit }}">
        <input type="hidden" id="factura_id" name="factura_id" value="{{ $factura->num_factura }}">
        <input type="hidden" id="cliente" name="cliente" value="{{ $factura->empresa_nit }}">
        <button type="submit" class="btn btn-primary">Guardar</button>
    </ul>
</form>


