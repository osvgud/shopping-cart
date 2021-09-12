<?php

namespace App\Model;

class CartItem
{
    protected $identifier;
    protected $quantity;
    protected $price;
    protected $currency;

    /**
     * @param $identifier
     * @param $quantity
     * @param $price
     * @param $currency
     */
    public function __construct($identifier, $quantity, $price, $currency)
    {
        $this->identifier = $identifier;
        $this->quantity = $quantity;
        $this->price = $price;
        $this->currency = $currency;
    }

    /**
     * @return mixed
     */
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * @param mixed $currency
     */
    public function setCurrency(string $currency)
    {
        $this->currency = $currency;
    }

    /**
     * @return mixed
     */
    public function getIdentifier()
    {
        return $this->identifier;
    }

    /**
     * @param mixed $identifier
     */
    public function setIdentifier(string $identifier)
    {
        $this->identifier = $identifier;
    }

    /**
     * @return mixed
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    public function setQuantity(int $quantity)
    {
        $this->quantity = $quantity;
    }

    public function increaseQuantity(int $quantity)
    {
        $this->quantity += $quantity;
    }

    public function decreaseQuantity(int $quantity)
    {
        $this->quantity -= $quantity;
    }

    public function invertQuantity()
    {
        return $this->quantity = $this->quantity * -1;
    }

    /**
     * @return float
     */
    public function getPrice()
    {
        if ($this->currency === 'USD') {
            return round($this->price / 1.14, 2);
        }

        if ($this->currency === 'GBP') {
            return round($this->price / 0.88);
        }

        return round($this->price);
    }

    public function setPrice(float $price)
    {
        $this->price = $price;
    }
}