<?php

use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\DatabaseTestTrait;
use CodeIgniter\Test\FeatureTestTrait;
use Percontmx\SportsVibe\Competitions\Tests\Support\Database\Seeds\CompetitionEditionsTestDataSeeder;
use PHPUnit\Framework\Attributes\Test;

class PostCompetitionEditionInfoTest extends CIUnitTestCase
{
    use DatabaseTestTrait;
    use FeatureTestTrait;

    protected $migrate   = true;
    protected $namespace = 'Percontmx\SportsVibe\Competitions';
    protected $seed      = CompetitionEditionsTestDataSeeder::class;

    #[Test]
    public function testCreateEdition()
    {

        $response = $this->post("/competitions/1/editions", [
            'name' => 'Apertura 2025',
            'start_date' => '2024-03-01',
            'end_date' => '2024-03-31',
        ])->assertRedirect("/competitions/1/editions/");

        $this->seeInDatabase('editions', [
            'name' => 'Apertura 2025',
            'slug' => 'apertura-2025',
            'competition_id' => 1,
        ]);


    }
}



