<?php

namespace Percontmx\SportsVibe\Tournaments\Tests;

use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\FeatureTestTrait;
use CodeIgniter\Test\DatabaseTestTrait;

use Percontmx\SportsVibe\Tournaments\Tests\Support\Database\Seeds\TournamentTestDataSeeder;

class GetTournamentInfoFeatureTest extends CIUnitTestCase
{
    use FeatureTestTrait, DatabaseTestTrait;

    protected $migrate = true;
    protected $namespace = 'Percontmx\SportsVibe\Tournaments';
    protected $seed = TournamentTestDataSeeder::class;

    public function testTournamentViewDisplaysData()
    {
        $result = $this->get('/tournaments/1');
        $result->assertStatus(200);
        $result->assertSee('Liga BBVA MX'); 
    }

    public function testTournamentNotFoundDisplays404()
    {
        $this->expectException(\CodeIgniter\Exceptions\PageNotFoundException::class);
        $this->expectExceptionCode(404);
        $this->get('/tournaments/2');
    }
}

