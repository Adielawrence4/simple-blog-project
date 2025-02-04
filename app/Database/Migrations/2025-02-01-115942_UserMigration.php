<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class UserMigration extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'int',
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'name' => [
                'type' => 'varchar',
                'constraint' => 150,
                'null' => false
            ],
            'username' => [
                'type' => 'varchar',
                'constraint' => 150,
                'null' => false
            ],
            'email' => [
                'type' => 'varchar',
                'constraint' => 200,
                'null' => false
            ],
            'password' => [
                'type' => 'varchar',
                'constraint' => 200,
                'null' => false
            ],
            'image' => [
                'type' => 'varchar',
                'constraint' => 200,
                'null' => true
            ],
            'updated_at timestamp default current_timestamp',
            'created_at timestamp default current_timestamp',
        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->addUniqueKey('email');
        $this->forge->createTable('users');
    }

    public function down()
    {
        $this->forge->dropTable('users');
    }
}
