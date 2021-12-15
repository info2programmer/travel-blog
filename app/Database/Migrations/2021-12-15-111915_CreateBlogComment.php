<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateBlogComment extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => "INT",
                'constraint' => 5,
                'auto_increment' => true,
                'unsigned' => true
            ],
            'name' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => false,
            ],
            'email' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => false,
            ],
            'comment' => [
                'type' => 'TEXT',
                'null' => false,
            ],
            'blog_id' => [
                'type' => 'INT',
                'constraint' => 5,
                'null' => false,
                'unsigned' => true
            ],
            'approved_by' => [
                'type' => 'INT',
                'constraint' => 5,
                'null' => true,
                'unsigned' => true
            ],
            'publised' => [
                'type' => 'TINYINT',
                'constraint' => 1, // 1 => ACTIVE , 0=> DEACTIVE
                'null' => false,
                'default' => 2
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('blog_id', 'blogs', 'id');
        $this->forge->addForeignKey('approved_by', 'admin_users', 'id');
        $this->forge->createTable('blog_comments');
    }

    public function down()
    {
        $this->forge->dropTable('blog_comments');
    }
}
