@if(session()->has('success'))
    <div class="form-group">
        <div class="alert alert-success">
            <span> {{session('success')}} </span>
        </div>
    </div>

@endif
@if(session()->has('error'))
    <div class="form-group">
        <div class="alert alert-danger">
            <span> {{session('error')}} </span>
        </div>
    </div>
@endif