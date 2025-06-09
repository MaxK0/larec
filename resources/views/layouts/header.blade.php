<header class="sticky-top">
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
        <div class="container header-container">
            <a class="navbar-brand" href="{{ route('home') }}">
                <img src="{{ asset('img/logo.png') }}" alt="Ларец" class="logo-img">
                <span class="logo-text">ЛАРЕЦ</span>
            </a>

            <div class="search-box mx-lg-3 flex-grow-1">
                <form class="d-flex" action="{{ route('products.index') }}" method="GET">
                    <div class="input-group">
                        <input type="search" name="q" class="form-control search-input" placeholder="Поиск продуктов..."
                               aria-label="Search">
                        <button class="btn btn-search" type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </form>
            </div>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}"><i class="fas fa-home me-1"></i> Главная</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('categories.index') }}"><i class="fas fa-list me-1"></i>
                            Каталог</a>
                    </li>
                    <li class="nav-item position-relative">
                        <a class="nav-link" href="{{ route('cart.index') }}">
                            <i class="fas fa-shopping-cart me-1"></i> Корзина
                            @php
                                $cartCount = 0;
                                $cart = session()->get('cart', []);
                                foreach ($cart as $item) {
                                    $cartCount += $item['quantity'];
                                }
                            @endphp

                            @if($cartCount > 0)
                                <span class="badge bg-danger cart-counter">{{ $cartCount }}</span>
                            @endif
                        </a>
                    </li>
                    @auth
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('orders.index') }}"><i class="fas fa-user me-1"></i>Личный
                                кабинет</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('logout') }}"
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="fas fa-right-from-bracket me-1"></i>Выйти
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}"><i class="fas fa-user me-1"></i>Войти</a>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
</header>
