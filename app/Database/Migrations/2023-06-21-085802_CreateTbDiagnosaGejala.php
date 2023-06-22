<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTbDiagnosaGejala extends Migration
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
            'id_diagnosa' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'id_gejala' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
        ]);

        $this->forge->addKey('id', true);
        // $this->forge->addForeignKey('id_diagnosa', 'tb_diagnosa', 'id_penyakit');
        // $this->forge->addForeignKey('id_gejala', 'tb_gejala', 'id_gejala');

        $this->forge->createTable('tb_diagnosa_gejala');
    }

    public function down()
    {
        $this->forge->dropTable('tb_diagnosa_gejala');
    }
}