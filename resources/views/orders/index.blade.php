@extends('layouts.app')

@section('title', 'Личный кабинет')


@section('content')
    <section class="profile py-5">
        <div class="container">
            <h2>Ваши заказы</h2>

            <div class="profile__filter">
                <form method="GET" action="{{ route('orders.index') }}">
                    <select name="status" class="btn btn-primary" onchange="this.form.submit()">
                        <option value="">Все статусы</option>
                        @foreach($statuses as $status)
                            <option value="{{ $status }}" {{ $selectedStatus == $status ? 'selected' : '' }}>
                                {{ $status }}
                            </option>
                        @endforeach
                    </select>
                </form>
            </div>

            @if(count($orders))
                <div class="orders">
                    @foreach($orders as $order)
                        <table class="table show__table">
                            <tbody class="tbody tbody__show">
                            <tr>
                                <th>Товары</th>
                                <td>
                                    <ul>
                                        @foreach($order->products as $product)
                                            <li>{{ $product->name }} ({{ $product->pivot->quantity }})</li>
                                        @endforeach
                                    </ul>
                                </td>
                            </tr>
                            @if(empty($selectedStatus))
                                <tr>
                                    <th>Статус</th>
                                    <td>{{ $order->status }}</td>
                                </tr>
                            @endif
                            <tr>
                                <th>Сумма</th>
                                <td>{{ $order->total }} руб.</td>
                            </tr>
                            <tr>
                                <th>Дата получения заказа</th>
                                <td>{{ $order->date_order }}</td>
                            </tr>
                            </tbody>
                        </table>
                    @endforeach
                </div>
            @else
                <p>У вас нет заказов c этим статусом</p>
            @endif
        </div>
    </section>
@endsection
