<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateCartTable extends Migration
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
            'product_id' => [
                'type'              => 'INT',
                'constraint'        => '10',
                'unsigned'          => true
            ],
            'user_id' => [
                'type'              => 'INT',
                'constraint'        => '10',
                'unsigned'          => true
            ],
            'name' => [
                'type'              => 'VARCHAR',
                'constraint'        => '200'
            ],
            'qty' => [
                'type'              => 'VARCHAR',
                'constraint'        => '20',
            ],
            'image' => [
                'type'              => 'VARCHAR',
                'constraint'        => '200',
            ],
            'price' => [
                'type'              => 'VARCHAR',
                'constraint'        => '20',
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
        $this->forge->addForeignKey('product_id', 'products', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('user_id', 'users', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('cart');
    }

    public function down()
    {
        $this->forge->dropTable('cart');
    }
}
