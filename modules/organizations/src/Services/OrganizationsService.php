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
        if($model->insert($organization, true))
        {
            return $model->find($model->insertID());
        }

        $errors = $model->errors();
        throw new OrganizationsServiceException($errors);
    }

    public function getListOfOrganizations($withDeleted = false)
    {
        // TODO filtrar por usuarios asociados
        // TODO agregar paginación
        $model = model(OrganizationsModel::class);
        return $model->withDeleted($withDeleted)->findAll();
    }

}
