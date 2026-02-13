<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddUserColumn extends Migration
{
    public function up()
    {
        $fields = [
            'image' => [
                'type'          => 'VARCHAR',
                'constraint'    => '20',
                'default'       => 'avatar.jpg'
            ],
            'address' => [
                'type'          => 'TEXT',
            ],
            'town' => [
                'type'          => 'VARCHAR',
                'constraint'    => '200'
            ],
            'state' => [
                'type'          => 'VARCHAR',
                'constraint'    => '200'
            ],
            'zip_code' => [
                'type'          => 'INT',
                'constraint'    => '20'
            ],
            'phone' => [
                'type'          => 'VARCHAR',
                'constraint'    => '40'
            ]
        ];

        $this->forge->addColumn('users', $fields);
    }

    public function down()
    {
        $this->forge->dropColumn('users', ['image', 'address', 'town', 'state', 'zip_code', 'phone']);
    }
}
