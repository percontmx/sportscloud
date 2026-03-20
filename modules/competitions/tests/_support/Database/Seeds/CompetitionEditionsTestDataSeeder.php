<?php

namespace Percontmx\SportsVibe\Competitions\Tests\Support\Database\Seeds;

use CodeIgniter\Database\Seeder;

class CompetitionEditionsTestDataSeeder extends Seeder
{
    public function run(): void
    {
        $this->call('Percontmx\SportsVibe\Competitions\Tests\Support\Database\Seeds\TournamentTestDataSeeder');
        $editions = [
            [
                'name'           => 'Apertura 2025',
                'slug'           => 'apertura-2025',
                'start_date'     => '2025-07-01',
                'end_date'       => '2025-12-15',
                'competition_id' => 1,
            ],
            [
                'name'           => 'Clausura 2026',
                'slug'           => 'clausura-2026',
                'start_date'     => '2026-01-10',
                'end_date'       => '2026-05-30',
                'competition_id' => 1,
            ],
        ];

        $builder = $this->db->table('editions');

        foreach ($editions as $edition) {
            $builder->insert($edition);
        }
    }
}




