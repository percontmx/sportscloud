<?php

namespace Percontmx\SportsCloud\Tournaments\Services;

use Percontmx\SportsCloud\Tournaments\Entities\Tournament;
use Percontmx\SportsCloud\Tournaments\Models\TournamentsModel;

class TournamentsService
{

    protected $tournamentsModel;

    public function __construct()
    {
        $this->tournamentsModel = model(TournamentsModel::class);
    }

    public function getTournament(int $tournamentId): ?Tournament
    {
        return $this->tournamentsModel->find($tournamentId);
    }
}
