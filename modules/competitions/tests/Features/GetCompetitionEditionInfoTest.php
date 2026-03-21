<?php

use CodeIgniter\Exceptions\PageNotFoundException;
use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\DatabaseTestTrait;
use CodeIgniter\Test\FeatureTestTrait;
use Percontmx\SportsVibe\Competitions\Tests\Support\Database\Seeds\CompetitionEditionsTestDataSeeder;
use PHPUnit\Framework\Attributes\Test;

/**
 * @internal
 */
final class GetCompetitionEditionInfoTest extends CIUnitTestCase
{
    use DatabaseTestTrait;
    use FeatureTestTrait;

    protected $migrate   = true;
    protected $namespace = 'Percontmx\SportsVibe\Competitions';
    protected $seed      = CompetitionEditionsTestDataSeeder::class;

    protected function setUp(): void
    {
        parent::setUp();
    }

    #[Test]
    public function getCompetitionEditionInfo()
    {
        $response = $this->get('/competitions/1/editions/apertura-2025');

        $response->assertStatus(200);
        $response->assertSee('Apertura 2025');
    }

    #[Test]
    public function getNonExistentCompetitionEditionInfo()
    {
        $this->expectException(PageNotFoundException::class);
        $this->expectExceptionCode(404);
        $this->get('/competitions/1/editions/non-existent-edition');
    }
}




