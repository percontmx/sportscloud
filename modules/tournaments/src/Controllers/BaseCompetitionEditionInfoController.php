<?php

namespace Percontmx\SportsCloud\Tournaments\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\Exceptions\PageNotFoundException;
use Percontmx\SportsCloud\Tournaments\Entities\Edition;
use Percontmx\SportsCloud\Tournaments\Entities\Tournament;
use Percontmx\SportsCloud\Tournaments\Services\EditionsService;
use Percontmx\SportsCloud\Tournaments\Services\TournamentsService;

abstract class BaseCompetitionEditionInfoController extends BaseController
{
    protected function getTournament(int $tournamentId): Tournament
    {
        /**
         * @var TournamentsService
         */
        $service    = service('tournaments');
        $tournament = $service->getTournament($tournamentId);
        if (! $tournament) {
            throw PageNotFoundException::forPageNotFound(
                lang('Tournaments.Errors.NotFound', [$tournamentId]),
            );
        }

        return $tournament;
    }

    protected function getCompetitionEditionInfo(Tournament $tournament, string $editionSlug): Edition
    {
        /**
         * @var EditionsService
         */
        $service = service('editions');
        $edition = $service->getTournamentEdition($tournament->id, $editionSlug);
        if (! $edition) {
            throw PageNotFoundException::forPageNotFound(
                lang('CompetitionEditions.Messages.EditionNotFound', [$editionSlug, $tournament->name]),
            );
        }

        return $edition;
    }
}
