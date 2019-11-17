
    <table class="table table-responsive-lg" id="tabla-facturas">
        <thead>
        <tr class="text-center">
            <th scope="col">Num recibo</th>
            <th scope="col">Num factura</th>
            <th>Empresa</th>
            <th scope="col">Descripcion</th>
            <th>Fecha creación</th>
            <th>Adjunto</th>
            <th scope="col">Acciones</th>
        </tr>
        </thead>
        <tbody>
        @foreach($recibos as $recibo)
            <tr class="text-center">
                <th scope="row">{{ $recibo->num_recibo }}</th>
                <th scope="row">{{ $recibo->factura->num_factura }}</th>
                <td>{{ $recibo->empresa->nombre }}</td>
                <td>{{ $recibo->descripcion }}</td>
                <td>{{ date('d/M/Y', strtotime($recibo->created_at)) }}</td>
                <td><a href="{{ action('Backend\ReciboController@getFile', $recibo->id) }}">Descargar</a></td>
                <td>
                    <div class="btn-group" role="group" aria-label="">
                        @can('ver_recibos')
                            <a href="{{ action('Backend\ReciboController@show', $recibo->id) }}"
                               name="confirm_item" class="btn btn-primary"
                               data-toggle="tooltip" data-placement="top" title="ver"><b>Ver</b>
                            </a>
                        @endcan
                        @can('editar_recibos')
                            <a href="{{ action('Backend\ReciboController@edit', $recibo->id) }}"
                               name="confirm_item" class="btn btn-warning"
                               data-toggle="tooltip" data-placement="top" title=""><b>Editar</b>
                            </a>
                        @endcan
                        @can('eliminar_recibos')
                            <form action="{{ action('Backend\ReciboController@destroy', $recibo->id) }}"
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