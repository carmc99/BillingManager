@extends('layouts.app')

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



