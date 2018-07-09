@extends('layout')

@section('content')
<article>
    <section>
        <!-- Información principal section -->
        <div class="container autores-detail__main-data-container">
            <h2 class="autores-detail__title">{{$autor->nombre}}</h2>
            <div class="row autores-detail__row">
                <div class="col-md-12 autores-detail__photo-container">
                    <!-- Foto del autor -->
                    <img class="autores-detail__photo"
                        src="https://upload.wikimedia.org/wikipedia/commons/e/e3/Stephen_King%2C_Comicon.jpg"
                        alt="Foto del autor" />
                </div>
                <div class="col-md-12 autores-detail__description-container">
                    <p>Hola que talHola que talHola que talHola que talHola que talHola que talHola que talHola que talHola que talHola que talHola que talHola que talHola que talHola que talHola que tal</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Libros del autor section -->
    <section>
        <div class="container autores-detail__libros-container">
            <h3 class="title autores-detail__section-title">Libros del autor</h3>
            <div class="row autores-detail__row">
            @foreach($libros as $libro)
                <div class="col-md-3 autores-detail__libro">
                    <img class="autores-detail__libro-cover"
                        src="https://imagessl3.casadellibro.com/a/l/t1/13/9788483468913.jpg"
                        alt="Portada del libro" />

                    <div class="autores-detail__libro-info">
                        <a href="{{ route('libros.detail', ['id' => $libro->id]) }}">
                            <span>{{$libro->titulo}}</span>
                        </a>
                    </div>

                </div>
            @endforeach
            </div>
        </div>
    </section>
    <script>
        var url = 'https://en.wikipedia.org/w/api.php?format=json&action=query&prop=extracts&exintro=&explaintext=&titles=Stephen%20King';
        $.ajax({
            url: url,
            beforeSend: function(xhr) {
                xhr.setRequestHeader("X-CSRF-TOKEN'", $('meta[name="csrf-token"]').attr('content'));
            },
            success: function(data) {
                alert(data);
            }
        });
    </script>
</article>
@endsection
