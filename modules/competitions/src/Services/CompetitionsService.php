<?php

namespace Percontmx\SportsVibe\Competitions\Services;

use Percontmx\SportsVibe\Competitions\Entities\Competition;
use Percontmx\SportsVibe\Competitions\Models\CompetitionsModel;

class CompetitionsService
{

    protected $competitionsModel;

    public function __construct()
    {
        $this->competitionsModel = model(CompetitionsModel::class);
    }

    public function getCompetition(int $competitionId): ?Competition
    {
        return $this->competitionsModel->find($competitionId);
    }

    public function getCompetitions(bool $withDeleted): array
    {
        return $this->competitionsModel->withDeleted($withDeleted)->findAll();
    }
}




