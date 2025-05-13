// src/components/Cart.js
import React from 'react';
import { useAuth } from '../context/AuthContext'; // Предполагается, что есть контекст для авторизации

const Cart = ({ items, onCheckout }) => {
    const { isAuthenticated } = useAuth(); // Проверка авторизации

    if (!isAuthenticated) {
        return <div>Пожалуйста, авторизуйтесь для доступа к корзине.</div>;
    }

    const totalAmount = items.reduce((total, item) => total + item.price, 0);

    const handleCheckout = () => {
        // Логика для обработки оплаты и доставки
        onCheckout();
    };

    return (
        <div>
            <h1>Корзина</h1>
            {items.length === 0 ? (
                <p>Ваша корзина пуста.</p>
            ) : (
                <div>
                    <ul>
                        {items.map((item) => (
                            <li key={item.id}>
                                {item.name} - {item.price}₽
                            </li>
                        ))}
                    </ul>
                    <h2>Итого: {totalAmount}₽</h2>
                    <button onClick={handleCheckout}>Оформить заказ</button>
                </div>
            )}
        </div>
    );
};

export default Cart;
