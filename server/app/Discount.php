<?php
namespace Mukuru;

use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    /**
     * @var string
     */
    protected $table = 'discounts';

    /**
     * @var array
     */
    protected $fillable = [
        'order_id',
        'amount_discount'
    ];
}