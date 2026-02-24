<?php 

namespace Percontmx\SportsCloud\Tournaments\Tests;

use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\DatabaseTestTrait;
use PHPUnit\Framework\Attributes\Test;

use Percontmx\SportsCloud\Tournaments\Tests\Support\Database\Seeds\TournamentTestDataSeeder;

class GetTournamentServiceTest extends CIUnitTestCase
{

    use DatabaseTestTrait;

    protected $service;
    protected $migrate = true;
    protected $namespace   = 'Percontmx\SportsCloud\Tournaments';
    protected $seed = TournamentTestDataSeeder::class;
    
    protected function setUp(): void 
    {
        parent::setUp();
        $this->service = service('tournaments');
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
