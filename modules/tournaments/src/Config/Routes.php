<?php

use CodeIgniter\Router\RouteCollection;
use Percontmx\SportsCloud\Tournaments\Controllers\GetCompetitionEditionInfoController;
use Percontmx\SportsCloud\Tournaments\Controllers\GetCompetitionEditionsController;
use Percontmx\SportsCloud\Tournaments\Controllers\GetTournamentInfoController;
use Percontmx\SportsCloud\Tournaments\Controllers\GetTournamentsController;
use Percontmx\SportsCloud\Tournaments\Controllers\PostCompetitionEditionController;

/**
 * @var RouteCollection $routes
 */
$routes->group('tournaments', static function (RouteCollection $routes) {
    $routes->get('', [GetTournamentsController::class, 'index']);
    $routes->group('(:num)', static function (RouteCollection $routes) {
        $routes->get('', [GetTournamentInfoController::class, 'index']);
        $routes->group('editions', static function (RouteCollection $routes) {
            $routes->get('', [GetCompetitionEditionsController::class, 'index']);
            $routes->post('', [PostCompetitionEditionController::class, 'index']);
            $routes->get('(:segment)', [GetCompetitionEditionInfoController::class, 'index']);
        });
    });
});
