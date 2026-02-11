<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateOrderTable extends Migration
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
                'constraint'        => '200'
            ],
            'user_id' => [
                'type'              => 'INT',
                'constraint'        => '10',
                'unsigned'          => true
            ],
            'last_name' => [
                'type'              => 'VARCHAR',
                'constraint'        => '200'
            ],
            'address' => [
                'type'              => 'TEXT'
            ],
            'town' => [
                'type'              => 'VARCHAR',
                'constraint'        => '200',
            ],
            'state' => [
                'type'              => 'VARCHAR',
                'constraint'        => '200',
            ],
            'zip_code' => [
                'type'              => 'INT',
                'constraint'        => '50',
            ],
            'phone' => [
                'type'              => 'VARCHAR',
                'constraint'        => '50',
            ],
            'order_notes' => [
                'type'              => 'TEXT'
            ],
            'price' => [
                'type'              => 'INT',
                'constraint'        => '50',
            ],
            'status' => [
                'type'              => 'ENUM',
                'constraint'        => ['pending', 'success', 'failed'],
                'default'           => 'pending'
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
        $this->forge->addForeignKey('user_id', 'users', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('orders');
    }

    public function down()
    {
        $this->forge->dropTable('orders');
    }
}
