<?php

namespace Percontmx\SportsCloud\Organizations\Services;

use Percontmx\SportsCloud\Organizations\Entities\Organization;
use Percontmx\SportsCloud\Organizations\Models\OrganizationsModel;

class OrganizationsService {

    public function getOrganizations($id)  
    {
        $model = model(OrganizationsModel::class);
        return $model->find($id);
    }

    public function createOrganization(Organization $organization)
    {
        $model = model(OrganizationsModel::class);
        $model->insert($organization);
        return $model->find($model->insertID());
    
    }

}