<?php

use CodeIgniter\Router\RouteCollection;
use Percontmx\SportsVibe\Organizations\Controllers\CreateOrganizationController;
use Percontmx\SportsVibe\Organizations\Controllers\DeleteOrganizationController;
use Percontmx\SportsVibe\Organizations\Controllers\DeleteOrganizationManagerController;
use Percontmx\SportsVibe\Organizations\Controllers\GetOrganizationsController;
use Percontmx\SportsVibe\Organizations\Controllers\OrganizationsFormController;
use Percontmx\SportsVibe\Organizations\Controllers\CreateOrganizationManagerController;

/**
 * @var RouteCollection $routes
 */
$routes->group('organizations', static function (RouteCollection $routes) {
    $routes->get('/', [GetOrganizationsController::class, 'index']);
    $routes->group('(:num)', static function (RouteCollection $routes) {
        $routes->get('', [OrganizationsFormController::class, 'index']);
        $routes->get('tournaments', static fn ($id) => redirect()->to('tournaments?organizationId=' . $id));
        $routes->group('managers', static function (RouteCollection $routes) {
            $routes->post('', [CreateOrganizationManagerController::class, 'index']);
            $routes->delete('(:num)', [DeleteOrganizationManagerController::class, 'index']);
        });
        $routes->delete('', [DeleteOrganizationController::class, 'index']);
    });
    $routes->get('new', [OrganizationsFormController::class, 'index']);
    $routes->post('/', [CreateOrganizationController::class, 'index']);
});

