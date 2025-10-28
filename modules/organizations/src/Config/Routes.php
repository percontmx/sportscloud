<?php

use CodeIgniter\Router\RouteCollection;

use Percontmx\SportsCloud\Organizations\Controllers\CreateOrganizationController;
use Percontmx\SportsCloud\Organizations\Controllers\GetOrganizationsController;

/**
 * @var RouteCollection $routes
 */
$routes->group('organizations', static function (RouteCollection $routes) {
    $routes->get('/', [GetOrganizationsController::class, 'index']);
    $routes->get('new', [CreateOrganizationController::class, 'loadForm']);
    $routes->post('/', [CreateOrganizationController::class, 'index']);
});
