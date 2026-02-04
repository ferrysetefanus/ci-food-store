<?php

namespace App\Controllers\Products;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Products extends BaseController
{

    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }

    public function productDetails($id)
    {
        $product = $this->db->query("SELECT * FROM products where id='$id'")->getFirstRow();
        return view("products/single-product", compact("product"));
    }
}
