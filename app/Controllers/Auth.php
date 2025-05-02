<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Muser;

class Auth extends BaseController
{
    public function login()
    {
        return view('auth/login');
    }

    public function proses_login()
    {
        
        if ($this->request->getMethod() == 'POST') {
            $session = session();
            $model = new Muser();
            $username = $this->request->getPost('username');
            $password = $this->request->getPost('password');
            $user = $model->getUser($username);

            if ($user && $password === $user['password']) {
                $session->set([
                    'username' => $user['nama'],
                    'role' => $user['role'],
                    'foto' => $user['foto'],
                    'logged_in' => true
                ]);
                return redirect()->to('/dashboard');
            } else {
                return redirect()->back()->with('error', 'Login gagal! Username atau password salah.');
            }
            
        } else {
            echo 'tidak masuk';
        }

    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/');
    }
}
