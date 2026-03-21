<?php

namespace Percontmx\SportsVibe\Competitions\Tests;

use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\FeatureTestTrait;
use CodeIgniter\Test\DatabaseTestTrait;

use Percontmx\SportsVibe\Competitions\Tests\Support\Database\Seeds\TournamentTestDataSeeder;

class GetTournamentInfoFeatureTest extends CIUnitTestCase
{
    use FeatureTestTrait, DatabaseTestTrait;

    protected $migrate = true;
    protected $namespace = 'Percontmx\SportsVibe\Competitions';
    protected $seed = TournamentTestDataSeeder::class;

    public function testTournamentViewDisplaysData()
    {
        $result = $this->get('/competitions/1');
        $result->assertStatus(200);
        $result->assertSee('Liga BBVA MX'); 
    }

    public function testTournamentNotFoundDisplays404()
    {
        $this->expectException(\CodeIgniter\Exceptions\PageNotFoundException::class);
        $this->expectExceptionCode(404);
        $this->get('/competitions/2');
    }
}




