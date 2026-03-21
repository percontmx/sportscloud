<?php 

namespace Percontmx\SportsVibe\Competitions\Tests;

use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\DatabaseTestTrait;
use PHPUnit\Framework\Attributes\Test;

use Percontmx\SportsVibe\Competitions\Tests\Support\Database\Seeds\TournamentTestDataSeeder;

class GetTournamentServiceTest extends CIUnitTestCase
{

    use DatabaseTestTrait;

    protected $service;
    protected $migrate = true;
    protected $namespace   = 'Percontmx\SportsVibe\Competitions';
    protected $seed = TournamentTestDataSeeder::class;
    
    protected function setUp(): void 
    {
        parent::setUp();
        $this->service = service('competitions');
    }

    #[Test]
    public function getActiveTournament()
    {
        $tournament = $this->service->getTournament(1);
        $this->assertNotNull($tournament);
        $this->assertNull($tournament->deleted_at);
    }

    #[Test]
    public function getInactiveTournament()
    {
        $tournament = $this->service->getTournament(2);
        $this->assertNull($tournament);
    }   
}




