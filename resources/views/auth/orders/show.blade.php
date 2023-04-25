@extends('layouts.app')

@section('content')
    <div class="container py-5">
        <h1 class="text-center text-white">Dettagli Ordine</h1>
        <div class="my-2">
            <a href="{{ route('admin.orders.index') }}"><i class="fa-solid fa-arrow-left fa-2x text-green"></i></a>
        </div>
        <div class="card">
            <div class="row g-0">
                <div class="col">
                    <div class="card-body">
                        <div class="row row-cols-3 text-center">
                            <h5>Ordine n. {{ $order->id }}</h5>
                            <h5>Cliente: {{ $order->first_name }} {{ $order->last_name }}</h5>
                            <div class="col">
                                <h6 class="text-center">Status Pagamento</h6>
                                <p class="text-center">{!! $order->payment_status == 1
                                    ? '<i class="fa-solid fa-check text-success"></i>'
                                    : '<i class="fa-solid fa-xmark text-danger"></i>' !!}
                                </p>
                            </div>
                        </div>

                        <hr>

                        <div class="row row-cols-md-4">
                            <div class="col">
                                <h6 class="fw-bold">Piatti</h6>
                            </div>
                            <div class="col">
                                <h6 class="fw-bold">Quantità</h6>
                            </div>
                            <div class="col">
                                <h6 class="fw-bold">Prezzo</h6>
                            </div>
                            <div class="col">
                                <h6 class="fw-bold">Totale Parziale</h6>
                            </div>
                        </div>
                        @foreach ($order->dishes as $dish)
                            <div class="row row-cols-md-4">
                                <div class="col border-bttm">
                                    {{ $dish->name }}
                                </div>
                                <div class="col ps-4">
                                    x {{ $dish->pivot->quantity }}
                                </div>
                                <div class="col">
                                    € {{ $dish->price }}
                                </div>
                                <div class="col">
                                    € {{ $dish->getPartialPrice($dish->pivot->quantity) }}
                                </div>
                            </div>
                        @endforeach


                        <hr>

                        <div class="row row-cols-md-4">
                            <div class="col">
                                <h6 class="fw-bold">Indirizzo</h6>
                                <p>{{ $order->address }}</p>
                            </div>
                            <div class="col">
                                <h6 class="fw-bold">E-mail</h6>
                                <p>{{ $order->email }}</p>
                            </div>
                            <div class="col border-rght">
                                <h6 class="fw-bold">Tel.</h6>
                                <p>{{ $order->phone }}</p>
                            </div>
                            <div class="col">
                                <h6 class="fw-bold">Totale</h6>
                                <p>€ {{ $order->total_price }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
