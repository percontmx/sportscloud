<?php

namespace Percontmx\SportsCloud\Organizations\Services;

use Percontmx\SportsCloud\Organizations\Models\OrganizationsModel;

class OrganizationsService {

    public function getOrganizations($id)  
    {
        $model = model(OrganizationsModel::class);
        return $model->find($id);
    }

}