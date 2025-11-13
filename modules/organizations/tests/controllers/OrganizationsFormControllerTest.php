<?php

use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\ControllerTestTrait;
use Config\Services;
use Percontmx\SportsCloud\Organizations\Controllers\OrganizationsFormController;
use Percontmx\SportsCloud\Organizations\Entities\Organization;
use Percontmx\SportsCloud\Organizations\Services\OrganizationsService;
use PHPUnit\Framework\Attributes\Test;

/**
 * @internal
 */
final class OrganizationsFormControllerTest extends CIUnitTestCase
{
    use ControllerTestTrait;

    /**
     * @var MockObject
     */
    private $mock;

    protected function setUp(): void
    {
        parent::setUp();
        if (! $this->mock) {
            $this->mock = $this->getMockBuilder(OrganizationsService::class)->getMock();
            Services::injectMock('organizations', $this->mock);
        }
    }

    public static function tearDownAfterClass(): void
    {
        parent::tearDownAfterClass();
        Services::reset();
    }

    #[Test]
    public function loadEmptyOrganizationForm()
    {
        $result = $this->controller(OrganizationsFormController::class)
            ->execute('index');
        $result->assertStatus(200);
        $result->assertSeeInField('full_name', '');
        $result->assertSeeInField('short_name', '');
        $result->assertSeeInField('create', lang('Organizations.Actions.Create'));
    }

    #[Test]
    public function loadOrganizationForm()
    {
        $organization = new Organization([
            'full_name'  => 'National Football League',
            'short_name' => 'NFL',
        ]);

        $this->mock->expects($this->once())
            ->method('getOrganization')
            ->with(1)
            ->willReturn($organization);

        $result = $this->controller(OrganizationsFormController::class)
            ->execute('index', 1);

        $result->assertStatus(200);
        $result->assertSeeInField('full_name', $organization->full_name);
        $result->assertSeeInField('short_name', $organization->short_name);
    }

    #[Test]
    public function loadUnexistingOrganizationForm()
    {
        $this->mock->expects($this->once())
            ->method('getOrganization')
            ->with(-1)
            ->willReturn(null);

        $result = $this->controller(OrganizationsFormController::class)
            ->execute('index', -1);

        $result->assertStatus(404);
    }
}
