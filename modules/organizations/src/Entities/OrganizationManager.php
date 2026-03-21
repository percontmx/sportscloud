<?php

namespace Percontmx\SportsVibe\Organizations\Entities;

use CodeIgniter\Entity\Entity;

class OrganizationManager extends Entity
{
    protected $datamap = [];
    protected $dates   = ['created_at', 'updated_at', 'deleted_at'];
    protected $casts   = [];
}

