<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ContactMigration extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'int',
                'unsigned' => true,
                'auto_increment' => true
            ],
            'name' => [
                'type' => 'varchar',
                'constraint' => 150,
                'null' => false
            ],
            'email' => [
                'type' => 'varchar',
                'constraint' => 200,
                'null' => false
            ],
            'number' => [
                'type' => 'varchar',
                'constraint' => 30,
                'null' => true,
                'default' => 'No number'
            ],
            'message' => [
                'type' => 'text',
                'null' => false
            ],
            'created_at datetime default current_timestamp'
        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('contacts');
    }

    public function down()
    {
        $this->forge->dropTable('contacts');
    }
}
