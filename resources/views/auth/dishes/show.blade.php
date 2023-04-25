@extends('layouts.app')

@section('content')
    <main>
        <div class="container py-5">
            <div class="row">

                @if (session('not-allowed'))
                    <div class="col-12 alert alert-warning hideMeAfter5Seconds">
                        {{ session('not-allowed') }}
                    </div>
                @endif

                <div class="col-12">
                    <div class="row align-items-center mb-3">
                        <div class="col-1">
                            <a href="{{ route('admin.dishes.index') }}"><i
                                    class="fa-solid fa-arrow-left fa-2x text-green"></i></a>
                        </div>
                        <div class="col-11">
                            <h2 class="fw-bold text-white d-none d-md-block">{{ $dish->name }}</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div id="overlay-alert">
                        <div class="alert alert-light" role="alert">
                            Confermi di voler eliminare il piatto?
                            <div class="d-flex justify-content-around mt-3">
                                <button id="delete-confirm" class="btn btn-success">Conferma</button>
                                <button id="delete-return" class="btn btn-danger">Annulla</button>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="row g-0">
                            <div class="col-sm-12 col-lg-5">
                                <img src="{{ $dish->image ? asset('storage/' . $dish->image) : 'https://www.salepepe.it/files/2019/06/cibo-spazzatura-@salepepe.jpg' }}"
                                    alt="{{ $dish->slug }}" class="card-show img-fluid">
                            </div>
                            <div class="col-sm-12 col-lg-7">
                                <div class="card-body">
                                    <h3 class="card-title mb-3">Informazioni</h3>
                                    <ul class="list-group mb-3">
                                        <li class="list-group-item d-block d-md-none">Nome: {{ $dish->name }}</li>

                                        <li class="list-group-item">Prezzo: {{ $dish->price }}€</li>

                                        <li class="list-group-item">Descrizione: {{ $dish->description }}</li>

                                        <li class="list-group-item">
                                            Disponibilità:
                                            @if ($dish->availability == 1)
                                                <span class="text-success">Disponibile</span>
                                            @else
                                                <span class="text-alert">Non disponibile</span>
                                            @endif
                                        </li>
                                    </ul>
                                    <a href="{{ route('admin.dishes.edit', $dish->id) }}"
                                        class="btn btn-outline-warning me-2"><i class="fa-solid fa-pencil"></i>
                                        Modifica
                                    </a>
                                    <form action="{{ route('admin.dishes.destroy', $dish->id) }}" method="post"
                                        class="d-inline form-dish-delete delete-form">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-outline-danger"><i
                                                class="fa-solid fa-trash-can"></i>
                                            Elimina
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>


    {{-- <div class="container text-center d-flex justify-content-center">
    <div class="card card-show my-5">
        <img src="https://www.frescadelivery.com/wp-content/uploads/2020/06/Antipasto-misto-for-2-1-scaled-e1619175792723.jpg"
            alt="">
        <div class="card-body">
            <h5 class="card-title">{{ $dish->name }}</h5>
            <p class="card-text">{{ $dish->description }}</p>
            <p><strong>€ {{ $dish->price }}</strong></p>
            <div class="d-flex justify-content-around">
                <a href="{{ route('admin.dishes.index') }}" class="btn btn-outline-success me-2"><i class="fa-sharp fa-solid fa-circle-arrow-left me-1"></i>Torna indietro</a>
                <a href="{{ route('admin.dishes.edit', $dish->id) }}" class="btn btn-outline-warning me-2"><i class="fa-solid fa-pencil"></i>
                    Modifica
                </a>
                <form class="delete-form d-inline"  action="{{route("admin.dishes.destroy", $dish->id)}}" method="POST">
                    @csrf
                    @method("DELETE")
                    <button type="submit" class="btn btn-outline-danger"><i class="fa-solid fa-trash-can"></i>
                        Elimina
                    </button>
                </form>
            </div>
        </div>
    </div>
</div> --}}
@endsection



@section('scripts')
    <script>
        const deleteForms = document.querySelectorAll('.delete-form');
        const alert = document.getElementById('overlay-alert');
        const deleteButton = document.getElementById('delete-confirm');
        const returnButton = document.getElementById('delete-return');
        deleteForms.forEach(form => {
            form.addEventListener('submit', (e) => {
                e.preventDefault();
                alert.style.display = 'flex';
                deleteButton.addEventListener('click', () => {
                    form.submit();
                    alert.style.display = 'none';
                })
                returnButton.addEventListener('click', () => {
                    alert.style.display = 'none';
                })
            })
        });
    </script>
@endsection
