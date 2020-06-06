<?php


namespace cli;


class ErrorHandler {

    public function __construct()
    {
        error_reporting(-1);
        set_exception_handler([$this, 'exceptionHandler']);
    }

    public function exceptionHandler($e) {
        $this->logErrors($e->getMessage(), $e->getFile(), $e->getLine());
        $this->displayError($e->getMessage());
    }

    protected function logErrors($message = '', $file = '', $line = '') {
        error_log("[". date('Y-m-d H:i:s') . "] Текст ошибки:
        {$message} | Файл: {$file} | Строка: {$line}\n=====================\n", 3, 'temp/errors.log');
    }

    protected function displayError($message) {
        echo $message;
    }

}