<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Mukuru\CurrencyRepository;
use Mukuru\ExchangeRateApi\ExchangeRate;

class UpdateCurrenciesExchangeRates extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update-exchange-rates';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This will update the currencies table';

    /**
     * @var CurrencyRepository
     */
    private $repository;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(CurrencyRepository $repository)
    {
        $this->repository = $repository;
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $exchangeRatesToBeUpdate = ExchangeRate::getExchangeRatesForCurrencies(config('mukuru.currencies'));
        $this->repository->updateOrCreateCurrencies($exchangeRatesToBeUpdate);
        $this->info('Currencies exchange rates have been updated');
    }
}
