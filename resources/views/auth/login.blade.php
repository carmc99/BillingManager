@extends('layouts.login')


@section('content')
    <div class="container-fluid shadow">
        <div class="row no-gutter">
            <div class="d-none d-md-flex col-md-4 col-lg-6"></div>
            <div class="col-md-8 col-lg-6 ">
                <div class="login d-flex align-items-center">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-9 col-lg-8 mx-auto">
                                <h3 class="login-heading mb-4 text-white font-weight-bold">Bienvenido de vuelta!</h3>
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <div class="form-label-group">
                                        <input id="email" type="email"
                                               class="form-control @error('email') is-invalid @enderror"
                                               name="email" value="{{ old('email') }}" required autocomplete="email"
                                               autofocus placeholder="Email">
                                        <label for="email">{{ __('Correo electronico') }}</label>
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>

                                    <div class="form-label-group">
                                        <input id="password" type="password"
                                               class="form-control @error('password') is-invalid @enderror"
                                               name="password" required autocomplete="current-password" placeholder="Contaseña">
                                        <label for="password">{{ __('Contraseña') }}</label>
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                    <button class="btn btn-lg btn-primary btn-block btn-login text-uppercase font-weight-bold mb-2"
                                            type="submit">  {{ __('Ingresar') }}
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
