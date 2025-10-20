<?php

namespace Percontmx\SportsCloud\Organizations\Tests\Support\Database\Seeds;

use CodeIgniter\Database\Seeder;

class OrganizationsSeeder extends Seeder {

    public function run(): void
    {
        $factories = [
           [
                'full_name'    => 'Federación Mexicana de Fútbol Asociación, A.C.',
                'short_name'   => 'Femexfut',
                'created_by'   => 'admin'
            ],
            [
                'full_name'    => 'Magnoliga 7 A.C.',
                'short_name'   => 'MagnoLiga',
                'created_by'   => 'admin'
           ]
        ];

        $builder = $this->db->table('organizations');

        foreach ($factories as $factory) {
            $builder->insert($factory);
        }
    }


}
