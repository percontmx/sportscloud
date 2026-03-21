<?php

namespace Percontmx\SportsVibe\Organizations\Cells;

use CodeIgniter\View\Cells\Cell;

class OrganizationManagersCell extends Cell
{
    public $organizationId;

    public function render(): string
    {
        /**
         * @var OrganizationsService $organizationsService
         */
        $organizationsService = service('organizations');
        $organization         = $organizationsService->getOrganizationManagers($this->organizationId);

        return $this->view(
            'organization_managers_cell',
            ['organizationManagers' => $organization,
                'organizationId'    => $this->organizationId],
        );
    }
}

