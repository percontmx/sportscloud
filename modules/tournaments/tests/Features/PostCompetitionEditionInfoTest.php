<?php

use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\DatabaseTestTrait;
use CodeIgniter\Test\FeatureTestTrait;
use Percontmx\SportsCloud\Tournaments\Tests\Support\Database\Seeds\CompetitionEditionsTestDataSeeder;
use PHPUnit\Framework\Attributes\Test;

class PostCompetitionEditionInfoTest extends CIUnitTestCase
{
    use DatabaseTestTrait;
    use FeatureTestTrait;

    protected $migrate   = true;
    protected $namespace = 'Percontmx\SportsCloud\Tournaments';
    protected $seed      = CompetitionEditionsTestDataSeeder::class;

    #[Test]
    public function testCreateEdition()
    {

        $response = $this->post("/tournaments/1/editions", [
            'name' => 'Apertura 2025',
            'start_date' => '2024-03-01',
            'end_date' => '2024-03-31',
        ])->assertRedirect("/tournaments/1/editions/");

        $this->seeInDatabase('editions', [
            'name' => 'Apertura 2025',
            'slug' => 'apertura-2025',
            'competition_id' => 1,
        ]);


    }
}