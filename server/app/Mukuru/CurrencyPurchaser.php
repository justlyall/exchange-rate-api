<?php
namespace Mukuru;

use Mukuru\Order;
use Mukuru\Currency;

class CurrencyPurchaser
{
    /**
     * @var CurrencyRepository
     */
    private $currencyRepository;

    /**
     * @var OrderRepository
     */
    private $orderRepository;

    /**
     * @var PurchaseOrderPolicyApplier
     */
    private $purchaseOrderPolicyApplier;

    /**
     * @param CurrencyRepository $currencyRepository
     * @param OrderRepository $orderRepository
     * @param PurchaseOrderPolicyApplier $purchaseOrderPolicyApplier
     */
    public function __construct(
        CurrencyRepository $currencyRepository,
        OrderRepository $orderRepository,
        PurchaseOrderPolicyApplier $purchaseOrderPolicyApplier
    ) {
        $this->currencyRepository = $currencyRepository;
        $this->orderRepository = $orderRepository;
        $this->purchaseOrderPolicyApplier = $purchaseOrderPolicyApplier;
    }

    /**
     * @param float $amountPurchased
     * @param string $currecyCode
     * @return \Mukuru\Order
     */
    public function purchase($amountPurchased, $currecyCode)
    {
        $currency = $this->currencyRepository->getByCurrencyCode($currecyCode);
        $purchaseOrder = $this->createPurchaseOrder($amountPurchased, $currency);
        $this->purchaseOrderPolicyApplier->applyPolicyToPurchaseOrder($purchaseOrder);
        return $purchaseOrder;
    }

    /**
     * @param float $amountPurchased
     * @param Currency $currency
     * @return Order
     */
    private function createPurchaseOrder($amountPurchased, Currency $currency)
    {
        $dollarAmount = $currency->toDollars($amountPurchased);
        return $this->orderRepository->create([
            'currency_id' => $currency->id,
            'amount_usd' => $dollarAmount,
            'amount_purchased' => $amountPurchased,
            'exchange_rate' => $currency->rate,
            'percentage_surchage' => $currency->surcharge_percent,
            'amount_surcharge' => $currency->calculateSurcharge($dollarAmount)
        ]);
    }
}
