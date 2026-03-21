<?php

namespace Percontmx\SportsVibe\Competitions\Tests\Support\Database\Seeds;

use CodeIgniter\Database\Seeder;

class TournamentTestDataSeeder extends Seeder
{
    public function run()
    {
        $tournamentData = [
            [
                'name'        => 'Liga BBVA MX',
                'created_at'  => date('Y-m-d H:i:s'),
                'updated_at'  => date('Y-m-d H:i:s'),
            ],
            [
                'name'        => 'Copa MX',
                'created_at'  => date('Y-m-d H:i:s'),
                'updated_at'  => date('Y-m-d H:i:s'),
                'deleted_at'  => date('Y-m-d H:i:s')
            ]
        ];
        foreach ($tournamentData as $data) {
            $this->db->table('competitions')->insert($data);
        }
    }
}




