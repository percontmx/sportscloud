<?php

use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\ControllerTestTrait;
use Config\Services;
use Percontmx\SportsCloud\Organizations\Controllers\CreateOrganizationController;
use Percontmx\SportsCloud\Organizations\Services\OrganizationsService;
use PHPUnit\Framework\Attributes\Test;

class CreateOrganizationControllerTest extends CIUnitTestCase
{

    use ControllerTestTrait;

    private $mockService;

    public function setUp(): void 
    {
        parent::setUp();
        $this->mockService = $this->getMockBuilder(OrganizationsService::class)
            ->disableOriginalConstructor()
            ->getMock();
        Services::injectMock('organizations', $this->mockService);
    }

    public function tearDown(): void 
    {
        parent::tearDown();
        $this->resetServices();
    }

    #[Test]
    public function createOrganizationSuccessfullyRequest(): void
    {
        $data = [
            'full_name'  => 'National Football League',
            'short_name' => 'NFL'
        ];

        $result = $this->controller(CreateOrganizationController::class)
            ->execute('index');

        $result->assertStatus(201);
        $result->assertContentType('application/json');
        $result->assertJSONFragment($data);
    }

    #[Test]
    public function createOrganizationSuccessfullyForm()
    {
        $data = [
            'full_name'  => 'National Hockey League',
            'short_name' => 'NHL'
        ];

        $result = $this->controller(CreateOrganizationController::class)
            ->execute('index');

        $result->assertStatus(200);
        $result->assertContentType('text/html');
        $result->assertSeeElement('#success');
    }

    #[Test]
    public function createOrganizationFailedRequest()
    {
        $result = $this->controller(CreateOrganizationController::class)
            ->execute('index');

        $result->assertStatus(400);
        $result->assertContentType('application/json');
        $result->assertJSONFragment([
            'errors' => [
                'full_name'  => 'The full_name field is required.',
                'short_name' => 'The short_name field is required.'
            ]
        ]);
    }

    #[Test]
    public function createOrganizationFailedForm()
    {
        $data = [
            'short_name' => 'NBA'
        ];

        $result = $this->controller(CreateOrganizationController::class)
            ->execute('index');

        $result->assertStatus(200);
        $result->assertContentType('text/html');
        $result->assertSeeElement('#error');
    }
}
