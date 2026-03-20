<?php

namespace Percontmx\SportsVibe\Tournaments\Services;

use Percontmx\SportsVibe\Tournaments\Entities\Edition;
use Percontmx\SportsVibe\Tournaments\Models\EditionsModel;

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

    public function getTournamentEdition(int $tournamentId, string $editionSlug): ?Edition
    {
        return $this->editionsModel->where('competition_id', $tournamentId)->where('slug', $editionSlug)->first();
    }

    public function createEdition(array $data): Edition
    {
        $edition = new Edition($data);
        $this->editionsModel->save($edition);
        return $edition;
    }
}

