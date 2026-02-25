<?php

use CodeIgniter\Router\RouteCollection;
use Percontmx\SportsCloud\Tournaments\Controllers\GetTournamentInfoController;
use Percontmx\SportsCloud\Tournaments\Controllers\GetTournamentsController;

/**
 * @var RouteCollection $routes
 */
$routes->group('tournaments', static function (RouteCollection $routes) {
    $routes->get('', [GetTournamentsController::class, 'index']);
    $routes->get('(:num)', [GetTournamentInfoController::class, 'index']);
});