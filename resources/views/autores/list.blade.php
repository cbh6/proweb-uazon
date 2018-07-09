@extends('layout')

@section('content')
<article>
    <div class="container autores-list">
        <h2 class="title autores-list__title">Todos los autores</h2>
        <div class="row autores-list__row">
        @foreach($autores as $autor)
            <div class="col-md-4">
                <div class="autores-list__item">
                    <!-- Imagen de la portada -->
                    <a href="{{ route('autores.detail', ['id' => $autor->id]) }}">
                        <img class="autores-list__photo"
                            src="https://upload.wikimedia.org/wikipedia/commons/e/e3/Stephen_King%2C_Comicon.jpg"
                            alt="Foto del autor" />
                    </a>
                    
                    <a href="{{ route('autores.detail', ['id' => $autor->id]) }}">
                        <span>{{$autor->nombre}}</span>
                    </a>
                </div>
            </div>
        @endforeach
        </div>
        {{$autores->links()}}
    </div>
</article>
@endsection
