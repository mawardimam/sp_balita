<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTbDiagnosa extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'id_penyakit' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'nama_balita' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
            ],
            'usia' => [
                'type' => 'VARCHAR',
                'constraint' => 10,
            ],
            'nama_ortu' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
            ],
            'alamat' => [
                'type' => 'TEXT',
            ],
            'tanggal' => [
                'type' => 'DATE',
            ],
            'nilai_cf' => [
                'type' => 'FLOAT',
            ],
            'presentase' => [
                'type' => 'FLOAT',
            ],
        ]);

        $this->forge->addKey('id', true);
        // $this->forge->addForeignKey('id_penyakit', 'tb_penyakit', 'id_penyakit');

        $this->forge->createTable('tb_diagnosa');
    }

    public function down()
    {
        $this->forge->dropTable('tb_diagnosa');
    }
}
