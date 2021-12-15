<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateBlog extends Migration
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
            'blog_title' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => false,
            ],
            'blog_details' => [
                'type' => 'TEXT',
                'null' => false,
            ],
            'blog_image' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => false,
            ],
            'youtube_link' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'category_id' => [
                'type' => 'INT',
                'constraint' => 5,
                'null' => false,
                'unsigned' => true
            ],
            'admin_id' => [
                'type' => 'INT',
                'constraint' => 5,
                'null' => false,
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
        $this->forge->addForeignKey('admin_id', 'admin_users', 'id');
        $this->forge->addForeignKey('category_id', 'category', 'id');
        $this->forge->createTable('blogs');
    }

    public function down()
    {
        $this->forge->dropTable('blogs');
    }
}
