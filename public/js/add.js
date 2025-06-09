let cart = JSON.parse(localStorage.getItem('cart')) || [];

function addToCart(name, price) {
    cart.push({
        name: name,
        price: price
    });
    localStorage.setItem('cart', JSON.stringify(cart));
    updateCartCounter();
    showToast('Товар добавлен в корзину');
}

function updateCartCounter() {
    const counter = document.getElementById('cart-counter');
    if (counter) {
        counter.textContent = cart.length;
    }
}

function showToast(message) {
    const toast = document.createElement('div');
    toast.className = 'cart-toast';
    toast.textContent = message;
    document.body.appendChild(toast);
    
    setTimeout(() => {
        toast.remove();
    }, 2000);
}

// Инициализация при загрузке страницы
document.addEventListener('DOMContentLoaded', () => {
    updateCartCounter();
});