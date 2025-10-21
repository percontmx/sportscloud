<?php

use Percontmx\SportsCloud\Organizations\Entities\Organization;
use Percontmx\SportsCloud\Organizations\Tests\Support\Services\OrganizationsServiceTestBase;
use Percontmx\SportsCloud\Organizations\Services\OrganizationsServiceException;

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
        $this->assertNotNull($organization->id);
        $this->assertEquals('Major League Soccer, LLC', $organization->full_name);
        $this->assertEquals('MLS', $organization->short_name);
        $this->assertEquals('admin', $organization->created_by);
        $this->assertNotNull($organization->created_at);
        $this->assertNotNull($organization->updated_at);
        $this->assertNull($organization->deleted_at); 
    }

    #[Test]
    public function createOrganizationWithMissingData()
    {
        $this->expectException(OrganizationsServiceException::class);

        $service = service('organizations');
        $data = [
            'created_by' => 'admin'
        ];

        try {
            $service->createOrganization(new Organization($data));
        } catch (OrganizationsServiceException $e) {
            $errors = $e->getMessages();
            $this->assertEquals(2, count($errors));
            $this->assertArrayHasKey('full_name', $errors);
            $this->assertArrayHasKey('short_name', $errors);
            throw $e;
        }   
        $this->fail();  
    }   
}
