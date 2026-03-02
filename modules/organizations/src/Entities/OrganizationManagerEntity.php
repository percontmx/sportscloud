<?php

namespace Percontmx\SportsCloud\Organizations\Entities;

use CodeIgniter\Entity\Entity;

class OrganizationManagerEntity extends Entity
{
    protected $datamap = [];
    protected $dates   = ['created_at', 'updated_at', 'deleted_at'];
    protected $casts   = [];
}
