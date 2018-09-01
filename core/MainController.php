<?php
namespace App;

class MainController
{
    protected $view;

    public function __construct()
    {
        $this->view = new View();
        $dotenv = new \Dotenv\Dotenv(APPLICATION_PATH);
        $dotenv->load();
    }
}