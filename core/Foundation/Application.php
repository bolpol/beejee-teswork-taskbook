<?php

namespace Core\Foundation;


use Core\Routing\Router;
use Dotenv\Dotenv;

/**
 * Pour créer l'application
 */
class Application
{
    private static $env_module;

    public function __construct()
    {
        self::$env_module = Dotenv::create(base_path());
    }

    /**
     *
     */
    public function run()
    {
        session_start();
        self::$env_module->load();
        Router::start();
    }
}
