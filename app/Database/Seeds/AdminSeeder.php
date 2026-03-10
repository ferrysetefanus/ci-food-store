<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\Shield\Entities\User;

class AdminSeeder extends Seeder
{
    public function run()
    {
        $userModel = auth()->getProvider();
        $db = \Config\Database::connect();

        $existingUser = $userModel->findByCredentials(["email" => 'admin@gmail.com']);

        if(!$existingUser) {
            $user = new User([
                'username'  => 'admin',
                'email'     => 'admin@gmail.com',
                'password'  => 'admin12345'
            ]);

            $userModel->save($user);

            $newUserId = $userModel->getInsertID();

            $userEntity = $userModel->find($newUserId);

            if($userEntity) {
                $adminData = [
                'user_id'   => $newUserId,
                'name'      => $user->username,
                'email'     => $user->email
                ];

                $db->table('admins')->insert($adminData);

                $userEntity->addGroup('admin');
                $userEntity->activate();

                echo "Akun admin berhasil dibuat! \n";
            } else {
                echo "Akun admin sudah ada di database. \n";
            }
        }
    }
}
