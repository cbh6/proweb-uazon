@extends('layout')

@section('content')
<article>
    <div class="container order">
        <h2 class="title order__title">Resumen del pedido</h2>
          <div class="row order__row">
            <table class="order__resume-table">
              <tr>
                <td>Número de artículos:</td>
                <td>{{$items}}</td>
              </tr>
              <tr>
                <td>
                  Envío:
                </td>
                <td>5 €</td>
              </tr>
              <tr>
                <td>Subtotal:</td>
                <td>{{$total}} €</td>
              </tr>
              <tr>
                <td class="order__total">Total:</td>
                <td class="order__total">{{$total + 5}} €</td>
              </tr>
            </table>
          </div>
          
          @auth
            <div class="row order__row">
              <label for="address"><i class="fas fa-map-marker-alt"></i> &nbsp; El pedido se va a enviar a la siguiente dirección:</label>
              <input class="order__address" id="address" type="text" name="address" value="{{Auth::user()->address}}" required autofocus>
            </div>
            <div class="row order__row">
              <a href="{{ route('order')}}" class="btn order__btn">Realizar pedido</a>
            </div>
          @else
            <div class="row order__row">
              <p>Para poder realizar el pedido necesitas estar logeado. <a href="{{ route('login') }}">Ir al login</a></p>
            </div>
          @endauth
          

    </div>
</article>
@endsection
