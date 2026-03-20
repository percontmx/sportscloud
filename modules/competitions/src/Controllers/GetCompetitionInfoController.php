<?php

namespace Percontmx\SportsVibe\Competitions\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Exceptions\PageNotFoundException;

class GetCompetitionInfoController extends BaseController
{
    public function index(int $competition)
    {
        /**
         * @var CompetitionsService $service
         */
        $service = service('competitions');
        $competitionInfo = $service->getCompetition($competition);

        if (! $competitionInfo) {
            throw PageNotFoundException::forPageNotFound(
                lang('Competitions.Errors.NotFound', [$competition])
            );
        }

        return view('Percontmx\SportsVibe\Competitions\Views\CompetitionsViewer', [
            'tournament' => $competitionInfo,
        ]);
    }
}




