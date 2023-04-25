@extends('layouts.app')

@section('content')
<div class="container dashboard">

    <div class="row justify-content-around d-wrap">
        <div class="col-12 col-md-5 mb-3 ">
            <div class="card">
                    <img src="https://hubicmarketing.it/images/2016/04/elementi-chiave-menu.jpg" class="card-img-top" alt="...">
                    <div class="card-body text-center">
                    <h5 class="card-title fw-bold">I TUOI PIATTI</h5>
                    <p class="card-text">Visualizza, modifica e aggiungi i piatti del tuo ristorante.</p>
                    <a href="{{ route('admin.dishes.index') }}" class="btn btn-green"><i class="fa-solid fa-utensils me-2"></i>VISUALIZZA</a>
                    {{-- <a href="#" class="btn btn-green"><i class="fa-solid fa-utensils me-2"></i>MENU</a> --}}
                    </div>
            </div>
        </div>
        <div class="col-12 col-md-5 mb-3">
            <div class="card">
                    <img src="https://www.zucchetti.it/website/dms/website/soluzioni_per_settori/ordine_478x316.jpg" class="card-img-top" alt="...">
                    <div class="card-body text-center">
                    <h5 class="card-title fw-bold">I TUOI ORDINI</h5>
                    <p class="card-text">Visualizza e gestisci tutti gli ordini del tuo ristorante.</p>
                    {{-- <a href="{{ route('admin.orders.index') }}" class="btn btn-green">ORDINI</a> --}}
                    <a href="{{ route('admin.orders.index') }}" class="btn btn-green"><i class="fa-solid fa-list-ul me-2"></i>VISUALIZZA</a>
                    </div>
            </div>
        </div>
    </div>  
    

   



    {{-- <h2 class="fs-4 text-secondary my-4">
        {{ __('Dashboard') }}
    </h2>
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                <div class="card-header">{{ __('User Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div> --}}
</div>
@endsection
