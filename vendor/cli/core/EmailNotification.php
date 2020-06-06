<?php


namespace cli;


class EmailNotification extends NotificationManager
{

    protected function notifyPurchaseDone(): void
    {
        echo "Заказ {$this->productId}, оформленный, юзером {$this->clientId} - отправлен через Email";
    }
}