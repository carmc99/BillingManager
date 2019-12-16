@extends('backend.home')


@section('dashboard-content')
    <div style="width: 100%">
        {!! $chart->container() !!}
    </div>
@endsection