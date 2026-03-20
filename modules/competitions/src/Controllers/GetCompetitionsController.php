<?php

namespace Percontmx\SportsVibe\Competitions\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class GetCompetitionsController extends BaseController
{
    public function index()
    {
        $service = service('competitions');
        $competitions = $service->getCompetitions(true);
        return view('Percontmx\SportsVibe\Competitions\Views\CompetitionsList', [
            'competitions' => $competitions,
        ]);
    }
}




