<?php
namespace Mukuru;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Order extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'currency_id',
        'amount_usd',
        'amount_purchased',
        'exchange_rate',
        'percentage_surchage',
        'amount_surcharge'
    ];

    /**
     * @return HasOne
     */
    public function discount()
    {
        return $this->hasOne('Mukuru\Discount');
    }

    /**
     * @return BelongsTo
     */
    public function currency()
    {
        return $this->belongsTo('Mukuru\Currency');
    }
}
