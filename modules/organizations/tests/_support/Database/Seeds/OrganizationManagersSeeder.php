<?php

namespace Percontmx\SportsCloud\Organizations\Tests\Support\Database\Seeds;

use CodeIgniter\Database\Seeder;

class OrganizationManagersSeeder extends Seeder
{
    public function run()
    {
        $this->call(OrganizationsSeeder::class);
        $orgManagers = [[
            'organization_id' => 1,
            'user'            => 'decio',
        ],
            [
                'organization_id' => 1,
                'user'            => 'mikel',
            ],
        ];
        $builder = $this->db->table('organization_managers');

        foreach ($orgManagers as $orgManager) {
            $builder->insert($orgManager);
        }
    }
}
