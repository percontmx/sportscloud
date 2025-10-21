<?php

namespace Percontmx\SportsCloud\Organizations\Models;

use Percontmx\SportsCloud\Organizations\Entities\Organization;
use CodeIgniter\Model;

class OrganizationsModel extends Model
{
    protected $table            = 'organizations';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = Organization::class;
    protected $useSoftDeletes   = true;
    protected $allowedFields    = ['full_name', 'short_name', 'created_by'];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $validationRules = [
        'full_name'  => 'required|max_length[255]',
        'short_name' => 'required|max_length[100]',
        'created_by' => 'required|max_length[32]',
    ];

}
