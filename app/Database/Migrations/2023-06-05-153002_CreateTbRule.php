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
            'nama_penyakit' => [
                'type' => 'VARCHAR',
                'constraint' => 150,
            ],
            'nama_gejala' => [
                'type' => 'VARCHAR',
                'constraint' => 150,
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
        $this->forge->createTable('tb_rule');
    }

    public function down()
    {
        $this->forge->dropTable('tb_rule');
    }
}
