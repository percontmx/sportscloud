<?php

namespace Percontmx\SportsVibe\Competitions\Models;

use CodeIgniter\Model;
use Percontmx\SportsVibe\Competitions\Entities\Tournament;

class CompetitionsModel extends Model {
    protected $table = 'competitions';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = Tournament::class;
    protected $allowedFields = ['organization_id', 'name'];
    
    
    protected $useTimestamps = true;
    protected $useSoftDeletes = true; 
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';
}




