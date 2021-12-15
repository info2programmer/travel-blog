<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateAdmin extends Migration
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
                'constraint' => 50,
                'null' => false,
            ],
            'email' => [
                'type' => 'VARCHAR',
                'constraint' => 150,
                'null' => false,
            ],
            'password' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => false,
            ],
            'role' => [
                'type' => 'TINYINT',
                'constraint' => 1, // 1 => SUPER ADMIN , 2=> NORML ADMIN
                'null' => false,
                'default' => 2
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
        $this->forge->addPrimaryKey('id')->addUniqueKey('email');
        $this->forge->createTable('admin_users');
    }

    public function down()
    {
        $this->forge->dropTable('admin_users');
    }
}
