<div class="modal fade bd-example-modal-lg" tabindex="-1" id="registrar-usuario-modal" role="dialog"
     aria-labelledby="myLargeModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="{{ action('Backend\UserController@store') }}" method="post">
                {{ csrf_field() }}

                <label for="input-titulo" class="control-label">
                    <h5 class="m-0 font-weight-bold text-primary text-center pl-2">Registrar usuario:</h5>
                </label>
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
                        <label for="input-identificacion" class="control-label font-weight-bold">Identificacion:</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" id="identificacion" name="identificacion" required>
                        </div>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <label for="input-direccion" class="control-label font-weight-bold">Direccion:</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" id="direccion" name="direccion">
                        </div>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <label for="input-telefono-fijo" class="control-label font-weight-bold">Telefono fijo:</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" id="telefono_fijo" name="telefono_fijo">
                        </div>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <label for="input-telefono-movil" class="control-label font-weight-bold">Telefono movil:</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" id="telefono_movil" name="telefono_movil">
                        </div>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <label for="input-rol" class="control-label font-weight-bold">Rol:</label>
                        <div class="col-md-9">
                            <select name="rol" id="rol" class="form-control" required>
                                <option value="Administrador">Administrador</option>
                                <option value="Estandar">Estandar</option></select>
                        </div>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <label for="input-generador" class="control-label font-weight-bold">Contraseña:</label>
                        <div class="col-md-9">
                            <input type="password" class="form-control" name="contraseña" id="contraseña" required>
                        </div>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <label for="input-confirmar-contraseña" class="control-label font-weight-bold">Confirmar contraseña:</label>
                        <div class="col-md-9">
                            <input type="password" class="form-control" name="confirmar_contraseña" id="confirmar_contraseña" required>
                        </div>
                    </li>
                    <button type="submit" class="btn btn-primary "><h5>Guardar</h5></button>
                </ul>
            </form>
        </div>
    </div>
</div>
