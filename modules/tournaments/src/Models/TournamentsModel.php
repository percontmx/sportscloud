<?php

namespace Percontmx\SportsVibe\Tournaments\Models;

use CodeIgniter\Model;
use Percontmx\SportsVibe\Tournaments\Entities\Tournament;

class TournamentsModel extends Model {
    protected $table = 'tournaments';
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

