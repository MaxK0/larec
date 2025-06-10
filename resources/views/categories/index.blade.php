@extends('layouts.app')

@section('title', 'Все категории товаров')

@section('content')
    <div class="top-section py-4">
        <h1>Каталог продуктов</h1>
        <p>Выберите категорию и наслаждайтесь свежими продуктами!</p>
    </div>

    <section class="categories-page py-5">
        <div class="container">
            <div class="row g-4">
                @foreach($categories as $category)
                    <div class="col-md-3 col-6">
                        <div class="category-card p-2">
                            <a href="{{ route('products.byCategory', $category->id) }}">
                                @if($category->image)
                                    <img src="{{ asset('storage/' . $category->image) }}" alt="{{ $category->name }}" class="category-image">
                                @else
                                    <div class="category-icon">
                                        <i class="fas fa-box"></i>
                                    </div>
                                @endif
                                <h3 class="category-title">{{ $category->name }}</h3>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
