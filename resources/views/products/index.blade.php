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
                            <p class="product-desc">{!! nl2br(e($product->description)) !!}</p>
                            <div class="product-card-btn">
                                <p class="price">{{ number_format($product->price, 0) }} руб</p>
                                <button type="button" class="input_button add-to-cart" data-product-id="{{ $product->id }}">
                                    Добавить в корзину
                                </button>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>
@endsection

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Обработчик для всех кнопок "Добавить в корзину"
        document.querySelectorAll('.add-to-cart').forEach(button => {
            button.addEventListener('click', function(e) {
                e.preventDefault();
                const productId = this.getAttribute('data-product-id');
                const originalText = this.textContent;

                // Показываем загрузку
                this.textContent = 'Добавление...';
                this.disabled = true;

                // Отправляем AJAX запрос
                fetch(`/cart/add/${productId}`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: JSON.stringify({})
                })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            // Обновляем счетчик корзины
                            updateCartCounter(data.cart_count);

                            // Меняем текст кнопки на успех
                            this.textContent = 'Добавлено!';

                            // Через 2 секунды возвращаем исходный текст
                            setTimeout(() => {
                                this.textContent = originalText;
                                this.disabled = false;
                            }, 1000);
                        } else {
                            alert('Ошибка при добавлении товара');
                            this.textContent = originalText;
                            this.disabled = false;
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        alert('Произошла ошибка');
                        this.textContent = originalText;
                        this.disabled = false;
                    });
            });
        });

        // Функция обновления счетчика корзины
        function updateCartCounter(count) {
            const counterElement = document.querySelector('.cart-counter');
            const cartLink = document.querySelector('.nav-link[href="{{ route('cart.index') }}"]');

            if (count > 0) {
                if (counterElement) {
                    counterElement.textContent = count;
                } else {
                    // Создаем badge если его нет
                    const badge = document.createElement('span');
                    badge.className = 'badge bg-danger cart-counter';
                    badge.textContent = count;
                    cartLink.appendChild(badge);
                }
            } else if (counterElement) {
                counterElement.remove();
            }
        }
    });
</script>
