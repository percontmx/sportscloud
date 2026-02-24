<?php

namespace Percontmx\SportsCloud\Tournaments\Entities;

use CodeIgniter\Entity\Entity;

class Tournament extends Entity
{
    protected $datamap = [];
    protected $dates   = ['created_at', 'updated_at', 'deleted_at'];
    protected $casts   = [];
}
