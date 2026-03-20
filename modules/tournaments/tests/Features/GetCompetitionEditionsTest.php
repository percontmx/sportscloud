<?php

use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\DatabaseTestTrait;
use CodeIgniter\Test\FeatureTestTrait;
use Percontmx\SportsVibe\Tournaments\Tests\Support\Database\Seeds\CompetitionEditionsTestDataSeeder;
use PHPUnit\Framework\Attributes\Test;

/**
 * @internal
 */
final class GetCompetitionEditionsTest extends CIUnitTestCase
{
    use DatabaseTestTrait;
    use FeatureTestTrait;

    protected $migrate   = true;
    protected $namespace = 'Percontmx\SportsVibe\Tournaments';
    protected $seed      = CompetitionEditionsTestDataSeeder::class;

    protected function setUp(): void
    {
        parent::setUp();
    }

    #[Test]
    public function getCompetitionEditions()
    {
        $response = $this->get('/tournaments/1/editions');

        $response->assertStatus(200);
        $response->assertSee('Apertura 2025');
        $response->assertSee('Clausura 2026');
    }
}

