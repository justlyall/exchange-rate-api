<?php

namespace Tests\Unit;

use Mukuru\Currency;
use Mukuru\CurrencyRepository;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CurrencyRepositoryTest extends TestCase
{
    use DatabaseMigrations;

    public function testGetByCurrencyCode_WithValidCurrencyCode_ShouldReturnCurrency()
    {
        Currency::forceCreate([
            'code' => 'ZAR',
            'rate' => 1.2
        ]);
        $repository = $this->getRepository();
        $currency = $repository->getByCurrencyCode('ZAR');
        $this->assertEquals('ZAR', $currency->code);
    }

    public function testUpdateOrCreateCurrencies_WithCurrencies_ShouldUpdateAndCreate()
    {
        Currency::forceCreate([
            'code' => 'A',
            'rate' => 1
        ]);

        $repository = $this->getRepository();

        $repository->updateOrCreateCurrencies([
            'A' => 3,
            'B' => 12,
        ]);

        $test1 = Currency::hasCurrencyCode('A')->first();
        $this->assertEquals('A', $test1->code);
        $this->assertEquals(3, $test1->rate);

        $test2 = Currency::hasCurrencyCode('B')->first();
        $this->assertEquals('B', $test2->code);
        $this->assertEquals(12, $test2->rate);
    }

    /**
     * @return CurrencyRepository
     */
    private function getRepository()
    {
        return new CurrencyRepository(new Currency());
    }
}
