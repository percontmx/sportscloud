<?php

namespace Percontmx\SportsVibe\Competitions\Entities;

use CodeIgniter\Entity\Entity;

class Competition extends Entity
{
    protected $datamap = [];
    protected $dates   = ['created_at', 'updated_at', 'deleted_at'];
    protected $casts   = [];

    public function isActive(): bool
    {
        return $this->deleted_at === null;
    }
}




