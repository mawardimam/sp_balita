<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTbSolusi extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_solusi' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'kode_solusi' => [
                'type' => 'VARCHAR',
                'constraint' => 10,
            ],
            'id_penyakit' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'solusi' => [
                'type' => 'VARCHAR',
                'constraint' => 250,
            ],
        ]);
        $this->forge->addKey('id_solusi', true);
        $this->forge->addForeignKey('id_penyakit', 'tb_penyakit', 'id_penyakit');

        $this->forge->createTable('tb_solusi');
    }

    public function down()
    {
        $this->forge->dropTable('tb_solusi');
    }
}
