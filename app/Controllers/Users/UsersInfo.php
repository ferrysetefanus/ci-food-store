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

    public function EditUserData()
    {
        $id = auth()->user()->id;

        $user = $this->db->table('users')->where('id', $id)->get()->getFirstRow();

        return view("users/update-user", compact('user'));
    }

    public function UpdateUserData()
    {
        $id = auth()->user()->id;
        
        $data = [
            'username'      => $this->request->getPost('username'),
            'address'       => $this->request->getPost('address'),
            'town'          => $this->request->getPost('town'),
            'state'         => $this->request->getPost('state'),
            'zip_code'      => $this->request->getPost('zip_code'),
            'phone'         => $this->request->getPost('phone')
        ];

        session()->setFlashdata('update', 'User data updated successfully');
        

        $userUpdate = $this->db->table('users')->where('id', $id)->update($data);

        if($userUpdate) {
            return redirect()->to(base_url('users/user-data'));
        }
    }
}
