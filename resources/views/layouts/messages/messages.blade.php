@if(session('message'))
    <div class="form-group">
        <div class="alert alert-success">
            <span> {{session('message')}} </span>
        </div>
    </div>
@endif
@if(!empty($errors->first()))
    <div class="form-group">
        <div class="alert alert-danger">
            <span>{{ $errors->first() }}</span>
        </div>
    </div>
@endif
@if(session('error'))
    <div class="form-group">
        <div class="alert alert-danger">
            <span>{{ session('error') }}</span>
        </div>
    </div>
@endif

@if(session('recibosAsociadosAlert'))
    <div class="form-group">
        @foreach(session('recibosAsociadosAlert')->all() as $data)
            <div class="alert alert-danger">
                <span>El registro que intenta eliminar posee un recibo asociado, número: {{ $data->num_recibo }}</span>
            </div>
        @endforeach
    </div>
@endif

