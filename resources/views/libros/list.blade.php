@extends('layout')

@section('content')
<article>
    <div class="container libros-list">
        <h2 class="libros-list__title">Todos nuestros libros</h2>
        <div class="row libros-list__row">
        @foreach($libros as $libro)
            <div class="col-md-3 libros-list__item">

                <!-- Imagen de la portada -->
                <img class="libros-list__item-cover"
                    src="https://imagessl3.casadellibro.com/a/l/t1/13/9788483468913.jpg"
                    alt="Portada del libro" />
                
                <a class="libros-list__item-info-container" href="{{ route('libros.detail', ['id' => $libro->id]) }}">
                    <span class="libros-list__item-data--large">{{$libro->titulo}}</span>
                    <span class="libros-list__item-data">{{$libro->precio}} €</span>
                </a>
                
                <span class="libros-list__item-author">
                 Por <a href="#">{{$libro->autores[0]->nombre}}</a>
                </span>

                <!-- <button class="btn libros-list__item-button">Ir al detalle</button> -->

            </div>
        @endforeach
        </div>
        {{$libros->links()}}
    </div>
</article>
@endsection
