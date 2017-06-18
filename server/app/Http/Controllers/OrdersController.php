<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Collection;
use Mukuru\CurrencyRepository;
use Mukuru\OrderRepository;

class OrdersController extends Controller
{
    /**
     * @var CurrencyRepository
     */
    private $orderRepository;

    /**
     * @param OrderRepository $orderRepository
     */
    public function __construct(OrderRepository $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }

    /**
     * @return Collection|static[]
     */
    public function get()
    {
        return $this->orderRepository->all();
    }
}