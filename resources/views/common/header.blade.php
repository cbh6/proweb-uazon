<!-- Main header -->
<header class="main-header">
    <div class="container main-header__container">
        <div class="row">
            <div class="col-md-12">

                <!-- Header tools -->
                <ul class="header-links">
                    @guest
                        <li class="header-links__item"><a class="header-links__link" href="{{ route('login') }}">Login</a></li>
                        <li class="header-links__item"><a class="header-links__link" href="{{ route('register') }}">Registrarse</a></li>
                    @else
                        <li class="header-links__item"><a class="header-links__link" href="#">{{Auth::user()->name}}</a></li>
                    @endguest
                    <li class="header-links__item"><a class="header-links__link" href="#">Carrito de la compra</a></li>
                </ul>

            </div>

        </div>
        <div class="row">
            <div class="col-md-6">

                <!-- Logo -->
                <div class="logo">
                    <a class="logo__link" href="{{ route('home') }}">
                        Proweb<span class="logo__highlight">Uazon</span>
                    </a>
                </div>
            </div>
            <!-- Main navigation -->
            <div class="col-md-6">
                <nav>
                    <ul class="header-links">
                        <li class="header-links__item header-links__item--higher"><a class="header-links__link" href="{{ route('libros.list') }}">Libros</a></li>
                        <li class="header-links__item header-links__item--higher"><a class="header-links__link" href="{{ route('autores.list') }}">Autores</a></li>
                        <li class="header-links__item header-links__item--higher"><a class="header-links__link" href="top-reading.html">Lo más leído</a></li>
                        <li class="header-links__item header-links__item--higher"><a class="header-links__link" href="reviews.html">Críticas de libros</a></li>
                        <li class="header-links__item header-links__item--higher"><a class="header-links__link" href="contact.html">Contacto</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</header>
