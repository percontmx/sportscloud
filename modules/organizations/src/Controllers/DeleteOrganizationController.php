<?php

namespace Percontmx\SportsCloud\Organizations\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

use Percontmx\SportsCloud\Organizations\Services\OrganizationsService;

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
            $this->logger->info("Organization with ID $organizationId has been disabled.");
            return redirect()->to(base_url('organizations'))->with('success', 
                lang('Organizations.Messages.OrganizationDisabled', [$organizationId]));
        } catch (\Exception $e) {
            // Handle error appropriately
            $this->logger->error("Failed to disable organization with ID $organizationId: " . $e->getMessage());    
            return redirect()->back()->with('error', 'Failed to delete organization.');
        }
    }
}
