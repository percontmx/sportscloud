<?php

namespace Percontmx\SportsCloud\Organizations\Tests\Services;

use Percontmx\SportsCloud\Organizations\Models\OrganizationsModel;
use Percontmx\SportsCloud\Organizations\Tests\Support\Services\OrganizationsServiceTestBase;
use PHPUnit\Framework\Attributes\Test;

/**
 * @internal
 */
final class GetOrganizationsServiceTest extends OrganizationsServiceTestBase
{
    #[Test]
    public function getOrganizations()
    {
        $service       = service('organizations');
        $organizations = $service->getListOfOrganizations();

        $this->assertNotEmpty($organizations);
        $this->assertCount(2, $organizations);
    }

    #[Test]
    public function getOrganizationsNoDeleted()
    {
        $model = model(OrganizationsModel::class);
        $model->delete(1);
        $service       = service('organizations');
        $organizations = $service->getListOfOrganizations(false);
        $this->assertNotEmpty($organizations);
        $this->assertCount(1, $organizations);
    }

    #[Test]
    public function getOrganizationsWithDeleted()
    {
        $model = model(OrganizationsModel::class);
        $model->delete(1);
        $service       = service('organizations');
        $organizations = $service->getListOfOrganizations(true);
        $this->assertNotEmpty($organizations);
        $this->assertCount(2, $organizations);
    }
}
