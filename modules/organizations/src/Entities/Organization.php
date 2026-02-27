<?php

namespace Percontmx\SportsCloud\Organizations\Entities;

use CodeIgniter\Entity\Entity;

class Organization extends Entity
{
    protected $dates   = ['created_at', 'updated_at', 'deleted_at'];
    
    public function isActive(): bool
    {
        return $this->deleted_at === null;
    }
}
