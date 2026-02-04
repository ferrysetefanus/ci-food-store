<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateProductTable extends Migration
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
            'category_id' => [
                'type'              => 'INT',
                'constraint'        => '10',
                'unsigned'          => true
            ],
            'name' => [
                'type'              => 'VARCHAR',
                'constraint'        => '200',
            ],
            'price' => [
                'type'              => 'VARCHAR',
                'constraint'        => '200',
            ],
            'description' => [
                'type'              => 'TEXT',
                'null'              => true,
            ],
            'image' => [
                'type'              => 'VARCHAR',
                'constraint'        => '200',
            ],
            'exp_date' => [
                'type'              => 'VARCHAR',
                'constraint'        => '50',
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
        $this->forge->addForeignKey('category_id', 'categories', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('products');
    }

    public function down()
    {
        $this->forge->dropTable('products');
    }
}
