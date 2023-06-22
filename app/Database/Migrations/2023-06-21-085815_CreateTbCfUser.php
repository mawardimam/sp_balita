<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTbCfUser extends Migration
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
            'nama_nilai' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
            ],
            'cf' => [
                'type' => 'FLOAT',
            ],
        ]);

        $this->forge->addKey('id', true);

        $this->forge->createTable('tb_cf_user');
    }

    public function down()
    {
        $this->forge->dropTable('tb_cf_user');
    }
}
