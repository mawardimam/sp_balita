<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTbGejala extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_gejala' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'kode_gejala' => [
                'type' => 'VARCHAR',
                'constraint' => 10,
            ],
            'nama_gejala' => [
                'type' => 'VARCHAR',
                'constraint' => 150,
            ],
        ]);
        $this->forge->addKey('id_gejala', true);
        $this->forge->createTable('tb_gejala');
    }

    public function down()
    {
        $this->forge->dropTable('tb_gejala');
    }
}
