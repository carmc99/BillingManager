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