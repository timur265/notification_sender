<?php


namespace cli;


abstract class NotificationManager
{
    protected string $clientId;
    protected string $productId;

    public function __construct(array $enteredArgs)
    {
        $this->clientId = $enteredArgs['client_id'];
        $this->productId = $enteredArgs['product_id'];
        $this->notifyPurchaseDone();
    }

    abstract protected function notifyPurchaseDone(): void;

}