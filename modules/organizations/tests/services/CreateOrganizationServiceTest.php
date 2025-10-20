<?php

use Percontmx\SportsCloud\Organizations\Entities\Organization;
use Percontmx\SportsCloud\Organizations\Tests\Support\Services\OrganizationsServiceTestBase;
use PHPUnit\Framework\Attributes\Test;

class CreateOrganizationServiceTest extends OrganizationsServiceTestBase
{

    #[Test]
    public function createOrganizationSuccesfully()
    {
        $service = service('organizations');
        $data = [
            'full_name'  => 'Major League Soccer, LLC',
            'short_name' => 'MLS',
            'created_by' => 'admin'
        ];

        $organization = $service->createOrganization(new Organization($data));
        $this->seeInDatabase('organizations', $data);
        
        $this->assertNotNull($organization);
        $this->assertEquals('Major League Soccer, LLC', $organization->full_name);
        $this->assertEquals('MLS', $organization->short_name);
        $this->assertEquals('admin', $organization->created_by); 
    }
}