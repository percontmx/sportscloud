<?php

namespace Percontmx\SportsCloud\Organizations\Database\Migrations;

use CodeIgniter\Database\Migration;

class OrganizationManagersTableMigration extends Migration
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
            'organization_id' => [
                'type'       => 'INT',
                'constraint' => 5,
                'unsigned'   => true,
            ],
            'user' => [
                'type'       => 'VARCHAR',
                'constraint' => '32',
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
        $this->forge->addKey('organization_id');
        $this->forge->addKey('user');
        $this->forge->addForeignKey('organization_id', 'organizations', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('organization_managers');
    }

    public function down()
    {
        $this->forge->dropTable('organization_managers');
    }
}
