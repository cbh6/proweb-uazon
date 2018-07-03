<!-- Main header -->
<header class="main-header">
    <div class="container main-header__container">
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
                <ul class="header-links">
                    <li class="header-links__item"><a class="header-links__link" href="{{ route('login') }}">Login</a></li>
                    <li class="header-links__item"><a class="header-links__link" href="{{ route('register') }}">Registrarse</a></li>
                    <li class="header-links__item"><a class="header-links__link" href="#">Carrito de la compra</a></li>
                </ul>

            </div>
        </div>
    </div>

    <!-- Navigation -->
    @include('common.navigation')
</header>
