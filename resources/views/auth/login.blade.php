@extends('layouts.loginregister')

@section('content')
    <div class="container">
        <div class="row justify-content-center align-items-center" style="height: 94vh;">
            <div class="col-lg-4 col-md-6 col-sm-8">
                <div class="tarjeta">
                    <div class="card-body login-card">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="row logo mb-3">
                                <img src="{{ asset('img/logo.png') }}" alt="Logo PROSMAN IPM">
                            </div>
                            <div class="user-box">
                                {{-- <label for="email" class="col-form-label text-light">{{ __('Usuario') }}</label> --}}
                                <input id="email" type="email" class=" @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email') }}" required autocomplete="off" autofocus
                                    placeholder="Correo Electronico">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="user-box">
                                {{-- <label for="password" class="col-form-label text-light">{{ __('Contraseña') }}</label> --}}
                                <input id="password" type="password" class="@error('password') is-invalid @enderror"
                                    name="password" required autocomplete="current-password" placeholder="Contraseña">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>
                            <div class="row">
                                <div class="d-flex justify-content-center">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Ingresar') }} <span></span>
                                    </button>

                                    <!-- @if (Route::has('password.request'))
    <a class="btn btn-link" href="{{ route('password.request') }}">
                                                            {{ __('Olvide mi contraseña?') }}
                                                        </a>
    @endif -->
                                </div>
                                <div class="w-100 d-flex justify-content-center mt-3">
                                    <a href="https://nxg.com.mx" target="_blank"><img src="{{ asset('img/Powered_By_NXG.svg') }}"
                                        class="powerby" alt="Logo NextGen"
                                        width="auto" height="35px"></a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
