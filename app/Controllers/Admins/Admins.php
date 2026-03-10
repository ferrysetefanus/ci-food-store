<?php

namespace App\Controllers\Admins;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\Admin\Admin;

class Admins extends BaseController
{
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
            $session->setFlashdata('msg', 'Password is incorrect');
            return redirect()->to('admins/login');
        }
    }

    public function index() {

        $session = session();
        return view ('admins/index', compact('session'));
    }

    public function logout() {

        $session = session();

        auth()->logout();

        $session->destroy();

        return redirect()->to('admins/login')->with("msg", "You have been logged out");
    }
}
