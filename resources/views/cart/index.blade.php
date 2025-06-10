@extends('layouts.app')

@section('title', 'Корзина покупок')

@section('content')
    <div class="container py-5">
        <h1>Корзина покупок</h1>
        <p class="cart__desc">Получение и оплата производятся в магазине</p>

        @if(count($cart) > 0)
            <div class="table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th>Товар</th>
                        <th>Название</th>
                        <th>Цена</th>
                        <th>Количество</th>
                        <th>Сумма</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($cart as $id => $item)
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <img src="{{ asset('storage/' . $item['image']) }}" alt="{{ $item['name'] }}"
                                         width="60" class="me-3">
                                </div>
                            </td>
                            <td>
                                {{ $item['name'] }}
                            </td>
                            <td>{{ number_format($item['price'], 0, ',', ' ') }} ₽</td>
                            <td>
                                <form action="{{ route('cart.update', $id) }}" method="POST" class="d-flex">
                                    @csrf
                                    @method('PUT')
                                    <input type="number" name="quantity" value="{{ $item['quantity'] }}" min="1"
                                           class="form-control me-2" style="width: 70px;">
                                    <button type="submit" class="btn btn-sm btn-outline-secondary">Обновить</button>
                                </form>
                            </td>
                            <td>{{ number_format($item['price'] * $item['quantity'], 0, ',', ' ') }} ₽</td>
                            <td>
                                <form action="{{ route('cart.remove', $id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <td colspan="3" class="text-end"><strong>Итого:</strong></td>
                        <td><strong>{{ number_format($total, 0, ',', ' ') }} ₽</strong></td>
                        <td></td>
                    </tr>
                    </tfoot>
                </table>
            </div>

            <div class="cart__btns mt-4">
                <a href="{{ route('categories.index') }}" class="btn btn-outline-primary">
                    <i class="fas fa-arrow-left"></i> Продолжить покупки
                </a>
                <form action="{{ route('orders.checkout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn-confirm btn btn-success btn-lg">
                        <i class="fas fa-check"></i> Оформить заказ
                    </button>
                </form>
            </div>
        @else
            <div class="alert alert-info">
                Ваша корзина пуста
            </div>
            <a href="{{ route('categories.index') }}" class="input_button">
                <i class="fas fa-arrow-left"></i> Перейти к покупкам
            </a>
        @endif
    </div>
@endsection
