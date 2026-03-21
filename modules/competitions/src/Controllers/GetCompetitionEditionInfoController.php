<?php

namespace Percontmx\SportsVibe\Competitions\Controllers;

class GetCompetitionEditionInfoController extends BaseCompetitionEditionInfoController
{
    public function index(int $competitionId, string $editionSlug): string
    {
        $competition = $this->getCompetition($competitionId);
        $edition    = $this->getCompetitionEditionInfo($competition, $editionSlug);

        return view(
            'Percontmx\SportsVibe\Competitions\Views\EditionView',
            ['edition' => $edition, 'tournament' => $competition],
        );
    }
}




