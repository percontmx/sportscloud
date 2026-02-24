<?php

use CodeIgniter\Router\RouteCollection;
use Percontmx\SportsCloud\Tournaments\Controllers\GetTournamentInfoController;

/**
 * @var RouteCollection $routes
 */
$routes->group('tournaments', static function (RouteCollection $routes) {
    $routes->get('(:num)', [GetTournamentInfoController::class, 'index']);
});