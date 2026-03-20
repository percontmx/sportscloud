<?php

namespace Percontmx\SportsVibe\Competitions\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\Exceptions\PageNotFoundException;
use Percontmx\SportsVibe\Competitions\Entities\Edition;
use Percontmx\SportsVibe\Competitions\Entities\Competition;
use Percontmx\SportsVibe\Competitions\Services\EditionsService;
use Percontmx\SportsVibe\Competitions\Services\CompetitionsService;

abstract class BaseCompetitionEditionInfoController extends BaseController
{
    protected function getCompetition(int $competitionId): Competition
    {
        /**
         * @var CompetitionsService
         */
        $service    = service('competitions');
        $competition = $service->getCompetition($competitionId);
        if (! $competition) {
            throw PageNotFoundException::forPageNotFound(
                lang('Competitions.Errors.NotFound', [$competitionId]),
            );
        }

        return $competition;
    }

    protected function getCompetitionEditionInfo(Competition $competition, string $editionSlug): Edition
    {
        /**
         * @var EditionsService
         */
        $service = service('editions');
        $edition = $service->getCompetitionEdition($competition->id, $editionSlug);
        if (! $edition) {
            throw PageNotFoundException::forPageNotFound(
                lang('CompetitionEditions.Messages.EditionNotFound', [$editionSlug, $competition->name]),
            );
        }

        return $edition;
    }
}




