<?php

use CodeIgniter\Test\ControllerTestTrait;
use PHPUnit\Framework\Attributes\Test;
use Percontmx\SportsVibe\Organizations\Controllers\GetOrganizationsController;
use Percontmx\SportsVibe\Organizations\Models\OrganizationsModel;
use Percontmx\SportsVibe\Organizations\Tests\Support\Services\OrganizationsServiceTestBase;

class GetListOfOrganizationsTest extends OrganizationsServiceTestBase
{

    use ControllerTestTrait;

    #[Test]
    public function getOrganizationsList()
    {
        $result = $this->controller(GetOrganizationsController::class)
            ->execute('index');

        $result->assertStatus(200);
        $result->assertSee('Femexfut');
        $result->assertSee('MagnoLiga');
    }

    #[Test]
    public function getEmptyOrganizations() 
    {
        $model = model(OrganizationsModel::class);
        $model->delete(1);
        $model->delete(2);

        $result = $this->controller(GetOrganizationsController::class)
            ->execute('index');
        $result->assertStatus(200);
        $result->assertSee('No hay organizaciones disponibles');       
    }
}

