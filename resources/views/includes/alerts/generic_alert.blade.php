@if ($errors->any())
    <div class="alert alert-danger mt-5" role="alert">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@elseif (session('msg'))
    <div class="alert alert-{{ session('type') }} mt-5" role="alert">
        {{ session('msg') }}
    </div>
@endif
