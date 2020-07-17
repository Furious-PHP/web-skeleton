<?php

use Furious\Container\Container;

$container = new Container();

$configs = array_map(
    function ($file) {
        return require $file;
    },
    glob(__DIR__ . '/params/{*}.php', GLOB_BRACE)
);

$container->set('config', array_merge(...$configs));

array_map(
    function ($file) use ($container) {
        return require $file;
    },
    glob(__DIR__ . '/dependencies/{*}.php', GLOB_BRACE)
);

return $container;