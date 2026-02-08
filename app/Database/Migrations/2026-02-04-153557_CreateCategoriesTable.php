<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateCategoriesTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'              => 'INT',
                'constraint'        => 10,
                'unsigned'          => true,
                'auto_increment'    => true
            ],
            'name' => [
                'type'              => 'VARCHAR',
                'constraint'        => '200',
            ],
            'image' => [
                'type'              => 'VARCHAR',
                'constraint'        => '200',
            ],
            'icon' => [
                'type'              => 'VARCHAR',
                'constraint'        => '200',
            ],
            'created_at' => [
                'type'              => 'TIMESTAMP',
                'null'              => true,
                'default'           => new \CodeIgniter\Database\RawSql('CURRENT_TIMESTAMP'),
            ],
            'updated_at' => [
                'type'              => 'TIMESTAMP',
                'null'              => true,
                'default'           => new \CodeIgniter\Database\RawSql('CURRENT_TIMESTAMP'),
            ]
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('categories');
    }

    public function down()
    {
        $this->forge->dropTable('categories');
    }
}
