<ul class="list-group-flush list-inline">
    <li class="list-group-item d-flex justify-content-between align-items-center text-primary font-weight-bold">Empresa:
        <span class="text-black-50">
            {{ $factura->empresa->nombre }}
        </span>
    </li>

    <li class="list-group-item d-flex justify-content-between align-items-center text-primary font-weight-bold">Generador:
        <span class="text-black-50">{{ $factura->empresaGeneradora->nombre }}</span>
    </li>
    <li class="list-group-item d-flex justify-content-between align-items-center text-primary font-weight-bold">
        Descripción:
        <span class="text-black-50">{{ $factura->descripcion }}</span>
    </li>
    <li class="list-group-item d-flex justify-content-between align-items-center text-primary font-weight-bold">Estado:
        <div>
            @if($factura->estado)
                <span class="badge badge-success">Pago</span>
            @else
                <span class="badge badge-danger">Pendiente</span>
            @endif
        </div>
    </li>
    <li class="list-group-item d-flex justify-content-between align-items-center text-primary font-weight-bold">Fecha
        facturación:
        <span class="text-black-50">{{ $factura->fecha_facturacion }}</span>
    </li>
    <li class="list-group-item d-flex justify-content-between align-items-center text-primary font-weight-bold">Fecha
        creación:
        <span class="text-black-50">{{ $factura->created_at }}</span>
    </li>
    <li class="list-group-item d-flex justify-content-between align-items-center text-primary font-weight-bold">Valor
        total:
        <span class="text-black-50">$ {{ $factura->valor_total }}</span>
    </li>
</ul>