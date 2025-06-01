<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Muser;

class Auth extends BaseController
{
    protected $model;
    public function __construct() {
        $this->model = new Muser();
    }
    public function login()
    {
        return view('auth/login');
    }

    public function proses_login()
    {
        
        if ($this->request->getMethod() == 'POST') {
            $session = session();
            $username = $this->request->getPost('username');
            $password = $this->request->getPost('password');
            $user = $this->model->getUser($username);
            $role = $user['role'];

            if ($user && $password === $user['password']) {
                $session->set([
                    'id' => $user['id'],
                    'username' => $user['nama'],
                    'email' => $user['email'],
                    'role' => $user['role'],
                    'foto' => $user['foto'],
                    'password' => $user['password'],    
                    'logged_in' => true
                ]);
                if($role === 'admin') {
                    return redirect()->to('/dashboard');
                }
                if($role === 'user') {
                    return redirect()->to('/beranda');
                }
            } else {
                return redirect()->back()->with('error', 'Login gagal! Username atau password salah.');
            }
            
        }

    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/');
    }
}
