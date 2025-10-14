<?php

use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\DatabaseTestTrait;
use PHPUnit\Framework\Attributes\Test;
use Percontmx\SportsCloud\Organizations\Tests\Support\Database\Seeds\OrganizationsSeeder;
final class OrganizationsModelTest extends CIUnitTestCase
{
    use DatabaseTestTrait;

    protected $refresh = true;
    protected $namespace = 'Percontmx\SportsCloud\Organizations';
    protected $migrate = true;
    protected $migrateOnce = false;
    protected $seed = OrganizationsSeeder::class;
    protected $seedOnce = false;

    #[Test]
    public function findAll(): void
    {
        $model = model('OrganizationsModel');
        $objects = $model->findAll();
        $this->assertCount(2, $objects);
    }

    #[Test]
    public function findById(): void
    {
        $model = model('OrganizationsModel');
        $object = $model->find(1);
        $this->assertNotNull($object);
        $this->assertEquals(1, $object->id);
    }
}