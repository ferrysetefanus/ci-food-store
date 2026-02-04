<?php

namespace App\Controllers\Categories;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\Product\Product;

class Categories extends BaseController
{

    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }

    public function categoryProducts($id)
    {
        $products = $this->db->query("SELECT * FROM products where category_id = '$id'")->getResult();
        return view("products/products-category", compact("products"));
    }
}
