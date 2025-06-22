@extends('layouts.app')

@section('title', 'Главная - Интернет-магазин Ларец')

@section('content')
    <!-- Главный слайдер -->
    <section class="main-slider">
        <div id="mainCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#mainCarousel" data-bs-slide-to="0" class="active"></button>
                <button type="button" data-bs-target="#mainCarousel" data-bs-slide-to="1"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{ asset('img/products_2.jpg') }}" class="d-block w-100" alt="Новинки">
                    <div class="carousel-caption animate__animated animate__fadeIn">
                        <h5>Новые поступления</h5>
                        <p>Свежие продукты от местных фермеров</p>
                        <a href="{{ route('categories.index') }}" class="input_button">В каталог</a>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('img/products.jpg') }}" class="d-block w-100" alt="Качество">
                    <div class="carousel-caption animate__animated animate__fadeIn">
                        <h5>Гарантия качества</h5>
                        <p>Только свежие и натуральные продукты</p>
                        <a href="{{ route('categories.index') }}" class="input_button">В каталог</a>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#mainCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#mainCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon"></span>
            </button>
        </div>
    </section>

    <section class="categories py-5 bg-light">
        <div class="container">
            <h2 class="section-title text-center mb-5">Категории товаров</h2>
            <div class="row g-4">
                @foreach($categories as $category)
                    <div class="col-6 col-md-3">
                        <a href="{{ route('products.byCategory', $category->id) }}"
                           class="category-card animate__animated animate__fadeInUp">
                            <div class="category-icon">
                                @if($category->image)
                                    <img src="{{ asset('storage/' . $category->image) }}" alt="{{ $category->name }}"
                                         class="img-fluid">
                                @else
                                    <i class="fas fa-box"></i>
                                @endif
                            </div>
                            <h3>{{ $category->name }}</h3>
                        </a>
                    </div>
                @endforeach
            </div>
            <div class="text-center mt-4">
                <a href="{{ route('categories.index') }}" class="input_button">Все категории</a>
            </div>
        </div>
    </section>

    <section class="popular-products py-5 bg-light">
        <div class="container">
            <h2 class="section-title text-center mb-5">Товары недели</h2>
            <div class="products">
                @foreach($popularProducts as $product)
                    <div class="product-card">
                        <img src="{{ asset('storage/' . $product->image) }}"
                             alt="{{ $product->name }}"
                             class="product-img">

                        <h3 class="product-name">{{ $product->name }}</h3>
                        <p class="product-desc">{!! nl2br(e($product->description)) !!}</p>
                        <div class="product-card-btn">
                            <p class="price">{{ number_format($product->price, 0) }} руб</p>
                            <form action="{{ route('cart.add', $product->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="input_button">
                                    Добавить в корзину
                                </button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="text-center mt-4">
                <a href="{{ route('products.index') }}" class="input_button">Все товары</a>
            </div>
        </div>
    </section>

    <div class="map-container">
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d37430.81583846662!2d54.35025607314836!3d54.101651914380604!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1z0JfQvdCw0LzQtdC90LrQsCDQnNC40LvQuNGG0LXQudGB0LrQsNGPINGD0LvQuNGG0LAsIDHQkA!5e0!3m2!1sru!2sru!4v1740774060960!5m2!1sru!2sru"
            height="300" style="border:0;" allowfullscreen="" loading="lazy" class="map"
            referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
@endsection
