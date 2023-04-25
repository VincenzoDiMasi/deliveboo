@extends('layouts.app')

@section('content')
    <div class="container py-5">
        <div class=" text-center text-white my-3">
            <h1 class="fw-bold" id="title">DeliveBoo</h1>
            <h4>Il miglior delivery-service del mondo!</h4>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header fw-bold d-flex align-items-baseline">
                        <figure class="pt-3">
                            <img class="logo-login"
                            src="https://media.istockphoto.com/id/489250858/it/vettoriale/arancio-casa-icona-con-posate.jpg?s=170667a&w=0&k=20&c=iFSOuknr040sWXUy5rfrUa93Ren80TaLEqgURNQJzps="
                            alt="">
                        </figure>
                        <span class="ms-2">Entra nel mondo DeliveBoo!</span>
                    </div>

                    <div class="card-body">
                        <form method="POST" class="submit-form" action="{{ route('register') }}"
                            enctype="multipart/form-data" novalidate>
                            @csrf
                            <div class="mb-4 row">
                                <label for="name"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Nome') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                        value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    <span class="invalid-feedback" role="alert">
                                        <strong>Il nome è obbligatorio</strong>
                                    </span>

                                </div>
                            </div>

                            <div class="mb-4 row">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Indirizzo E-Mail') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email">

                                    <span class="invalid-feedback" role="alert">
                                        <strong>L'email che hai inserito non è valida</strong>
                                    </span>
                                </div>
                            </div>

                            <div class="mb-4 row">
                                <label for="password"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="new-password">

                                    <span class="invalid-feedback" role="alert">
                                        <strong>La password deve essere di almeno 8 caratteri</strong>
                                    </span>
                                </div>
                            </div>

                            <div class="mb-4 row">
                                <label for="password-confirm"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Conferma Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" required autocomplete="new-password">

                                    <span class="invalid-feedback" role="alert">
                                        <strong>Le due password inserite non coincidono</strong>
                                    </span>
                                </div>
                            </div>


                            <div class="mb-4 row">
                                <label for="restaurant-name"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Nome Ristorante') }}</label>

                                <div class="col-md-6">
                                    <input id="restaurant-name" type="text"
                                        class="form-control @error('restaurant_name') is-invalid @enderror"
                                        name="restaurant_name" value="{{ old('restaurant_name') }}" required
                                        autocomplete="restaurant_name" autofocus>

                                    <span class="invalid-feedback" role="alert">
                                        <strong>Il nome del ristorante è obbligatorio</strong>
                                    </span>
                                </div>
                            </div>

                            <div class="mb-4 row">
                                <label for="address"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Indirizzo') }}</label>

                                <div class="col-md-6">
                                    <input id="address" type="text"
                                        class="form-control @error('address') is-invalid @enderror" name="address"
                                        value="{{ old('address') }}" required autocomplete="address" autofocus>

                                    <span class="invalid-feedback" role="alert">
                                        <strong>L'indirizzo del ristorante è obbligatorio</strong>
                                    </span>
                                </div>
                            </div>

                            <div class="mb-4 row">
                                <label for="p_iva"
                                    class="col-md-4 col-form-label text-md-right">{{ __('P.IVA') }}</label>

                                <div class="col-md-6">
                                    <input id="p_iva" type="text"
                                        class="form-control @error('p_iva') is-invalid @enderror" name="p_iva"
                                        value="{{ old('p_iva') }}" required autocomplete="p_iva" autofocus>

                                    <span class="invalid-feedback" role="alert">
                                        <strong>la P.IVA che hai inserito non è valida</strong>
                                    </span>
                                </div>
                            </div>

                            <div class="mb-4 row">
                                <label for="image"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Immagine') }}</label>

                                <div class="col-md-6">
                                    <input type="file" class="form-control @error('image') is-invalid @enderror"
                                        id="image" name="image">

                                    <span class="invalid-feedback" role="alert">
                                        <strong>I formati supportati dell'immagine sono: jpg, jpeg, png, svg</strong>
                                    </span>
                                </div>
                            </div>

                            <div class="mb-4 row">
                                <label for="phone"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Telefono') }}</label>

                                <div class="col-md-6">
                                    <input id="phone" type="text"
                                        class="form-control @error('phone') is-invalid @enderror" name="phone"
                                        value="{{ old('phone') }}" required autocomplete="phone" autofocus>

                                    <span class="invalid-feedback" role="alert">
                                        <strong>Il numero di telefono che hai inserito non è valido</strong>
                                    </span>
                                </div>
                            </div>

                            <div class="mb-4 row">
                                <label for="delivery_cost"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Costo consegna €') }}</label>

                                <div class="col-md-6">
                                    <input id="delivery_cost" type="number"
                                        class="form-control @error('delivery_cost') is-invalid @enderror"
                                        name="delivery_cost" value="{{ old('delivery_cost', 0) }}"
                                        autocomplete="delivery_cost" autofocus min='0' max='10'>

                                    <span class="invalid-feedback" role="alert">
                                        <strong>Il costo di consegna che hai inserito non può essere superiore di
                                            10€</strong>
                                    </span>
                                </div>
                            </div>

                            <div class="mb-4 row">
                                <label for="min_order"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Ordine minimo €') }}</label>

                                <div class="col-md-6">
                                    <input id="min_order" type="number"
                                        class="form-control @error('min_order') is-invalid @enderror" name="min_order"
                                        value="{{ old('min_order', 0) }}" autocomplete="min_order" autofocus
                                        min='0'>

                                    <span class="invalid-feedback" role="alert">
                                        <strong>L'ordine minimo che hai inserito non è valido</strong>
                                    </span>
                                </div>
                            </div>

                            <div class="mb-4 row">
                                <label for=""
                                    class="col-md-4 col-form-label text-md-right">{{ __('Tipologia Ristorante') }}</label>

                                <div class="col-md-6">
                                    @forelse ($types as $type)
                                        <div class="form-check form-check-inline @error('types') is-invalid @enderror">
                                            <input class="form-check-input types" type="checkbox"
                                                id="type-{{ $type->id }}" value="{{ $type->id }}"
                                                name="types[]" @if (in_array($type->id, old('types', []))) checked @endif>
                                            <label class="form-check-label text-capitalize"
                                                for="type-{{ $type->id }}">{{ $type->name }}</label>
                                        </div>
                                    @empty
                                        -
                                    @endforelse
                                    <span class="invalid-feedback" role="alert">
                                        <strong>La tipologia del ristorante è obbligatoria</strong>
                                    </span>
                                </div>
                            </div>


                            <div class="mb-4 row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-success">
                                        {{ __('Registrati!') }}
                                    </button>
                                    <a href="{{ route('login') }}" class="btn btn-secondary ms-3">Annulla</a>
                                </div>
                            </div>
                        </form>
                        @section('scripts')
                            @include('auth.user-form-validation')
                        @endsection
                    </div>
                </div>
            </div>
        </div>
        
    </div>
@endsection
