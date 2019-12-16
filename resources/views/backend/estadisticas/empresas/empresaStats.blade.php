@extends('backend.home')


@section('dashboard-content')
    <h1>Sales Graphs</h1>

    <div style="width: 50%">
        {!! $chart->container() !!}
    </div>
@endsection