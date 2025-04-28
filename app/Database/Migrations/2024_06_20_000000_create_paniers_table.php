<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePaniersTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true
            ],
            'date_commande' => [
                'type' => 'DATETIME',
                'null' => false
            ],
            'client' => [
                'type' => 'VARCHAR',
                'constraint' => 100
            ]
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('paniers');
    }

    public function down()
    {
        $this->forge->dropTable('paniers');
    }
}