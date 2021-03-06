<div class="modal fade bd-example-modal-lg" tabindex="-1" id="registrar-usuario-modal" role="dialog"
     aria-labelledby="myLargeModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="{{ action('Backend\UserController@store') }}" method="post" accept-charset="UTF-8"
                  enctype="multipart/form-data">
                {{ csrf_field() }}

                <label for="input-sede" class="control-label">
                    <h5 class="m-0 font-weight-bold text-primary text">Registrar factura:</h5>
                </label>
                <ul class="list-group">
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <label for="input-num-factura" class="control-label">Número factura:</label>
                        <div class="col-md-9">
                            <input type="number" class="form-control" id="num-factura" name="num-factura" required>
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
                            <input type="date" class="form-control" id="num-factura" name="num-factura" required>
                        </div>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <label for="input-descripcion" class="control-label">Descripcion:</label>
                        <div class="col-md-9">
                                <textarea class="form-group" name="descripcion" id="descripcion" cols="69" rows="5">

                                </textarea>
                        </div>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <label for="input-valor" class="control-label">Valor total ($):</label>
                        <div class="col-md-9">
                            <input type="number" class="form-control" id="valor" name="valor">
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
    </div>
</div>
