<?php

use \Phpmig\Adapter;
use \Pimple\Container,
    \Illuminate\Database\Capsule\Manager as Capsule,
    \Illuminate\Database\Connection;

$container = new Container();

$container['db'] = $container->factory(function() use ($container) {
    $dbh = new PDO('mysql:dbname=culture;host=127.0.0.1;port=3306','root','123456');
    $dbh->exec("SET names utf8");
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $dbh;

});

$container['phpmig.adapter'] = $container->factory(function() use ($container) {
    return new Adapter\PDO\Sql($container['db'], 'migrations');
});
$container['phpmig.migrations_path'] = function() {
    return __DIR__ . DIRECTORY_SEPARATOR . 'migrations';
};
$container['phpmig.migrations_template_path'] = function() {
    return __DIR__ . DIRECTORY_SEPARATOR . 'migrations'.DIRECTORY_SEPARATOR.'generate.tmpl';
};
return $container;
