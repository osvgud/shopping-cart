<?php

namespace App\Model;

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

    public function removeFromCart(CartItem $removableCartItem)
    {
        $removableCartItem->invertQuantity();
        $removableQuantity = $removableCartItem->getQuantity();

        /** @var CartItem $cartItem */
        foreach($this->cartItems as $index => $cartItem) {
            if ($removableCartItem->getIdentifier() === $cartItem->getIdentifier()) {
                if ($cartItem->getQuantity() <= $removableQuantity) {
                    unset($this->cartItems[$index]);
                    $decreaseQuantity = $cartItem->getQuantity();
                    $removableQuantity -= $cartItem->getQuantity();
                } else {
                    $cartItem->decreaseQuantity($removableQuantity);
                    $decreaseQuantity = $removableQuantity;
                    $removableQuantity = 0;
                }

                $this->decreaseCartPrice($cartItem->getPrice(), $decreaseQuantity);

                if (!$removableQuantity) {
                    break;
                }
            }
        }
        $this->printCartPrice();
    }

    private function addItemToCart(CartItem $cartItem)
    {
        $this->cartItems[] = $cartItem;
    }

    private function increaseCartPrice(CartItem $cartItem)
    {
        $this->price += $cartItem->getPrice() * $cartItem->getQuantity();
    }


    private function decreaseCartPrice(float $price, int $quantity)
    {
        $this->price -= $price * $quantity;
    }

    private function printCartPrice()
    {
        echo round($this->price, 2);
    }
}