<?php

use CodeIgniter\Router\RouteCollection;
use Percontmx\SportsCloud\Tournaments\Controllers\GetCompetitionEditionsController;
use Percontmx\SportsCloud\Tournaments\Controllers\GetTournamentInfoController;
use Percontmx\SportsCloud\Tournaments\Controllers\GetTournamentsController;

/**
 * @var RouteCollection $routes
 */
$routes->group('tournaments', static function (RouteCollection $routes) {
    $routes->get('', [GetTournamentsController::class, 'index']);
    $routes->group('(:num)', static function (RouteCollection $routes) {
        $routes->get('', [GetTournamentInfoController::class, 'index']);
        $routes->get('editions', [GetCompetitionEditionsController::class, 'index']);
    });
});
