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


    /*use ControllerTestTrait;

    private $mockService = mock(OrganizationsService::class);

    public function setUp(): void
    {
        parent::setUp();
        // Configuraciones adicionales si es necesario
        $this->mockService->shouldReceive('createOrganization')
            ->andReturnUsing(function ($org) {
                $org->id = 1; // Simula la asignación de un ID
                return $org;
            });
    }

    public function testCreateOrganizationSuccess()
    {
        $postData = [
            'full_name' => 'Test Organization Full Name',
            'short_name' => 'TestOrg'
        ];

        $request = new \CodeIgniter\HTTP\IncomingRequest(
            new \Config\App(),
    new \CodeIgniter\HTTP\URI('http://example.com'),
    null,
    new \CodeIgniter\HTTP\UserAgent(),

        $result = $this->

        /*$result = $this->withRequest(
            \Config\Services::request(),
            'post',
            $postData
        )->controller(CreateOrganizationController::class)
         ->execute('index');

        // Aquí puedes agregar aserciones para verificar la respuesta esperada
        $this->assertStringContainsString('success', $result->getBody());
    }
    */
    
}