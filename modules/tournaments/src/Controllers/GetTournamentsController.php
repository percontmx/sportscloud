<?php

namespace Percontmx\SportsCloud\Tournaments\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class GetTournamentsController extends BaseController
{
    public function index()
    {
        $service = service('tournaments');
        $tournaments = $service->getTournaments(true);
        return view('Percontmx\SportsCloud\Tournaments\Views\TournamentsList', [
            'tournaments' => $tournaments,
        ]);
    }
}
