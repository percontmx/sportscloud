<?php

namespace Percontmx\SportsVibe\Tournaments\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\Exceptions\PageNotFoundException;
use Percontmx\SportsVibe\Tournaments\Services\EditionsService;
use Percontmx\SportsVibe\Tournaments\Services\TournamentService;

class GetCompetitionEditionsController extends BaseController
{
    public function index(int $tournamentId): string
    {
        /**
         * @var TournamentService $tournamentService
         */
        $tournamentService = service('tournaments');
        $tournament        = $tournamentService->getTournament($tournamentId);
        if (null === $tournament) {
            throw PageNotFoundException::forPageNotFound();
        }

        /**
         * @var EditionsService $editionsService
         */
        $editionsService    = service('editions');
        $tournamentEditions = $editionsService->getEditionsByTournamentId($tournament->id);

        return view(
            'Percontmx\SportsVibe\Tournaments\Views\EditionsList',
            ['editions' => $tournamentEditions, 'tournament' => $tournament],
        );
    }
}

