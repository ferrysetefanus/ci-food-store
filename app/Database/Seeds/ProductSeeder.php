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
                'name'          => 'lamb meat',
                'price'         => '30',
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
            ],
            [
                'name'          => 'mango',
                'price'         => '18',
                'description'   => 'test',
                'image'         => 'fruits.jpg',
                'category_id'   => '3',
                'exp_date'      => '2025'
            ],
            [
                'name'          => 'tuna fish',
                'price'         => '20',
                'description'   => 'test',
                'image'         => 'fruits.jpg',
                'category_id'   => '1',
                'exp_date'      => '2025'
            ],
            [
                'name'          => 'salmon fish',
                'price'         => '20',
                'description'   => 'test',
                'image'         => 'fruits.jpg',
                'category_id'   => '1',
                'exp_date'      => '2025'
            ],
            [
                'name'          => 'Sausage',
                'price'         => '10',
                'description'   => 'test',
                'image'         => 'fruits.jpg',
                'category_id'   => '2',
                'exp_date'      => '2025'
            ],
            [
                'name'          => 'Nugget',
                'price'         => '10',
                'description'   => 'test',
                'image'         => 'fruits.jpg',
                'category_id'   => '2',
                'exp_date'      => '2025'
            ],
            [
                'name'          => 'Tomates',
                'price'         => '10',
                'description'   => 'test',
                'image'         => 'vegetables.jpg',
                'category_id'   => '6',
                'exp_date'      => '2025'
            ],
            [
                'name'          => 'Lettuces',
                'price'         => '10',
                'description'   => 'test',
                'image'         => 'vegetables.jpg',
                'category_id'   => '6',
                'exp_date'      => '2025'
            ],
        ];

        $this->db->table('products')->insertBatch($data);
    }
}
