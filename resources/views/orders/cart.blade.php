@extends('layout')

@section('content')
<article>
    <div class="container cart">
        <h2 class="title cart__title">Cesta</h2>
        @if(count($pedido) > 0)
          <div class="row cart__table-wrapper">
            <table class="cart__table">
              <thead>
                <th></th>
                <th>Artículo</th>
                <th>Precio</th>
                <th>Cantidad</th>
              </thead>
              @foreach($pedido as $linea_pedido)
              <tr id="{{$linea_pedido['libro']->id}}">
                <td>
                  <img class="cart__item-cover"
                    src="{{$linea_pedido['libro']->portada}}"
                    alt="Portada del libro" />
                </td>
                <td class="cart__item-title">
                  <a href="{{ route('libros.detail', ['id' => $linea_pedido['libro']->id]) }}">{{$linea_pedido['libro']->titulo}}</a>
                </td>
                <td class="cart__item-price">
                {{$linea_pedido['precio']}} €
                </td>
                <td class="cart__item-qty" align="center">
                {{$linea_pedido['cantidad']}}
                </td>
                <td>
                  <a onClick="removeFromCart({{$linea_pedido['libro']->id}})">Eliminar</a>
                </td>
              </tr>
              @endforeach
            </table>
          </div>
          <div class="row">
            <div class="col-md-6">
              <p class="cart__total">Total: <span class="cart__total-qty">{{$total}}</span> €</p>
            </div>
            <div class="col-md-6">
              <a href="{{ route('order')}}" class="btn cart__order-btn">Tramitar pedido</a>
            </div>
          </div>
        @else
          <p class="cart__void-cart-message">Todavía no has añadido ningún artículo a la cesta</p>
        @endif
        
    </div>
    <script>
        function removeFromCart(id) {
            console.log(id);
            $.ajax({
                url: '/removeFromCart',
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {id},
                dataType: 'JSON',
                success: function (data) { 
                   $('.header-links__cart-items').html(`(${data.items})`);
                   $('.cart__total-qty').html(data.total);
                   $(`#${id}`).remove();
                }
            }); 
        }
    </script>
</article>
@endsection
