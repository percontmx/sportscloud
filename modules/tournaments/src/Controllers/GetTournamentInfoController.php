<?php

namespace Percontmx\SportsCloud\Tournaments\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Exceptions\PageNotFoundException;

class GetTournamentInfoController extends BaseController
{
    public function index(int $tournament)
    {
        /**
         * @var TournamentsService $service
         */
        $service = service('tournaments');
        $tournamentInfo = $service->getTournament($tournament);

        if (! $tournamentInfo) {
            throw PageNotFoundException::forPageNotFound(
                lang('Tournaments.Errors.NotFound', [$tournament])
            );
        }

        return view('Percontmx\SportsCloud\Tournaments\Views\TournamentsViewer', [
            'tournament' => $tournamentInfo,
        ]);
    }
}
