<?php

use BeRest\API\Application;

define('ROOTDIR', __DIR__ . '/..');

require_once ROOTDIR . '/libs/API.phar';
require_once ROOTDIR . '/vendors/composer/autoload.php';

$app = new Application();

$app->registerComponent('errors', new \BeRest\API\Errors());
$app->registerComponent('configs', new \ItBeaute\API\DevConfigs());
$app->registerComponent('services', new \ItBeaute\API\Services());
$app->registerComponent('middlewares', new \BeRest\API\Middlewares());

$app->initialize();

$app->registerFactory('controllers', $app->share(function() use ($app) {
    return new \BeRest\API\Controllers\Factory('ItBeaute\\API');
}));
$app->registerFactory('managers', $app->share(function() use ($app) {
    return new \BeRest\API\Managers\Factory('ItBeaute\\API');
}));

$app->registerResource('products');
$app->registerResource('categories');
$app['products_categories.manager'] = $app->share(function() use ($app) {
    return $app['managers.factory']->instantiate('ProductsCategories', $app['repository'], $app['cache']);
});

$app->run();
