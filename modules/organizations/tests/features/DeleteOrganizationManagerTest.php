<?php

use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\DatabaseTestTrait;
use CodeIgniter\Test\FeatureTestTrait;
use Percontmx\SportsCloud\Organizations\Tests\Support\Database\Seeds\OrganizationManagersSeeder;
use PHPUnit\Framework\Attributes\Test;

/**
 * @internal
 */
final class DeleteOrganizationManagerTest extends CIUnitTestCase
{
    use DatabaseTestTrait;
    use FeatureTestTrait;

    protected $refresh     = true;
    protected $namespace   = 'Percontmx\SportsCloud\Organizations';
    protected $migrate     = true;
    protected $migrateOnce = false;
    protected $seed        = OrganizationManagersSeeder::class;
    protected $seedOnce    = false;

    protected function setUp(): void
    {
        parent::setUp();
    }

    #[Test]
    public function deleteOrganizationManagerSuccessfully()
    {
        $this->seeInDatabase('organization_managers', [
            'organization_id' => 1,
            'user'            => 'decio',
        ]);
        $response = $this->delete('/organizations/1/managers/1');
        $response->assertRedirectTo('/organizations/1');
        $this->dontSeeInDatabase('organization_managers', [
            'organization_id' => 1,
            'user'            => 'decio',
        ]);
    }
}
