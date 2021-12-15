<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateCategoey extends Migration
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
            'category_name' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => false,
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
        $this->forge->createTable('category');
    }

    public function down()
    {
        $this->forge->dropTable('category');
    }
}
