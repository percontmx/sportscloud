<?php

namespace Percontmx\SportsCloud\Tournaments\Services;

use Percontmx\SportsCloud\Tournaments\Models\EditionsModel;

class EditionsService
{
    /**
     * @var EditionsModel
     */
    private $editionsModel;

    public function __construct()
    {
        $this->editionsModel = model(EditionsModel::class);
    }

    public function getEditionsByTournamentId(int $tournamentId): array
    {
        return $this->editionsModel->where('competition_id', $tournamentId)->findAll();
    }
}
