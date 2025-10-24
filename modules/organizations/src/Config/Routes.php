<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->group('organizations', ['namespace' => 'Percontmx\SportsCloud\Organizations\Controllers'], 
    function(RouteCollection $routes) {
        $routes->get('/', 'GetOrganizationsController::index');
});
