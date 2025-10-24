<?php

namespace Percontmx\SportsCloud\Organizations\Tests\Services;

use Percontmx\SportsCloud\Organizations\Models\OrganizationsModel;
use Percontmx\SportsCloud\Organizations\Tests\Support\Services\OrganizationsServiceTestBase;
use PHPUnit\Framework\Attributes\Test;

class GetOrganizationsServiceTest extends OrganizationsServiceTestBase
{

    #[Test]
    public function testGetOrganizationById()
    {
        $service = service('organizations');
        $organization = $service->getOrganizations(1);

        $this->assertNotNull($organization);
        $this->assertEquals('Federación Mexicana de Fútbol Asociación, A.C.', $organization->full_name);
        $this->assertEquals('Femexfut', $organization->short_name);
    }

    #[Test]
    public function getOrganizations()
    {
        $service = service('organizations');
        $organizations = $service->getListOfOrganizations();

        $this->assertNotEmpty($organizations);
        $this->assertCount(2, $organizations);
    }

    #[Test]
    public function getOrganizationsNoDeleted() 
    {
        $model = model(OrganizationsModel::class);
        $model->delete(1);
        $service = service('organizations');
        $organizations = $service->getListOfOrganizations(false);
        $this->assertNotEmpty($organizations);
        $this->assertCount(1, $organizations);
    }

    #[Test]
    public function getOrganizationsWithDeleted()
    {
        $model = model(OrganizationsModel::class);
        $model->delete(1);
        $service = service('organizations');
        $organizations = $service->getListOfOrganizations(true);
        $this->assertNotEmpty($organizations);
        $this->assertCount(2, $organizations);
    }
}
