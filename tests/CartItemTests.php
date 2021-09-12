<?php

use PHPUnit\Framework\TestCase;
use App\Model\CartItem;

require "vendor/autoload.php";

final class CartItemTests extends TestCase
{
    protected $cartItems;

    /**
     * @dataProvider caseProvider
     */
    public function testPushAndPop(
        string $identifier,
        int    $quantity,
        float  $price,
        string $currency,
        float  $expected
    ): void
    {
        $case = new CartItem($identifier, $quantity, $price, $currency);
        $this->assertEquals($expected, $case->getPrice(), "Value should be {$expected}, got {$case->getPrice()}");
    }

    public function caseProvider(): array
    {
        return [
            ["tst", 1, 100, "EUR", 100],
            ["tst", 1, 100, "USD", 87.72],
            ["tst", 1, 100, "GBP", 114],
        ];
    }
}