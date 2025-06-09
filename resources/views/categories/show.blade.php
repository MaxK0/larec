@extends('layouts.app')

@section('title', $category->name)

@section('content')
    <div class="container py-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1>{{ $category->name }}</h1>
            <a href="{{ route('categories.index') }}" class="btn btn-outline-primary">Назад к категориям</a>
        </div>

        @if($category->products->count() > 0)
            <div class="row">
                @foreach($category->products as $product)
                    <div class="col-md-4 mb-4">
                        <div class="product-card">
                            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="product-image">
                            <div class="product-body">
                                <h3 class="product-title">{{ $product->name }}</h3>
                                <div class="product-price">{{ number_format($product->price, 0, ',', ' ') }} ₽</div>

                                <div class="product-description-toggle">
                                    <i class="fas fa-info-circle"></i> Описание
                                </div>
                                <div class="product-description" style="display: none;">
                                    <p>{{ $product->description }}</p>
                                </div>

                                @auth
                                    <form action="{{ route('cart.add', $product->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-primary btn-block mt-2">
                                            <i class="fas fa-cart-plus"></i> В корзину
                                        </button>
                                    </form>
                                @else
                                    <a href="{{ route('login') }}" class="btn btn-primary btn-block mt-2">
                                        <i class="fas fa-sign-in-alt"></i> Войдите, чтобы купить
                                    </a>
                                @endauth
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="alert alert-info">
                В этой категории пока нет товаров
            </div>
        @endif
    </div>
@endsection
