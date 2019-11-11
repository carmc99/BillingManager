<ul class="list-group-flush list-inline">
    <li class="list-group-item d-flex justify-content-between align-items-center text-primary font-weight-bold">Numero recibo:
        <span class="text-black-50">
            {{ $factura->recibo->num_recibo }}
        </span>
    </li>
    <li class="list-group-item d-flex justify-content-between align-items-center text-primary font-weight-bold">Empresa:
        <span class="text-black-50">
            {{ $factura->empresa->nombre }}
        </span>
    </li>
    <li class="list-group-item d-flex justify-content-between align-items-center text-primary font-weight-bold">Descripción:
        <span class="text-black-50">
            {{ $factura->recibo->descripcion }}
        </span>
    </li>
    <li class="list-group-item d-flex justify-content-between align-items-center text-primary font-weight-bold">Fecha pago:
        <span class="text-black-50">
            {{ date('d/M/Y', strtotime($factura->recibo->fecha_recibo))  }}
        </span>
    </li>
    <li class="list-group-item d-flex justify-content-between align-items-center text-primary font-weight-bold">Fecha creación:
        <span class="text-black-50">
            {{ date('d/M/Y', strtotime($factura->recibo->created_at))  }}
        </span>
    </li>
    <li class="list-group-item d-flex justify-content-between align-items-center text-primary font-weight-bold">Adjunto:
        <span class="text-black-50">
            <a href="{{ action('Backend\ReciboController@getFile', $factura->recibo->id) }}">Descargar</a>
        </span>
    </li>
</ul>