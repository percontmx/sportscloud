<?php

namespace Percontmx\SportsCloud\Organizations\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddCreatedByToOrganizationsTable extends Migration
{
    public function up()
    {
        $fields = [
            'created_by' => [
                'type'       => 'VARCHAR',
                'constraint' => '32',
                'null'       => false,
            ],
        ];

        $this->forge->addColumn('organizations', $fields);
    }

    public function down()
    {
        if ($this->db->DBDriver !== 'SQLite3') {
            $this->forge->dropColumn('organizations', 'created_by');
        }
    }
}