'use strict';
let cart = document.getElementById('cart-counter');
let cart_number = 0;
function addToCart() {
    cart_number++;
    cart.textContent = cart_number;
}

function openNavbar() {
    let menu_icon = document.getElementById('menu-icon').classList;
    let sidebar = document.getElementById('sidebar').classList;
    menu_icon.toggle('open');
    menu_icon.toggle('fa-times');
    menu_icon.toggle('fa-bars');
    sidebar.toggle('open');
}