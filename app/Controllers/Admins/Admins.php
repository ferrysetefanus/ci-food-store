<?php

namespace App\Controllers\Admins;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Admins extends BaseController
{
    public function login()
    {
        return view('admins/login');
    }
}
