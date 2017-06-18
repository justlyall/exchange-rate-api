<?php

namespace Tests\Unit;


use Mukuru\Currency;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class CurrencyTest extends TestCase
{
    public function testToDollars()
    {
        $currency = (new Currency())->fill([
            'code' => 'ZAR',
            'rate' => 10
        ]);

        $this->assertEquals(1, $currency->toDollars(10));
    }

    public function testCalculateSurcharge()
    {
        $currency = new Currency();
        $currency->surcharge_percent = 4;
        $this->assertEquals(8, $currency->calculateSurcharge(200));
    }
}
