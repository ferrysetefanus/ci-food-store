<?php

namespace App\Controllers\Admins;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\Admin\Admin;

class Admins extends BaseController
{

    public function __construct() {
        $this->db = \Config\Database::connect();
    }

    public function login()
    {
        return view('admins/login');
    }

    public function checkLogin() {
        $session = session();

        if(auth()->loggedIn()) {
            return redirect()->to('admins/index');
        }

        $credentials = [
            'email'     => $this->request->getVar('email'),
            'password'  => $this->request->getVar('password')
        ];

        $loginAttempt = auth()->attempt($credentials);

        if($loginAttempt->isOK()) {
            $user = auth()->user();

            $adminModel = new \App\Models\Admin\Admin();
            $adminData = $adminModel->where('user_id', $user->id)->first();

            $ses_data = [
                'id'            => $user->id,
                'name'          => $adminData['name'] ?? $user->username,
                'email'         => $user->email,
                'isLoggedIn'    => TRUE
            ];

            $session->set($ses_data);
            return redirect()->to('admins/index');
        } else {
            return redirect()->to('admins/login')->with('msg', 'Password is incorrect');
        }
    }

    public function index() {

        $session = session();

        $countProduct = $this->db->table('products')->countAllResults();

        $countCategories = $this->db->table('categories')->countAllResults();

        $countOrders = $this->db->table('orders')->countAllResults();

        $countAdmins = $this->db->table('admins')->countAllResults();

        return view ('admins/index', compact('session', 'countProduct', 'countCategories', 'countOrders', 'countAdmins'));
    }

    public function logout() {

        $session = session();

        auth()->logout();

        $session->destroy();

        return redirect()->to('admins/login')->with("msg", "You have been logged out");
    }

    public function allAdmins() {

        $session = session();

        $admins = $this->db->query("SELECT * FROM admins ORDER BY created_at DESC")->getResult();

        return view("admins/all-admins", compact('session', 'admins'));
    }
}
