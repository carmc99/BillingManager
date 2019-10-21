@extends('backend.home')

@section('dashboard-title')
    <div class="row">
        <div class="col-sm-9"><h5 class="font-weight-bold text-dark text-left">Editar usuario: {{ $usuario->name }}</h5></div>
    </div>
@endsection

@section('dashboard-content')
    <div class="card-body">
       Editar
    </div>
@endsection
