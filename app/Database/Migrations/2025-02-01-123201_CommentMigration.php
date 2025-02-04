<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CommentMigration extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'int',
                'unsigned' => true,
                'auto_increment' => true
            ],
            'post_id' => [
                'type' => 'int',
                'constraint' => 11,
                'null' => false
            ],
            'user_id' => [
                'type' => 'int',
                'constraint' => 11,
                'null' => false
            ],
            'comment' => [
                'type' => 'text',
                'null' => true,
                'default' => 'Invalid comment. Delete after seeing this message'
            ],
            'created_at timestamp default current_timestamp'
        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('comments');
    }

    public function down()
    {
        $this->forge->dropTable('comments');
    }
}
