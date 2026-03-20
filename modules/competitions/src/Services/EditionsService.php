<?php

namespace Percontmx\SportsVibe\Competitions\Services;

use Percontmx\SportsVibe\Competitions\Entities\Edition;
use Percontmx\SportsVibe\Competitions\Models\EditionsModel;

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

    public function getEditionsByCompetitionId(int $competitionId): array
    {
        return $this->editionsModel->where('competition_id', $competitionId)->findAll();
    }

    public function getCompetitionEdition(int $competitionId, string $editionSlug): ?Edition
    {
        return $this->editionsModel->where('competition_id', $competitionId)->where('slug', $editionSlug)->first();
    }

    public function createEdition(array $data): Edition
    {
        $edition = new Edition($data);
        $this->editionsModel->save($edition);
        return $edition;
    }
}




