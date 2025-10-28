<?php

namespace Percontmx\SportsCloud\Organizations\Controllers;

use App\Controllers\BaseController;
use Percontmx\SportsCloud\Organizations\Entities\Organization;
use Percontmx\SportsCloud\Organizations\Services\OrganizationsService;

class CreateOrganizationController extends BaseController
{

    private $rules = [
        'full_name' => 'required|string|max_length[255]',
        'short_name' => 'required|string|max_length[100]'
    ];

    public function loadForm()
    {
        return view('Percontmx\SportsCloud\Organizations\Views\OrganizationsForm');
    }

    public function index()
    {
        
        $data = $this->request->getPost();

        
        if (!$this->validateData($data, $this->rules)) {
            $errors = $this->validator->getErrors();
            $this->logger->error('Validation errors: ' . json_encode($errors));
            // TODO Definir la respuesta en caso de que las reglas no se cumplan.
            return view('merga');
        }

        $validData = $this->validator->getValidated();

        $newOrg = new Organization($validData);
        // TODO definir el usuario que crea la organización
        $newOrg->created_by = 'admin';

        /**
         * @var OrganizationsService $organizationsService
         */
        $organizationsService = service('organizations');
        $this->logger->info('Creando organización con datos: ' . json_encode($newOrg->toArray()));
        $createdOrg = $organizationsService->createOrganization($newOrg);

        $this->logger->info('Organización creada con ID: ' . $createdOrg->id);
        // TODO Definir respuesta
        return view('Percontmx\SportsCloud\Organizations\Views\OrganizationsForm'); 
    }
}
