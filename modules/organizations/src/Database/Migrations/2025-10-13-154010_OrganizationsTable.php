<?php

namespace Percontmx\SportsCloud\Organizations\Database\Migrations;

use CodeIgniter\Database\Migration;

class OrganizationsTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'full_name' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'unique'     => true,
            ],
            'short_name' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'unique'     => true,
            ],
            'created_at' => [
                'type'    => 'datetime',
                'null'    => true,
            ],
            'updated_at' => [
                'type'    => 'datetime',
                'null'    => true,
            ],
            'deleted_at' => [
                'type'    => 'datetime',
                'null'    => true,
            ]
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('organizations');
    }

    public function down()
    {
        $this->forge->dropTable('organizations');
    }
}
