@extends('layouts.app')

@section('content')
    <div class="container py-5">
        <h1 class="text-center text-white">I Tuoi Ordini</h1>
        <div class="mb-3">
            <a href="{{ route('dashboard') }}"><i class="fa-solid fa-arrow-left fa-2x text-green"></i></a>
        </div>
        {{-- {{ $orders->links() }} --}}
        <table class="table table-light table-hover">
            @if (count($orders))
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Data</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Cognome</th>
                        <th scope="col">Indirizzo</th>
                        <th scope="col">E-Mail</th>
                        <th scope="col">Telefono</th>
                        {{-- <th scope="col">Quantità</th> --}}
                        <th scope="col">Status</th>
                        <th scope="col">Totale</th>
                        <th scope="col">Dettagli</th>
                    </tr>
                </thead>
            @endif
            <tbody>
                @forelse ($orders as $order)
                    <tr>
                        <th class="align-middle pointer" scope="row">{{ $order->id }}</th>
                        <td class="align-middle pointer">
                            {{ \Carbon\Carbon::parse($order->created_at)->format('d-m-Y H:i') }}</td>

                        <td class="align-middle pointer">{{ $order->first_name }}</td>
                        <td class="align-middle pointer">{{ $order->last_name }}</td>
                        <td class="align-middle pointer ">{{ $order->address }}</td>
                        <td class="align-middle pointer ">{{ $order->email }}</td>
                        <td class="align-middle pointer ">{{ $order->phone }}</td>
                        {{-- @foreach ($order->dishes as $dish)
                                <td>{{ $dish->pivot->quantity }}</td>
                                @endforeach --}}
                        <td class="text-center align-middle pointer">{!! $order->payment_status == 1
                            ? '<i class="fa-solid fa-check text-success"></i>'
                            : '<i class="fa-solid fa-xmark text-danger"></i>' !!}</td>
                        <td class="align-middle pointer">€ {{ $order->total_price }}</td>
                        <td> <a href="{{ route('admin.orders.show', $order->id) }}" class="btn btn-outline-primary mt-1"><i
                                    class="fa-solid fa-eye"></i></a></td>

                    </tr>
                @empty
                    <h1 class="text-center text-white mt-5">Non ci sono ordini da mostrare</h1>
                @endforelse
            </tbody>
        </table>
        {{ $orders->links() }}
    </div>







    {{-- <div class="container py-4">
        <div class="row justify-content-around nt-3">
            @foreach ($orders as $order)
                <div class="col-12 col-sm-6 col-md-6 col-lg-4 mb-3 py-3">
                    <div class="card mb-3" style="width: 18rem;">
                        <div class="card-body">
                          <h5 class="card-title">{{$order->first_name}}</h5>
                          <h5 class="card-title">{{$order->last_name}}</h5>
                          <p class="card-text">{{$order->email}}</p>
                          <p class="card-text">{{$order->phone}}</p>
                          <p class="card-text">{{$order->address}}</p>
                          <p class="card-text">€ {{$order->total_price}}</p>
                          <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" role="switch" id="payment_status" name="payment_status"
                                @if (old('payment_status', $order->payment_status)) checked @endif>
                            <label class="form-check-label" for="payment_status">Pagato</label>
                        </div>
                          <a href="#" class="btn btn-outline-primary mt-1"><i
                            class="fa-solid fa-eye"></i>
                        Mostra
                    </a>
                          {{-- <a href="{{ route('admin.orders.show', $order->id) }}" class="btn btn-outline-primary"><i
                            class="fa-solid fa-eye"></i>
                        Mostra
                    </a> 
                        </div>
                      </div>

                </div> 
            @endforeach
            
        </div>
    </div> --}}
@endsection
