<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTbRule extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_rule' => [
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
            'id_gejala' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'mb' => [
                'type' => 'FLOAT',
            ],
            'md' => [
                'type' => 'FLOAT',
            ],
            'nilai_cf' => [
                'type' => 'FLOAT',
            ],
        ]);

        $this->forge->addKey('id_rule', true);
        $this->forge->addForeignKey('id_penyakit', 'tb_penyakit', 'id_penyakit');
        $this->forge->addForeignKey('id_gejala', 'tb_gejala', 'id_gejala');

        $this->forge->createTable('tb_rule');
    }

    public function down()
    {
        $this->forge->dropTable('tb_rule');
    }
}
