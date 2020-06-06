<?php


namespace cli;


class SmsNotification extends NotificationManager
{

    protected function notifyPurchaseDone(): void
    {
        echo "Заказ {$this->productId}, оформленный, юзером {$this->clientId} - отправлен через Sms";
    }
}