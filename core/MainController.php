<?php
namespace App;

class MainController
{
    protected $view;

    public function __construct()
    {
        $this->view = new View();
    }
}