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
                        <li class="header-links__item"><a class="header-links__link" href="#">Hola <strong>{{Auth::user()->name}}</strong></a></li>
                        <li class="header-links__item"><a class="header-links__link" href="{{ route('logout') }}">Logout</a></li>
                    @endguest
                    <li class="header-links__item"><a class="header-links__link" href="#"><i class="fas fa-shopping-cart"></i>&nbsp; Cesta <span class="header-links__cart-items">({{Cart::count()}})</span></a></li>
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
                        <li class="header-links__item header-links__item--higher"><a class="header-links__link" href="{{ route('home') }}">Categorías</a></li>
                        <li class="header-links__item header-links__item--higher"><a class="header-links__link" href="{{ route('libros.list') }}">Todos nuestros libros</a></li>
                        <li class="header-links__item header-links__item--higher"><a class="header-links__link" href="{{ route('autores.list') }}">Autores</a></li>
                        <li class="header-links__item header-links__item--higher"><a class="header-links__link" href="contact.html">Contacto</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</header>
