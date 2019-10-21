@extends('layouts.app')

@section('dashboard-title')
    <div class="row">
        <div class="col-sm-9"><h5 class="pl-2 font-weight-bold text-left">Inicio</h5></div>
    </div>
@endsection

@section('dashboard-content')
    <div class="card-body">

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



