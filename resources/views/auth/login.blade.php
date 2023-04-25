@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class=" text-center text-white my-3">
            <h1 class="fw-bold">DeliveBoo</h1>
            <h4>Il miglior delivery-service del mondo!</h4>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">

                    <div class="card-header fw-bold d-flex align-items-center">
                        <figure class='m-0'>
                            <img class="logo-login"
                            src="https://media.istockphoto.com/id/489250858/it/vettoriale/arancio-casa-icona-con-posate.jpg?s=170667a&w=0&k=20&c=iFSOuknr040sWXUy5rfrUa93Ren80TaLEqgURNQJzps="
                            alt="">
                        </figure>
                        <span class="ms-2">Login</span>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="mb-4 row">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Indirizzo E-Mail') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-4 row">
                                <label for="password"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="current-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-4 row">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                            {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('Ricordami') }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-4 row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-success">
                                        {{ __('Login') }}
                                    </button>

                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Password dimenticata?') }}
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </form>
                        <div class="d-flex justify-content-end">
                            <p class="me-2">Non sei ancora iscritto? </p>
                            <a href="{{ route('register') }}" class="me-1">Registrati</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
