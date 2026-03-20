<?php

namespace Percontmx\SportsVibe\Tournaments\Entities;

use CodeIgniter\Entity\Entity;

class Tournament extends Entity
{
    protected $datamap = [];
    protected $dates   = ['created_at', 'updated_at', 'deleted_at'];
    protected $casts   = [];

    public function isActive(): bool
    {
        return $this->deleted_at === null;
    }
}

