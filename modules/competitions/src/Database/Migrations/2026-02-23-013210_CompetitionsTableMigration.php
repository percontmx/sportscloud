<?php

namespace Percontmx\SportsVibe\Competitions\Database\Migrations;

use CodeIgniter\Database\Migration;

class CompetitionsTableMigration extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'organization_id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'null' => true],
            'name' => ['type' => 'VARCHAR', 'constraint' => 255],
            'created_at' => ['type' => 'DATETIME', 'null' => true],
            'updated_at' => ['type' => 'DATETIME', 'null' => true],
            'deleted_at' => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        if ($this->db->tableExists('organizations')) {
            $this->forge->addForeignKey('organization_id', 'organizations', 'id', 'CASCADE', 'CASCADE');
        }
        $this->forge->createTable('competitions');

    }

    public function down()
    {
        $this->forge->dropTable('competitions');
    }
}




