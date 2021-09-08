<?php

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
    public function setCurrency($currency)
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
    public function setIdentifier($identifier)
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

    /**
     * @param mixed $quantity
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
    }

    public function increaseQuantity($quantity)
    {
        $this->quantity += $quantity;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        if ($this->currency === 'USD') {
            return $this->price / 1.14;
        }

        if ($this->currency === 'GBP') {
            return $this->price / 0.88;
        }

        return $this->price;
    }

    /**
     * @param mixed $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }
}