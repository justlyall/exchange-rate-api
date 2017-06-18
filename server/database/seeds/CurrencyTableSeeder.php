
<?php

use Illuminate\Database\Seeder;

class CurrencyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('currencies')->insert([[
            'code' => 'ZAR',
            'rate' => 13.3054,
            'surcharge_percent' => 7.5,
            'currency' => 'South African Rands'
        ],[
            'code' => 'GBP',
            'rate' => 0.651178,
            'surcharge_percent' => 5,
            'currency' => 'British Pounds'
        ],[
            'code' => 'EUR',
            'rate' => 0.884872,
            'surcharge_percent' => 5,
            'currency' => 'Euro'
        ], [
            'code' => 'KES',
            'rate' => 103.860,
            'surcharge_percent' => 2.5,
            'currency' => 'Kenyan Shilling'
        ]]);
    }
}
