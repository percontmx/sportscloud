<?php

namespace Percontmx\SportsCloud\Organizations\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\Events\Events;
use Percontmx\SportsCloud\Organizations\Services\OrganizationsService;

class CreateOrganizationManagerController extends BaseController
{
    public function index(int $organizationId)
    {
        $this->logger->info('Adding manager to organization with id: ' . $organizationId);

        $data = [
            'user'            => $this->request->getPost('user'),
            'organization_id' => $organizationId,
        ];

        /**
         * @var OrganizationsService $service
         */
        $service = service('organizations');
        $service->addManager($data);
        $this->logger->info('Manager added successfully to organization with id: ' . $organizationId);
        Events::trigger('organizations.manager_added', $data);

        return redirect()->to(base_url("organizations/{$organizationId}"))->with('success', lang('OrganizationManagers.Messages.ManagerAdded'));
    }
}
