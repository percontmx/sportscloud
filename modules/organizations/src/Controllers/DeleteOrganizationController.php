<?php

namespace Percontmx\SportsVibe\Organizations\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\Events\Events;
use Exception;
use Percontmx\SportsVibe\Organizations\Services\OrganizationsService;

class DeleteOrganizationController extends BaseController
{
    public function index(int $organizationId)
    {
        /**
         * @var OrganizationsService $service
         */
        $service = service('organizations');

        try {
            $service->deleteOrganization($organizationId);
            $this->logger->info("Organization with ID {$organizationId} has been disabled.");
            Events::trigger('organizations.disabled', $organizationId);
            return redirect()->to(base_url('organizations'))->with(
                'success',
                lang('Organizations.Messages.OrganizationDisabled', [$organizationId]),
            );
        } catch (Exception $e) {
            // Handle error appropriately
            $this->logger->error("Failed to disable organization with ID {$organizationId}: " . $e->getMessage());
            return redirect()->back()->with('error', 'Failed to delete organization.');
        }
    }
}

