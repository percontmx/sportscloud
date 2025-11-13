<?php

namespace Percontmx\SportsCloud\Organizations\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\Events\Events;
use Percontmx\SportsCloud\Organizations\Entities\Organization;
use Percontmx\SportsCloud\Organizations\Services\OrganizationsService;

class CreateOrganizationController extends BaseController
{

    private $rules = [
        'full_name' => 'required|string|max_length[255]',
        'short_name' => 'required|string|max_length[100]'
    ];

    private $messages = [
        'full_name' => [
            'required' => 'Organizations.Errors.FullNameRequired',
            'string' => 'Organizations.Errors.FullNameString',
            'max_length' => 'Organizations.Errors.FullNameMaxLength'
        ],
        'short_name' => [
            'required' => 'Organizations.Errors.ShortNameRequired',
            'string' => 'Organizations.Errors.ShortNameString',
            'max_length' => 'Organizations.Errors.ShortNameMaxLength'
        ]
    ];

    public function index()
    {
        $data = [
            'full_name' => $this->request->getPost('full_name'),
            'short_name' => $this->request->getPost('short_name')
        ];
        $this->logger->info('Creating organization with the following data: ' . 
            json_encode($data));

        if (!$this->validateData($data, $this->rules, $this->messages)) {
            $errors = $this->validator->getErrors();
            $this->logger->error('Error found while submitting new organization: ' . json_encode($errors));
            return redirect()->back()->withInput();
        }

        $validData = $this->validator->getValidated();

        $newOrg = new Organization($validData);
        // TODO definir el usuario que crea la organización
        $newOrg->created_by = 'admin';

        /**
         * @var OrganizationsService $organizationsService
         */
        $organizationsService = service('organizations');
        $this->logger->info('Saving organization with the following data: ' . json_encode($newOrg->toArray()));
        $createdOrg = $organizationsService->createOrganization($newOrg);

        $this->logger->info('New organization created with id: ' . $createdOrg->id);
        Events::trigger('organizations.new', $createdOrg);
        return redirect()->to('/organizations')->with('success', 
            lang('Organizations.Messages.OrganizationCreated', 
                [$createdOrg->full_name]));
    }
}
