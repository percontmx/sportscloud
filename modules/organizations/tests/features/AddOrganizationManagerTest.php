<?php

use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\DatabaseTestTrait;
use CodeIgniter\Test\FeatureTestTrait;
use Percontmx\SportsCloud\Organizations\Tests\Support\Database\Seeds\OrganizationManagersSeeder;
use PHPUnit\Framework\Attributes\Test;

/**
 * @internal
 */
final class AddOrganizationManagerTest extends CIUnitTestCase
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
    public function addOrganizationManagerSuccessfully()
    {
        $this->dontSeeInDatabase('organization_managers', [
            'organization_id' => 2,
            'user'            => 'lucas',
        ]);

        $this->post('/organizations/2/managers', [
            'user' => 'lucas',
        ])->assertRedirectTo('/organizations/2');

        $this->seeInDatabase('organization_managers', [
            'organization_id' => 2,
            'user'            => 'lucas',
        ]);
    }
}
