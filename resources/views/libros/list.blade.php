@extends('layout')

@section('content')
<article>
    <div class="container libros-list">
        @if(isset($categoria) && $categoria !== '')
            <h2 class="title libros-list__title">{{ ucwords($categoria) }}</h2>
        @else
            <h2 class="title libros-list__title">Todos nuestros libros</h2>
        @endif
        <div class="row libros-list__row">
        @foreach($libros as $libro)
            <div class="col-md-4 libros-list__item">

                <!-- Imagen de la portada -->
                <a href="{{ route('libros.detail', ['id' => $libro->id]) }}">
                    <img class="libros-list__item-cover"
                        src="{{$libro->portada}}"
                        alt="Portada del libro" />
                </a>
                
                <a class="libros-list__item-info-container" href="{{ route('libros.detail', ['id' => $libro->id]) }}">
                    <span class="libros-list__item-data--large">{{$libro->titulo}}</span>
                    <span class="libros-list__item-data">{{$libro->precio}} €</span>
                </a>
                
                <span class="libros-list__item-author">
                 Por <a href="{{ route('autores.detail', ['id' => $libro->autores[0]->id]) }}">{{$libro->autores[0]->nombre}}</a>
                </span>
            </div>
        @endforeach
        </div>
        {{$libros->links()}}
    </div>
</article>
@endsection
