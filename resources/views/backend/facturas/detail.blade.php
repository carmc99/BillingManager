<ul class="list-group-flush list-inline">
    <li class="list-group-item d-flex justify-content-between align-items-center text-primary font-weight-bold">Empresa:
        <span class="text-black-50">
            {{ $factura->empresa->nombre }}
        </span>
    </li>

    <li class="list-group-item d-flex justify-content-between align-items-center text-primary font-weight-bold">
        Generador:
        <span class="text-black-50">{{ $factura->empresaGeneradora->nombre }}</span>
    </li>
    <li class="list-group-item d-flex justify-content-between align-items-center text-primary font-weight-bold">
        Descripción:
        <span class="text-black-50">{{ $factura->descripcion }}</span>
    </li>
    <li class="list-group-item d-flex justify-content-between align-items-center text-primary font-weight-bold">Estado:
        <div>
            @if($factura->getEstado($factura->num_factura)->first() == 'pago')
                <span class="badge badge-success">Pago</span>
            @elseif($factura->getEstado($factura->num_factura)->first() == 'afavor')
                <span class="badge badge-warning">Saldo a favor</span>
            @else
                <span class="badge badge-danger">Pendiente</span>
            @endif
        </div>
    </li>
    <li class="list-group-item d-flex justify-content-between align-items-center text-primary font-weight-bold">Fecha
        facturación:
        <span class="text-black-50">{{ date('d/M/Y', strtotime($factura->fecha_facturacion)) }}</span>
    </li>

    <li class="list-group-item d-flex justify-content-between align-items-center text-primary font-weight-bold">Periodo
        facturación:
        <span class="text-black-50">{{ $factura->periodo_facturacion }}</span>
    </li>

    <li class="list-group-item d-flex justify-content-between align-items-center text-primary font-weight-bold">Fecha
        creación:
        <span class="text-black-50">{{ date('d/M/Y', strtotime($factura->created_at))  }}</span>
    </li>
    <li class="list-group-item d-flex justify-content-between align-items-center text-primary font-weight-bold">
        @if($factura->valor_adeudado > 0)
            Valor
            adeudado: <span class="text-danger">$ {{ number_format($factura->valor_adeudado) }}</span>
        @elseif($factura->valor_adeudado == 0)
            Valor
            adeudado: <span class="text-success">$ {{ number_format($factura->valor_adeudado) }}</span>
        @else
           Saldo a favor: <span class="text-warning"> ${{ number_format($factura->valor_adeudado) }}</span>
        @endif
    </li>
    <li class="list-group-item d-flex justify-content-between align-items-center text-primary font-weight-bold">Valor
        total:
        <span class="text-black-50">$ {{ number_format($factura->valor_total) }}</span>
    </li>
    <li class="list-group-item d-flex justify-content-between align-items-center text-primary font-weight-bold">Adjunto:
        <span class="text-black-50"><a
                    href="{{ action('Backend\FacturaController@getFile', $factura->id) }}">Descargar</a></span>
    </li>
</ul>