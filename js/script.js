'use strict';
let cart = document.getElementById('cart-counter');
let cart_number = 0;
function addToCart() {
    cart_number++;
    cart.textContent = cart_number;
}