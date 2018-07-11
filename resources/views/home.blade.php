@extends('layout')

@section('content')
<article>
    <div class="container home-categories">
        <h2 class="title">Categorías</h2>
        <div class="row home-categories__row">
            <!-- Novelas -->
            <div class="col-md-4 home-categories__item">
                <div class="home-categories__card">
                    <figure class="home-categories__card-figure">
                        <img src="https://images7.alphacoders.com/529/thumb-1920-529334.jpg" alt="Imagen categoría">
                        <div class="home-categories__card-caption">
                            <h2>Novelas</h2>
                            <p>Descúbrelo...</p>
                            <a href="{{ route('libros.list.categoria', ['categoria' => 'novelas']) }}">Ver más</a>
                        </div>
                    </figure>
                </div>
            </div>
            <!-- Ciencia -->
            <div class="col-md-4 home-categories__item">
                <div class="home-categories__card">
                    <figure class="home-categories__card-figure">
                        <img src="https://naukas.com/fx/uploads/2017/11/libro-ciencia-book.jpg" alt="Imagen categoría">
                        <div class="home-categories__card-caption">
                            <h2>Ciencia</h2>
                            <p>Descúbrelo...</p>
                            <a href="{{ route('libros.list.categoria', ['categoria' => 'ciencia']) }}">Ver más</a>
                        </div>
                    </figure>
                </div>
            </div>
            <!-- Historia -->
            <div class="col-md-4 home-categories__item">
                <div class="home-categories__card">
                    <figure class="home-categories__card-figure">
                        <img src="https://images3.alphacoders.com/261/thumb-1920-261545.jpg" alt="Imagen categoría">
                        <div class="home-categories__card-caption">
                            <h2>Historia</h2>
                            <p>Descúbrelo...</p>
                            <a href="{{ route('libros.list.categoria', ['categoria' => 'historia']) }}">Ver más</a>
                        </div>			
                    </figure>
                </div>
            </div>
        </div>
        <div class="row home-categories__row">
            <!-- Cuentos -->
            <div class="col-md-4 home-categories__item">
                <div class="home-categories__card">
                    <figure class="home-categories__card-figure">
                        <img src="https://www.artescritorio.com/wp-content/uploads/2017/01/libros-5-930x581.jpg" alt="Imagen categoría">
                        <div class="home-categories__card-caption">
                            <h2>Cuentos</h2>
                            <p>Descúbrelo...</p>
                            <a href="{{ route('libros.list.categoria', ['categoria' => 'cuentos']) }}">Ver más</a>
                        </div>			
                    </figure>
                </div>
            </div>
            <!-- Cómics -->
            <div class="col-md-4 home-categories__item">
                <div class="home-categories__card">
                    <figure class="home-categories__card-figure">
                        <img src="http://globalmedicalco.com/photos/globalmedicalco/5/24371.jpg" alt="Imagen categoría">
                        <div class="home-categories__card-caption">
                            <h2>Cómics</h2>
                            <p>Descúbrelo...</p>
                            <a href="{{ route('libros.list.categoria', ['categoria' => 'comics']) }}">Ver más</a>
                        </div>			
                    </figure>
                </div>
            </div>
            <!-- Poesía -->
            <div class="col-md-4 home-categories__item">
                <div class="home-categories__card">
                    <figure class="home-categories__card-figure">
                        <img src="https://images5.alphacoders.com/413/thumb-1920-413487.jpg" alt="Imagen categoría">
                        <div class="home-categories__card-caption">
                            <h2>Poesía</h2>
                            <p>Descúbrelo...</p>
                            <a href="{{ route('libros.list.categoria', ['categoria' => 'poesia']) }}">Ver más</a>
                        </div>			
                    </figure>
                </div>
            </div>
        </div>
        <div class="row home-categories__row">
            <!-- Ficción -->
            <div class="col-md-4 home-categories__item">
                <div class="home-categories__card">
                    <figure class="home-categories__card-figure">
                        <img src="https://images6.alphacoders.com/425/thumb-1920-425046.jpg" alt="Imagen categoría">
                        <div class="home-categories__card-caption">
                            <h2>Ficción</h2>
                            <p>Descúbrelo...</p>
                            <a href="{{ route('libros.list.categoria', ['categoria' => 'ficcion']) }}">Ver más</a>
                        </div>			
                    </figure>
                </div>
            </div>
            <!-- Misterio -->
            <div class="col-md-4 home-categories__item">
                <div class="home-categories__card">
                    <figure class="home-categories__card-figure">
                        <img src="https://images.alphacoders.com/439/thumb-1920-439591.jpg" alt="Imagen categoría">
                        <div class="home-categories__card-caption">
                            <h2>Misterio</h2>
                            <p>Descúbrelo...</p>
                            <a href="{{ route('libros.list.categoria', ['categoria' => 'misterio']) }}">Ver más</a>
                        </div>			
                    </figure>
                </div>
            </div>
            <!-- Biografía -->
            <div class="col-md-4 home-categories__item">
                <div class="home-categories__card">
                    <figure class="home-categories__card-figure">
                        <img src="https://urielarte.files.wordpress.com/2013/08/vintage-wallpaper-hd-free-download-1280x768.jpg" alt="front">
                        <div class="home-categories__card-caption">
                            <h2>Biografía</h2>
                            <p>Descúbrelo...</p>
                            <a href="{{ route('libros.list.categoria', ['categoria' => 'biografia']) }}">Ver más</a>
                        </div>			
                    </figure>
                </div>
            </div>
        </div>
    </div>
</article>
@endsection
