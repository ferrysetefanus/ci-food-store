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
                'image' => 'fish.jpg',
                'icon'  => 'fish-1'
            ],
            [
                'name'  => 'Frozen Foods',
                'image' => 'frozen.jpg',
                'icon'  => 'french-fries'
            ],
            [
                'name'  => 'Fruits',
                'image' => 'fruits.jpg',
                'icon'  => 'apple'
            ],
            [
                'name'  => 'Meats',
                'image' => 'meats.jpg',
                'icon'  => 'roast-leg'
            ],
            [
                'name'  => 'Packages',
                'image' => 'package.jpg',
                'icon'  => 'appetizer'
            ],
            [
                'name'  => 'Vegetables',
                'image' => 'vegetables.jpg',
                'icon'  => 'carrot'
            ],
        ];

        $this->db->table('categories')->insertBatch($data);
    }
}
