<!DOCTYPE html>
<html lang="ru">

<?php require_once './components/head.php' ?>

<body>
    <?php require_once './components/header.php' ?>

    </head>
    <div class="main-containerl">
        <div class="cart-content">
            <h1>Корзина</h1>
            <ul class="cart-list" id="cart-items"></ul>
            <div class="cart-total">
                <p>Итого: <span id="total-price">0.00</span>P</p>
                <button onclick="checkout()">Оформить заказ</button>
            </div>
        </div>
    </div>
    
    <?php require_once './components/footer.php' ?>

    <script>
        let cart = JSON.parse(localStorage.getItem('cart')) || [];

        function renderCart() {
            const cartItems = document.getElementById('cart-items');
            const totalPrice = document.getElementById('total-price');
            cartItems.innerHTML = '';
            let total = 0;

            cart.forEach((item, index) => {
                const li = document.createElement('li');
                li.innerHTML = `
                    <span>${item.name} - ${item.price.toFixed(2)}P</span>
                    <button onclick="removeFromCart(${index})">Удалить</button>
                `;
                cartItems.appendChild(li);
                total += item.price;
            });

            totalPrice.textContent = total.toFixed(2);
        }

        function removeFromCart(index) {
            cart.splice(index, 1);
            localStorage.setItem('cart', JSON.stringify(cart));
            renderCart();
        }

        function checkout() {
            alert('Заказ оформлен!');
            cart = [];
            localStorage.setItem('cart', JSON.stringify(cart));
            renderCart();
        }

        renderCart();
    </script>
</body>

</html>