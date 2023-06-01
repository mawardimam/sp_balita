<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTbPenyakit extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_penyakit' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'kode_penyakit' => [
                'type' => 'VARCHAR',
                'constraint' => 10,
            ],
            'nama_penyakit' => [
                'type' => 'VARCHAR',
                'constraint' => 150,
            ],
            'keterangan' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'solusi' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
        ]);
        $this->forge->addKey('id_penyakit', true);
        $this->forge->createTable('tb_penyakit');
    }

    public function down()
    {
        $this->forge->dropTable('tb_penyakit');
    }
}
