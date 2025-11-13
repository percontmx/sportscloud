<?php

use Percontmx\SportsCloud\Organizations\Tests\Support\Services\OrganizationsServiceTestBase;
use PHPUnit\Framework\Attributes\Test;

/**
 * @internal
 */
final class GetOneOrganizationTest extends OrganizationsServiceTestBase
{
    #[Test]
    public function getOrganizationById()
    {
        /**
         * @var OrganizationsService $service
         */
        $service      = service('organizations');
        $organization = $service->getOrganization(1);

        $this->assertNotNull($organization);
        $this->assertSame('Federación Mexicana de Fútbol Asociación, A.C.', $organization->full_name);
        $this->assertSame('Femexfut', $organization->short_name);
    }

    #[Test]
    public function getUnexistingOrganization()
    {
        /**
         * @var OrganizationsService $service
         */
        $service      = service('organizations');
        $organization = $service->getOrganization(-1);

        $this->assertNull($organization);
    }
}
