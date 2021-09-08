<?php

class Cart
{
    protected $price;
    protected $cartItems;


    public function __construct()
    {
        $this->price = 0;
        $this->cartItems = [];
    }


    public function addToCart(CartItem $cartItem)
    {
        $this->addItemToCart($cartItem);
        $this->increaseCartPrice($cartItem);
        $this->printCartPrice();
    }

    public function removeFromCart()
    {
        $this->printCartPrice();
    }

    private function addItemToCart($cartItem)
    {
        $itemIdentifier = $cartItem->getIdentifier();

        if (array_key_exists($itemIdentifier, $this->cartItems)) {
            $this->cartItems[$itemIdentifier]->increaseQuantity($cartItem->getQuantity());
        } else {
            $this->cartItems[$itemIdentifier] = $cartItem;
        }
    }

    private function increaseCartPrice(CartItem $cartItem)
    {
        $this->price += $cartItem->getPrice() * $cartItem->getQuantity();
    }

    private function printCartPrice()
    {
        echo round($this->price, 2);
    }
}