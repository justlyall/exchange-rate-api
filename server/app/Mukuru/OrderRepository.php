<?php

namespace Mukuru;

use Illuminate\Database\Eloquent\Collection;
use Mukuru\Order;

class OrderRepository
{
    /**
     * @var Order
     */
    private $model;

    /**
     * @param Order $model
     */
    public function __construct(Order $model)
    {
        $this->model = $model;
    }

    /**
     * @param array $orderData
     * @return Order
     */
    public function create(array $orderData)
    {
        $this->model->fill($orderData)->save();
        return $this->model;
    }

    /**
     * @return Collection|static[]
     */
    public function all()
    {
       return $this->model->with('discount')->get();
    }
}
