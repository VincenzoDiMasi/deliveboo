@extends('layouts.app')

@section('content')
    <div class="container py-5">

        <h1 class="text-center text-white">Lista Piatti</h1>

        <div class="d-flex justify-content-between align-items-center">
            <a href="{{ route('dashboard') }}"><i class="fa-solid fa-arrow-left fa-2x text-green"></i></a>

            <div>
                <a href='http://localhost:5174/restaurants/{{ $restaurant->slug }}' class="btn btn-primary me-2">Visualizza
                    Menù</a>
                <a href="{{ route('admin.dishes.create') }}" class="btn btn-success"><i
                        class="fa-solid fa-plus me-2"></i>Aggiungi
                    Piatto</a>
            </div>

        </div>

        <div class="row justify-content-around mt-3">
            <div id="overlay-alert">
                <div class="alert alert-light" role="alert">
                    Confermi di voler eliminare il piatto?
                    <div class="d-flex justify-content-around mt-3">
                        <button id="delete-confirm" class="btn btn-success">Conferma</button>
                        <button id="delete-return" class="btn btn-danger">Annulla</button>
                    </div>
                </div>
            </div>

            @forelse ($dishes as $dish)
                <div class="col-12 col-sm-6 col-md-6 col-lg-4 mb-3 py-3">

                    <div class="card">
                        <img class="image-card rounded-top"
                            src="{{ $dish->image ? asset('storage/' . $dish->image) : 'https://www.salepepe.it/files/2019/06/cibo-spazzatura-@salepepe.jpg' }}"
                            alt="{{ $dish->slug }}">
                        <div class="card-body d-flex flex-column justify-content-between">
                            <h5 class="card-title text-capitalize">{{ $dish->name }}</h5>
                            <p class="card-text">{{ $dish->description }}</p>
                            <p><strong>€ {{ $dish->price }}</strong></p>
                            <div class="d-flex justify-content-around flex-wrap">
                                <a href="{{ route('admin.dishes.show', $dish->id) }}"
                                    class="btn btn-outline-primary d-flex my-1">
                                    <div>
                                        <i class="fa-solid fa-eye"></i>
                                    </div>
                                    <div class="d-sm-none d-md-block ms-1">
                                        <strong>Mostra</strong>
                                    </div>

                                </a>
                                <a href="{{ route('admin.dishes.edit', $dish->id) }}"
                                    class="btn btn-outline-warning d-flex my-1">
                                    <div>
                                        <i class="fa-solid fa-pencil"></i>
                                    </div>
                                    <div class="d-sm-none d-md-block ms-1">
                                        <strong>Modifica</strong>
                                    </div>

                                </a>
                                <form class="delete-form d-inline" action="{{ route('admin.dishes.destroy', $dish->id) }}"
                                    method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger d-flex my-1">
                                        <div>
                                            <i class="fa-solid fa-trash-can"></i>
                                        </div>
                                        <div class="d-sm-none d-md-block ms-1">
                                            <strong>Elimina</strong>
                                        </div>

                                    </button>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <h1 class="text-center text-white mt-5">Non hai ancora registrato piatti!</h1>
            @endforelse
        </div>
        {{ $dishes->links() }}
    </div>
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
