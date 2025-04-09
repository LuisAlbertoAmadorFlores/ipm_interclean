@extends('layouts.loginregister')

@section('content')
    <div class="container">
        <div class="row justify-content-center align-items-center" style="height: 94vh;">
            <div class="col-lg-4 col-md-6 col-sm-8">
                <div class="tarjeta">

                    <div class="card-body ">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="row logo mb-3">
                                <img src="{{ asset('img/logo.png') }}" alt="Logo CRS SECURITY">
                            </div>

                            <div class="user-box">
                                {{-- <label for="name" class="col-form-label  text-light">{{ __('Nombre') }}</label> --}}

                                <input id="name" type="text" class="@error('name') is-invalid @enderror"
                                    name="name" value="{{ old('name') }}" required autocomplete="off" autofocus
                                    placeholder="Nombre Completo">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="user-box">
                                {{-- <label for="email" class="col-form-label text-light">{{ __('Email') }}</label> --}}
                                <input id="email" type="email" class="@error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email') }}" required autocomplete="off"
                                    placeholder="Correo Electronico">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="user-box">
                                {{-- <label for="password" class=" col-form-label text-light">{{ __('Contraseña') }}</label> --}}
                                <input id="password" type="password" class="@error('password') is-invalid @enderror"
                                    name="password" required autocomplete="new-password" placeholder="Contraseña">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>

                            <div class="user-box">
                                {{-- <label for="password-confirm"
                                    class=" col-form-label  text-light">{{ __('Re-Contraseña') }}</label> --}}
                                <input id="password-confirm" type="password" class="" name="password_confirmation"
                                    required autocomplete="new-password" placeholder="Repetir-contraseña">

                            </div>

                            <div class="row mb-2">
                                <div class="col-md-8 mx-auto d-flex justify-content-center">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Registrar') }} <span></span>
                                    </button>
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
