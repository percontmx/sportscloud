<?php

namespace Percontmx\SportsCloud\Organizations\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\Exceptions\PageNotFoundException;
use CodeIgniter\HTTP\ResponseInterface;

class DeleteOrganizationManagerController extends BaseController
{
    public function index(int $organizationId, int $managerId): ResponseInterface|string
    {
        /**
         * @var OrganizationsService $organizationsService
         */
        $this->logger->info("Attempting to remove manager with ID {$managerId} from organization with ID {$organizationId}");
        $organizationsService = service('organizations');
        $org                  = $organizationsService->getOrganization($organizationId);
        if (! $org) {
            $this->logger->warning("Organization with ID {$organizationId} not found");

            throw new PageNotFoundException(lang('Organizations.Messages.OrganizationNotFound'));
        }

        if (! $organizationsService->removeManagerFromOrganization($organizationId, $managerId)) {
            $this->logger->warning("Manager with ID {$managerId} not found in organization with ID {$organizationId}");

            throw new PageNotFoundException(lang('OrganizationManagers.Messages.ManagerNotFoundInOrganization'));
        }

        $this->logger->info("Manager with ID {$managerId} removed from organization with ID {$organizationId} successfully");

        return redirect()->with(
            'message',
            lang('OrganizationManagers.Messages.ManagerRemovedSuccessfully'),
        )
            ->to("/organizations/{$organizationId}");
    }
}
