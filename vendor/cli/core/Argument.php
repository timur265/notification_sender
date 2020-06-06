<?php


namespace cli;


class Argument
{
    private array $params = [];

    public function __construct(array $enteredArgs)
    {
        $this->params = $enteredArgs;
        $this->detachArgument();
    }

    private function detachArgument(): void
    {
        if($this->matchArgument()) {
            $className = '\\cli\\'.ucfirst($this->params['notificationType']).'Notification';
            if(class_exists($className)) {
                new $className($this->params);
            } else{
                throw new \Exception("Класс ".$className." не сущетвует");
            }
        } else{
            throw new \Exception("Вы ввели не верное количество аргументов");
        }
    }

    private function matchArgument(): bool
    {
        if (count($this->params) == 3) {
            foreach ($this->params as $param) {
                if (preg_match('/^-(.+)=(.+)$/', $param, $matches)) {
                    if (!empty($matches)) {
                        $paramName = $matches[1];
                        $paramValue = $matches[2];
                        $this->params[$paramName] = $paramValue;
                    }
                } else{
                    throw new \Exception("Пожалуйста вводите данные согласно шаблону: 
                        -notificationType=значение
                        -client_id=значение 
                        -product_id=значение");
                }
            }
            return true;
        }
        return false;
    }

}