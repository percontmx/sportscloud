<?php

namespace Percontmx\SportsCloud\Organizations\Tests\Services;

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
}