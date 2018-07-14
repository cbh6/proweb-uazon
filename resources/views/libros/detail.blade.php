@extends('layout')

@section('content')
<article>
    <section>
        <!-- Información principal section -->
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
                    <span class="libros-detail__info">Nº de páginas: {{$libro->n_pags}}</span>
                    <span class="libros-detail__info">
                     Por 
                     @foreach($libro->autores as $autor)
                        <a href="{{ route('autores.detail', ['id' => $autor->id]) }}">{{$autor->nombre}}</a>
                        @if($loop->index !== 0)
                            ,
                        @endif
                    @endforeach
                    </span>
                    
                    <div class="libros-detail__message-container">
                        <span class="libros-detail__message">Libro añadido a la cesta. <a href="#">Ir al pedido</a></span>
                    </div>
                    <div class="libros-detail__buttons-container">
                        <button class="btn libros-detail__button" onclick="addToCart({{$libro}})">Añadir al carrito</button>
                        <button class="btn libros-detail__button">Comprar</button>
                    </div>

                    <div class="libros-detail__availability">
                        <p><i class="fas fa-map-marker-alt"></i> Disponible para recoger en tienda, <br><a href="#">consulta disponibilidad en tiendas cercanas</a></p>
                    </div>
    
                </div>
            </div>
        </div>
    </section>

    <!-- Recomendados section -->
    <section>
        <div class="container libros-detail__recommendations-container">
            <h3 class="title libros-detail__section-title">Te podría interesar</h3>
            <div class="row libros-detail__row">
            @foreach($recomendados as $recomendado)
                <div class="col-md-3 libros-detail__recommendation">
                    <img class="libros-detail__recommendation-cover"
                        src="https://imagessl3.casadellibro.com/a/l/t1/13/9788483468913.jpg"
                        alt="Portada del libro" />

                    <div class="libros-detail__recommendation-info">
                        <a href="{{ route('libros.detail', ['id' => $libro->id]) }}">
                            <span>{{$recomendado->titulo}}</span>
                        </a>
                        <br>
                        <span>
                        Por <a href="{{ route('autores.detail', ['id' => $recomendado->autores[0]->id]) }}">{{$recomendado->autores[0]->nombre}}</a>
                        </span>
                    </div>

                </div>
            @endforeach
            </div>
        </div>
    </section>
    
    <!-- Comentarios section -->
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
            <br>
            @if (\Session::has('success'))
                <p>{{session('message')}}</p>
            @endif
            @auth
                <div class="row libros-detail__new-comment">
                    <h4>Añade un comentario</h4>
                    <form class="libros-detail__form" action="{{ url('/comentario') }}" method="POST">
                        {!! csrf_field() !!}
                        <input type="hidden" name="id_libro" value="{{$libro->id}}" required>
                        <textarea class="input" name="descripcion" id="desripcion" rows="5" required></textarea>
                        <input class="btn libros-detail__button--right" type="submit" value="Comentar">
                    </form>
                </div>
            @else
                <p>Para poder comentar necesitas estar logeado. <a href="{{ route('login') }}">Ir al login</a></p>
            @endauth
        </div>
    </section>

    <script>
        function addToCart(libro) {
            $.ajax({
                url: '/addToCart',
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {libro_id: libro.id, qty: '1'},
                dataType: 'JSON',
                success: function (data) { 
                   $('.header-links__cart-items').html(`(${data.items})`);
                   $('.libros-detail__message-container').fadeIn('slow', function () {
                        $(this).delay(5000).fadeOut('slow');
                    });
                }
            }); 
        }
    </script>
</article>
@endsection
