<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class PostMigration extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'int',
                'unsigned' => true,
                'auto_increment' => true 
            ],
            'title' => [
                'type' => 'varchar',
                'constraint' => 200,
                'null' => false
            ],
            'content' => [
                'type' => 'text',
                'null' => false
            ],
            'image' => [
                'type' => 'varchar',
                'constraint' => 200,
                'null' => true
            ],
            'user_id' => [
                'type' => 'int',
                'constraint' => 11,
                'null' => false
            ],

            'updated_at timestamp default current_timestamp',
            'created_at timestamp default current_timestamp'
            

        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('posts');

    }

    public function down()
    {
        $this->forge->dropTable('posts');
    }
}
