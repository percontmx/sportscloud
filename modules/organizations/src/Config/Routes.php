<?php

use CodeIgniter\Router\RouteCollection;
use Percontmx\SportsCloud\Organizations\Controllers\CreateOrganizationController;
use Percontmx\SportsCloud\Organizations\Controllers\GetOrganizationsController;
use Percontmx\SportsCloud\Organizations\Controllers\OrganizationsFormController;
use Percontmx\SportsCloud\Organizations\Controllers\DeleteOrganizationController;

/**
 * @var RouteCollection $routes
 */
$routes->group('organizations', static function (RouteCollection $routes) {
    $routes->get('/', [GetOrganizationsController::class, 'index']);
    $routes->group('(:num)', static function (RouteCollection $routes) {
        $routes->get('', [OrganizationsFormController::class, 'index']);
        $routes->get('tournaments', static function ($id) {
            return redirect()->to('tournaments?organizationId=' . $id);
        });
        $routes->delete('', [DeleteOrganizationController::class, 'index']);
    });
    $routes->get('new', [OrganizationsFormController::class, 'index']);
    $routes->post('/', [CreateOrganizationController::class, 'index']);
});
