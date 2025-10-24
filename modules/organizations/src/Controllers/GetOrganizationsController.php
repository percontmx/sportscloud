<?php

namespace Percontmx\SportsCloud\Organizations\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use Percontmx\SportsCloud\Organizations\Services\OrganizationsService;

class GetOrganizationsController extends BaseController
{
    public function index() : ResponseInterface | string
    {
        $includeAll = filter_var(
            $this->request->getGet('all'),
            FILTER_VALIDATE_BOOLEAN,
            FILTER_NULL_ON_FAILURE
        ) ?? false;

        /**
         * @var OrganizationsService $service
         */
        $service = service('organizations');
        $organizations = $service->getListOfOrganizations($includeAll);
        
        return view('Percontmx\SportsCloud\Organizations\Views\OrganizationsTableView.php', [
            'organizations' => $organizations,
        ]);
        
    }
}
