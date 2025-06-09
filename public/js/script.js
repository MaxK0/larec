// Пример кода для добавления продуктов в корзину
let cart = [];

function addToCart(product) {
    cart.push(product);
    updateCartDisplay();
}

function updateCartDisplay() {
    // Обновление отображения корзины
    console.log("Товары в корзине:", cart);
}

// Пример добавления продукта
addToCart({ name: "Яблоко", price: 50 });


// Пример функции для добавления товара в корзину
function addToCart(productId) {
    // Логика добавления товара в корзину
    console.log(`Товар с ID ${productId} добавлен в корзину.`);
}

// Пример функции для отображения слайдера
let currentSlide = 0;
const slides = document.querySelectorAll('.slider img');

function showSlide(index) {
    slides.forEach((slide, i) => {
        slide.style.display = (i === index) ? 'block' : 'none';
    });
}

function nextSlide() {
    currentSlide = (currentSlide + 1) % slides.length;
    showSlide(currentSlide);
}

setInterval(nextSlide, 3000); // Смена слайдов каждые 3 секунды
showSlide(currentSlide);
