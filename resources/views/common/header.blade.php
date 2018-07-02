<!-- Main header -->
<header>
<div class="container">
        <div class="row">
            <div class="col-md-6">

                <!-- Logo -->
                <div class="logo">
                    <a class="logo__link" href="{{ route('home') }}">
                        Proweb<span class="logo__highlight">Uazon</span>
                    </a>
                </div>

            </div>
            <div class="col-md-6">

                <!-- Header tools -->
                <ul>
                    <li><a href="{{ route('login') }}">Login</a></li>
                    <li><a href="{{ route('register') }}">Registrarse</a></li>
                    <li><a href="#">Carrito de la compra</a></li>
                </ul>
               
            </div>
        </div>
    </div>

    <!-- Navigation -->
    @include('common.navigation')
</header>