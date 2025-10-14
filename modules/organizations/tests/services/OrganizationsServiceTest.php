<?php

use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\DatabaseTestTrait;
use Percontmx\SportsCloud\Organizations\Tests\Support\Database\Seeds\OrganizationsSeeder;

class OrganizationsServiceTest extends CIUnitTestCase
{
    use DatabaseTestTrait;

    protected $refresh = true;
    protected $namespace = 'Percontmx\SportsCloud\Organizations';
    protected $migrate = true;
    protected $migrateOnce = false;
    protected $seed = OrganizationsSeeder::class;
    protected $seedOnce = false;

    public function testGetOrganizations()
    {
        $service = service('organizations');
        $organization = $service->getOrganizations(1);

        $this->assertNotNull($organization);
        $this->assertEquals(1, $organization->id);
        $this->assertEquals('Federación Mexicana de Fútbol Asociación, A.C.', $organization->full_name);
        $this->assertEquals('Femexfut', $organization->short_name);
    }
}