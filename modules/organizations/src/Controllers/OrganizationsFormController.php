<?php

namespace Percontmx\SportsVibe\Organizations\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\Exceptions\PageNotFoundException;

class OrganizationsFormController extends BaseController
{
    protected $helpers = ['form'];

    public function index(?int $organizationId = null)
    {
        if (! $organizationId) {
            return view('Percontmx\SportsVibe\Organizations\Views\OrganizationsForm');
        }

        /**
         * @var OrganizationsService $service
         */
        $service      = service('organizations');
        $organization = $service->getOrganization($organizationId);

        if ($organization) {
            return view('Percontmx\SportsVibe\Organizations\Views\OrganizationsForm', [
                'organization' => $organization,
            ]);
        }

        throw new PageNotFoundException(lang('Organizations.Messages.NotFound', [$organizationId]));
    }
}

