<?php

namespace App\Core;

class Bootstrap
{
    public static function initialize()
    {
        $container = new Container();
        self::registerBindings($container);
        self::configureApp($container);
        self::loadRoutes();
        self::initializeRouter();
    }

    protected static function registerBindings(Container $container)
    {
        $container->bind('App\Core\Database', function () {
            $config = require base_path('Config/Database.php');

            return new Database($config['database']);
        });
    }

    protected static function configureApp(Container $container)
    {
        App::setContainer($container);
    }

    protected static function loadRoutes(): void
    {
        require base_path('routes/routes.php');
    }

    protected static function initializeRouter()
    {
        $router = new Route();
        $router->route();
    }
}
