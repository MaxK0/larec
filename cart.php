<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Интернет-магазин Ларец</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css">
</head>

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
    <footer class="footer">
        <div class="map" style="width: 80%;">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d37430.81583846662!2d54.35025607314836!3d54.101651914380604!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1z0JfQvdCw0LzQtdC90LrQsCDQnNC40LvQuNGG0LXQudGB0LrQsNGPINGD0LvQuNGG0LAsIDHQkA!5e0!3m2!1sru!2sru!4v1740774060960!5m2!1sru!2sru"
                width="1400" height="300" style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
        <div class="footer-container">
            <div class="footer-info">
                <h3>Контакты</h3>
                <p>Антикоррупционная горячая линия: 8 800 600-04-77</p>
                <p>Адрес: ул. Советская, д. 1, г.Знаменка, Россия</p>
                <p>Электронная почта:Leonov.Chest@gmail.com <a></a>

            </div>

            <div class="footer-socials">
                <h3>Мы в соцсетях</h3>
                <a href="https://www.facebook.com" target="_blank">Вконтакте</a>
            </div>

            <div class="footer-privacy">
                <p>Остались вопросы? Свяжитесь с нами!</p>
                <a href="confidentiality.php">Политика конфиденциальности</a>
            </div>
        </div>

    </footer>
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