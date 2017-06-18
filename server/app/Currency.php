<?php
namespace Mukuru;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    /**
     * @var string
     */
    protected $table = 'currencies';

    /**
     * @var array
     */
    protected $fillable = [
        'code',
        'rate'
    ];

    /**
     * @param Builder $builder
     * @param $currencyCode
     */
    public function scopeHasCurrencyCode(Builder $builder, $currencyCode)
    {
        $builder->where('code', $currencyCode);
    }

    /**
     * @param float $amount
     * @return float
     */
    public function toDollars($amount)
    {
        return $amount / $this->rate;
    }

    /**
     * @param float $amount
     * @return float|int
     */
    public function calculateSurcharge($amount)
    {
        return ($amount * $this->surcharge_percent / 100);
    }

}