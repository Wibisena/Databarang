<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Barang extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'brgkode' => [
                'type' => 'char',
                'constraint' => '10',
            ],
            'brgnama' => [
                'type' => 'varchar',
                'constraint' => '100'
            ],
            'id_penerima' => [
                'type' => 'int',
                'unsigned' => true
            ],
            'brgstatus' => [
                'type' => 'varchar',
                'constraint' => '10'
            ],
            'brgcatatan' => [
                'type' => 'text',
            ],
            'brggambar' => [
                'type' => 'varchar',
                'constraint' => 200
            ]
        ]);

        $this->forge->addPrimaryKey('brgkode');
        $this->forge->addForeignKey('brgkatid', 'kategori', 'katid');
        $this->forge->addForeignKey('brgstatus', 'status', 'satid');

        $this->forge->createTable('barang');
    }

    public function down()
    {
        $this->forge->dropTable('barang');
    }
}
