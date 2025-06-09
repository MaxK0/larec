@extends('layouts.app')

@section('title', 'Каталог продуктов')

@section('content')
    <div class="top-section">
        <h1>Каталог продуктов</h1>
    </div>

    <div class="container py-5">
        @foreach($categories as $category)
            <div class="catalog-section">
                <h2>{{ $category->name }}</h2>
                <div class="products">
                    @foreach($category->products as $product)
                        <div class="product-card">
                            <img src="{{ asset('storage/' . $product->image) }}"
                                 alt="{{ $product->name }}"
                                 class="product-img">

                            <h3 class="product-name">{{ $product->name }}</h3>
                            <details>
                                <summary class="product-summary">Подробнее</summary>
                                <p class="product-desc">{!! nl2br(e($product->description)) !!}</p>
                            </details>
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
            </div>
        @endforeach
    </div>
@endsection
