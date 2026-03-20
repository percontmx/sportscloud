<?php

namespace Percontmx\SportsVibe\Tournaments\Controllers;

class GetCompetitionEditionInfoController extends BaseCompetitionEditionInfoController
{
    public function index(int $tournamentId, string $editionSlug): string
    {
        $tournament = $this->getTournament($tournamentId);
        $edition    = $this->getCompetitionEditionInfo($tournament, $editionSlug);

        return view(
            'Percontmx\SportsVibe\Tournaments\Views\EditionView',
            ['edition' => $edition, 'tournament' => $tournament],
        );
    }
}

