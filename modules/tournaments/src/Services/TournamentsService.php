<?php

namespace Percontmx\SportsVibe\Tournaments\Services;

use Percontmx\SportsVibe\Tournaments\Entities\Tournament;
use Percontmx\SportsVibe\Tournaments\Models\TournamentsModel;

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

    public function getTournaments(bool $withDeleted): array
    {
        return $this->tournamentsModel->withDeleted($withDeleted)->findAll();
    }
}

