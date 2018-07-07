@extends('layout')

@section('content')
<article>
    <section>
        <div class="container libros-detail__main-data-container">
            <h2 class="libros-detail__title">{{$libro->titulo}}</h2>
            <div class="row libros-detail__row">
                <div class="col-md-6 libros-detail__cover-container">
                    <!-- Imagen de la portada -->
                    <img class="libros-detail__cover"
                        src="https://imagessl3.casadellibro.com/a/l/t1/13/9788483468913.jpg"
                        alt="Portada del libro" />
                </div>
                <div class="col-md-6 libros-detail__info-container">
                    <span class="libros-detail__info--large">{{$libro->precio}} €</span>
                    <span class="libros-detail__info">Editorial: {{$libro->editorial}}</span>
                    <span class="libros-detail__info">ISBN: {{$libro->isbn}}</span>
                    <span class="libros-detail__info">
                     Por 
                     @foreach($libro->autores as $autor)
                        <a href="#">{{$autor->nombre}}</a>
                        @if($loop->index !== 0)
                            ,
                        @endif
                    @endforeach
                    </span>
                    
                    <div class="libros-detail__buttons-container">
                        <button class="btn libros-detail__button">Añadir al carrito</button>
                        <button class="btn libros-detail__button">Comprar</button>
                    </div>

                    <div class="libros-detail__availability">
                        <p>Disponible para recoger en tienda, <a href="#">consulta disponibilidad en tiendas cercanas</a></p>
                    </div>
    
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container libros-detail__comments-container">
            <h3 class="title libros-detail__section-title">Comentarios</h3>
            @foreach($libro->comentarios as $comentario)
                <div class="row libros-detail__comment">
                    <div class="libros-detail__comment-header">
                        <span class="libros-detail__comment-icon">{{$comentario->autor[0]}}</span>
                        <span class="libros-detail__comment-author">{{$comentario->autor}}</span>
                    </div>
                    <div class="libros-detail__comment-body">
                        <p class="libros-detail__comment-text">{{$comentario->descripcion}}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
</article>
@endsection
