<?php


namespace cli;


class App
{

    public function __construct($enteredArgs)
    {
        new ErrorHandler();
    }
}