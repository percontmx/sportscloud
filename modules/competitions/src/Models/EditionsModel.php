<?php

namespace Percontmx\SportsVibe\Competitions\Models;

use CodeIgniter\Model;
use Percontmx\SportsVibe\Competitions\Entities\Edition;

class EditionsModel extends Model
{
    protected $table                  = 'editions';
    protected $primaryKey             = 'id';
    protected $useAutoIncrement       = true;
    protected $returnType             = Edition::class;
    protected $useSoftDeletes         = true;
    protected $protectFields          = true;
    protected $allowedFields          = ['name', 'start_date', 'end_date', 'competition_id', 'slug'];
    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;
    protected array $casts            = [];
    protected array $castHandlers     = [];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = ['generateSlug'];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    protected function generateSlug(array $data): array
    {
        if (isset($data['data']['name'])) {
            $data['data']['slug'] = url_title($data['data']['name'], '-', true);
        }
        return $data;
    }
}




