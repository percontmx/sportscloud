<?php

use CodeIgniter\Router\RouteCollection;
use Percontmx\SportsCloud\Organizations\Controllers\CreateOrganizationController;
use Percontmx\SportsCloud\Organizations\Controllers\GetOrganizationsController;
use Percontmx\SportsCloud\Organizations\Controllers\OrganizationsFormController;

/**
 * @var RouteCollection $routes
 */
$routes->group('organizations', static function (RouteCollection $routes) {
    $routes->get('/', [GetOrganizationsController::class, 'index']);
    $routes->get('(:num)', [OrganizationsFormController::class, 'index']);
    $routes->get('new', [OrganizationsFormController::class, 'index']);
    $routes->post('/', [CreateOrganizationController::class, 'index']);
});
