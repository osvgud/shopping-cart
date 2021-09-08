#!/usr/bin/env php
<?php

require "vendor/autoload.php";

$open = fopen("cart.csv", "r");
$cart = new Cart();
while (($data = fgetcsv($open, 1000, ";")) !== FALSE)
{
    $cartItem = new CartItem($data[0], $data[2], $data[3] ?? 0 , $data[4] ?? null);
    if ($cartItem->getQuantity() > 0) {
        $cart->addToCart($cartItem);
    }

    if ($cartItem->getQuantity() < 0) {
        $cart->removeFromCart($cartItem);
    }

    echo "\n";
}
