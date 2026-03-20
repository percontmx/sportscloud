<?php

use CodeIgniter\Router\RouteCollection;
use Percontmx\SportsVibe\Competitions\Controllers\GetCompetitionEditionInfoController;
use Percontmx\SportsVibe\Competitions\Controllers\GetCompetitionEditionsController;
use Percontmx\SportsVibe\Competitions\Controllers\GetCompetitionInfoController;
use Percontmx\SportsVibe\Competitions\Controllers\GetCompetitionsController;
use Percontmx\SportsVibe\Competitions\Controllers\PostCompetitionEditionController;

/**
 * @var RouteCollection $routes
 */
$routes->group('competitions', static function (RouteCollection $routes) {
    $routes->get('', [GetCompetitionsController::class, 'index']);
    $routes->group('(:num)', static function (RouteCollection $routes) {
        $routes->get('', [GetCompetitionInfoController::class, 'index']);
        $routes->group('editions', static function (RouteCollection $routes) {
            $routes->get('', [GetCompetitionEditionsController::class, 'index']);
            $routes->post('', [PostCompetitionEditionController::class, 'index']);
            $routes->get('(:segment)', [GetCompetitionEditionInfoController::class, 'index']);
        });
    });
});




