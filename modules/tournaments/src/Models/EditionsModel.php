<?php

namespace Percontmx\SportsCloud\Tournaments\Models;

use CodeIgniter\Model;
use Percontmx\SportsCloud\Tournaments\Entities\Edition;

class EditionsModel extends Model
{
    protected $table                  = 'editions';
    protected $primaryKey             = 'id';
    protected $useAutoIncrement       = true;
    protected $returnType             = Edition::class;
    protected $useSoftDeletes         = true;
    protected $protectFields          = true;
    protected $allowedFields          = ['name', 'start_date', 'end_date'];
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
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];
}
