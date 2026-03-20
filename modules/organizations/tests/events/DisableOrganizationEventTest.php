<?php

use CodeIgniter\Events\Events;
use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\DatabaseTestTrait;
use CodeIgniter\Test\FeatureTestTrait;
use Percontmx\SportsVibe\Organizations\Tests\Support\Database\Seeds\OrganizationsSeeder;
use PHPUnit\Framework\Attributes\Test;

/**
 * @internal
 */
final class DisableOrganizationEventTest extends CIUnitTestCase
{
    use DatabaseTestTrait;
    use FeatureTestTrait;

    protected $refresh     = true;
    protected $namespace   = 'Percontmx\SportsVibe\Organizations';
    protected $migrate     = true;
    protected $migrateOnce = false;
    protected $seed        = OrganizationsSeeder::class;

    protected function setUp(): void
    {
        parent::setUp();
    }

    protected function tearDown(): void
    {
        parent::tearDown();
    }

    #[Test]
    public function disableOrganizationEventTriggered(): void
    {
        $organizationId = 3;

        Events::on('organizations.disabled', function ($id) use ($organizationId) {
            $this->assertSame($organizationId, $id);
            $organization = model(OrganizationsModel::class)->withDeleted(true)->find($id);
            $this->assertNotNull($organization->deleted_at);
        });

        $response = $this->delete("/organizations/{$organizationId}");
        $response->assertRedirect();
    }
}

