<?php

namespace Percontmx\SportsCloud\Organizations\Services;

use Percontmx\SportsCloud\Organizations\Entities\Organization;
use Percontmx\SportsCloud\Organizations\Models\OrganizationManagersModel;
use Percontmx\SportsCloud\Organizations\Models\OrganizationsModel;

class OrganizationsService
{
    public function getOrganization(int $organizationId): ?Organization
    {
        $model = model(OrganizationsModel::class);

        return $model->find($organizationId);
    }

    public function createOrganization(Organization $organization)
    {
        $model = model(OrganizationsModel::class);
        if ($model->insert($organization, true)) {
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

        if ($withDeleted) {
            return $model->withDeleted(true)->findAll();
        }

        return $model->withDeleted(false)->findAll();
    }

    public function deleteOrganization(int $organizationId)
    {
        $model = model(OrganizationsModel::class);
        if (! $model->delete($organizationId)) {
            $errors = $model->errors();

            throw new OrganizationsServiceException($errors);
        }
    }

    public function getOrganizationManagers(int $organizationId)
    {
        $model = model(OrganizationManagersModel::class);

        return $model->where('organization_id', $organizationId)->findAll();
    }

    public function addManager(array $data)
    {
        $model = model(OrganizationManagersModel::class);
        if ($model->insert($data, true)) {
            return $model->find($model->insertID());
        }

        $errors = $model->errors();

        throw new OrganizationsServiceException($errors);
    }

    public function removeManagerFromOrganization(int $organizationId, int $managerId): bool
    {
        $model   = model(OrganizationManagersModel::class);
        $manager = $model->where('organization_id', $organizationId)
            ->where('id', $managerId)
            ->first();

        if (! $manager) {
            return false;
        }

        return $model->delete($manager->id);
    }
}
