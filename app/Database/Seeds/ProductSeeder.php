<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'name'          => 'piece of meat',
                'price'         => '20',
                'description'   => 'test',
                'image'         => 'meats.jpg',
                'category_id'   => '4',
                'exp_date'      => '2025'    
            ],
            [
                'name'          => 'peaches',
                'price'         => '10',
                'description'   => 'test',
                'image'         => 'fruits.jpg',
                'category_id'   => '3',
                'exp_date'      => '2025'
            ]
        ];

        $this->db->table('products')->insertBatch($data);
    }
}
