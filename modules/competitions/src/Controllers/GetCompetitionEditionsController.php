<?php

namespace Percontmx\SportsVibe\Competitions\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\Exceptions\PageNotFoundException;
use Percontmx\SportsVibe\Competitions\Services\EditionsService;
use Percontmx\SportsVibe\Competitions\Services\CompetitionService;

class GetCompetitionEditionsController extends BaseController
{
    public function index(int $competitionId): string
    {
        /**
         * @var CompetitionsService $competitionService
         */
        $competitionService = service('competitions');
        $competition        = $competitionService->getCompetition($competitionId);
        if (null === $competition) {
            throw PageNotFoundException::forPageNotFound();
        }

        /**
         * @var EditionsService $editionsService
         */
        $editionsService    = service('editions');
        $competitionEditions = $editionsService->getEditionsByCompetitionId($competition->id);

        return view(
            'Percontmx\SportsVibe\Competitions\Views\EditionsList',
            ['editions' => $competitionEditions, 'tournament' => $competition],
        );
    }
}




