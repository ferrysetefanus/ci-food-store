<?php

namespace App\Controllers\Users;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class UsersInfo extends BaseController
{
    public function __construct()
    {
        $this->db = \Config\Database::connect();
    } 

    public function userOrders()
    {
        $id = auth()->user()->id;

        $orders = $this->db->table('orders')->where('user_id', $id)->orderBy('created_at', 'desc')->get()->getResult();

        return view('users/user-orders', compact('orders'));
    }
}
