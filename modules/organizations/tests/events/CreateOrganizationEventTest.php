<?php

use CodeIgniter\Events\Events;
use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\DatabaseTestTrait;
use CodeIgniter\Test\FeatureTestTrait;
use Percontmx\SportsCloud\Organizations\Entities\Organization;
use PHPUnit\Framework\Attributes\Test;

class CreateOrganizationEventTest extends CIUnitTestCase
{

    use DatabaseTestTrait;
    use FeatureTestTrait;

    protected $refresh = true;
    protected $namespace = 'Percontmx\SportsCloud\Organizations';
    protected $migrate = true;
    protected $migrateOnce = false;

    private static $data = [
        'full_name' => 'National Basketball Association',
        'short_name' => 'NBA'
    ];

    public function setUp(): void
    {
        parent::setUp();
    }

    public function tearDown(): void
    {
        parent::tearDown();
    }

    #[Test]
    public function createOrganizationEventTriggered(): void 
    {
        Events::on('organizations.new', function(Organization $organization) {
            $this->assertInstanceOf(Organization::class, $organization);
            $this->assertEquals(self::$data['full_name'], $organization->full_name);
            $this->assertEquals(self::$data['short_name'], $organization->short_name);
            $this->assertEquals('admin', $organization->created_by);
        });

        $response = $this->withHeaders([
            'Content-Type' => 'application/x-www-form-urlencoded'
        ])->post('/organizations', self::$data);

        $response->assertOK();
    }
}
