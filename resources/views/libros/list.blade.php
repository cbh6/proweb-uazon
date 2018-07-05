@extends('layout')

@section('content')
<article>
    <div class="container home-categories">
        @foreach($libros as $libro)
            <div class="col-md-4 home-categories__item">
                <p class="home-categories__item-title">{{$libro->titulo}}</p>
                <p class="home-categories__item-title">{{$libro->editorial}}</p>
                <p class="home-categories__item-title">{{$libro->isbn}}</p>
                <p class="home-categories__item-title">{{$libro->precio}} €</p>
            </div>
        @endforeach
        {{$libros->links()}}
</article>
@endsection
