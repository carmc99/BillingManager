@extends('layouts.app')


@section('content')
    <div class="row">
       @include('layouts.sidebar')
        <div class="col-md-9">
            <div class="card shadow">
                <div class="card-header m-0 badge badge-light">@yield('dashboard-title')</div>
                <div class="card-body">
                    @yield('dashboard-content')
                </div>
            </div>
        </div>
    </div>

@endsection

