<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'name'  => 'Fishes',
                'image' => 'fish.jpg'
            ],
            [
                'name'  => 'Frozen Foods',
                'image' => 'frozen.jpg'
            ],
            [
                'name'  => 'Fruits',
                'image' => 'fruits.jpg'
            ],
            [
                'name'  => 'Meats',
                'image' => 'meats.jpg'
            ]
        ];

        $this->db->table('categories')->insertBatch($data);
    }
}
