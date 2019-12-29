@extends('layouts.app')

@section('dashboard-title')
    <div class="row">
        <div class="col-sm-9"><h5 class="pl-2 font-weight-bold text-left">Inicio</h5></div>
    </div>
@endsection

@section('dashboard-content')
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-6">
                        <ul class="list-group m-2">
                            <li class="list-group-item bg-danger text-white font-weight-bold">Top deudores mes</li>
                            @foreach($topEmpresasDeudoras as $item)
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    {{ $item->nombre }}
                                    <span class="badge badge-danger badge-pill">{{ $item->cantFacturas }}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <ul class="list-group m-2">
                            <li class="list-group-item bg-danger text-white font-weight-bold">Top deudores historico</li>
                            @foreach($topEmpresasDeudoras as $item)
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    {{ $item->nombre }}
                                    <span class="badge badge-danger badge-pill">{{ $item->cantFacturas }}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <ul class="list-group m-2">
                            <li class="list-group-item bg-danger text-white font-weight-bold">Top deudores mes</li>
                            @foreach($topEmpresasDeudoras as $item)
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    {{ $item->nombre }}
                                    <span class="badge badge-danger badge-pill">{{ $item->cantFacturas }}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <ul class="list-group m-2">
                            <li class="list-group-item bg-danger text-white font-weight-bold">Top deudores mes</li>
                            @foreach($topEmpresasDeudoras as $item)
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    {{ $item->nombre }}
                                    <span class="badge badge-danger badge-pill">{{ $item->cantFacturas }}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="list-group">
                    <li class="list-group-item active font-weight-bold">Ultimas entradas</li>
                    @if($eventos)
                    @foreach($eventos as $item)
                        <div class="list-group-item list-group-item-action flex-column align-items-start">
                            <div class="d-flex w-100 justify-content-between">
                                @if( strlen(strstr($item->tipo_evento, 'Elimino')) > 0)
                                    <h5 class="mb-1 text-danger font-weight-bold">{{ $item->tipo_evento }}</h5>
                                @elseif(strlen(strstr($item->tipo_evento, 'Actualizo')) > 0)
                                    <h5 class="mb-1 text-warning font-weight-bold">{{ $item->tipo_evento }}</h5>
                                @else
                                    <h5 class="mb-1 text-success font-weight-bold">{{ $item->tipo_evento }}</h5>
                                @endif
                                <small>{{ $item->created_at }}</small>
                            </div>
                            <p class="mb-1"><span class="font-weight-bold">Descripcion: </span>{{ $item->descripcion }}
                            </p>
                            <span><span class="font-weight-bold">Autor: </span>{{ $item->autor }}</span>
                        </div>
                    @endforeach
                        @else
                        <div class="list-group-item list-group-item-action flex-column align-items-start">
                            <div class="d-flex w-100 justify-content-center">
                                    No existen registros para mostrar
                            </div>
                        </div>
                    @endif
                </div>
            </div>

        </div>
    </div>
@endsection

@section('content')
    <div class="row">
        @include('layouts.sidebar')
        <div class="col-md-9">
            <div class="card shadow">
                <div class="card-header m-0 badge bg-primary text-white">@yield('dashboard-title')</div>
                @yield('dashboard-content')
            </div>
        </div>
    </div>

@endsection



