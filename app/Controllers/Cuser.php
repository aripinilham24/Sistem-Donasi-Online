<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\Muser;

class Cuser extends BaseController
{
    protected $model;
    protected $data;
    public function __construct()
    {
        $this->model = new Muser();
        $this->data = $this->getSession();
    }
    public function index()
    {
        $data['session'] = $this->data;
        $data['datauser'] = $this->model->findAll();
        echo view('template/header.php');
        echo view('template/sidebar.php');
        echo view('template/topnavbar.php', $data);
        echo view('Vuser.php', $data);
        echo view('template/footer.php');
    }

    public function create()
    {
        $data['session'] = $this->data;
        echo view('template/header.php');
        echo view('template/sidebar.php');
        echo view('template/topnavbar.php', $data);
        echo view('Vtambah_user.php');
        echo view('template/footer.php');
    }

    public function store()
    {

        $validation = \Config\Services::validation();
        $rules = [
            'nama' => 'required',
            'email' => 'required|valid_email|is_unique[users.email]',
            'password' => 'required|min_length[6]',
            'role' => 'required',
            'foto' => 'uploaded[foto]|max_size[foto,1024]|is_image[foto]'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $foto = $this->request->getFile('foto');
        $namaFoto = $foto->getRandomName();
        $foto->move('assets/uploads/users/', $namaFoto);

        $this->model->save([
            'nama' => $this->request->getPost('nama'),
            'email' => $this->request->getPost('email'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'role' => $this->request->getPost('role'),
            'foto' => $namaFoto,
        ]);

        return redirect()->to('/lihatuser')->with('success', 'User berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $data['session'] = $this->data;

        $data['user'] = $this->model->find($id);

        if (!$data['user']) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("User dengan ID $id tidak ditemukan.");
        }
        echo view('template/header.php');
        echo view('template/sidebar.php');
        echo view('template/topnavbar.php', $data);
        echo view('Vedit_user.php', $data);
        echo view('template/footer.php');
    }

    public function update($id)
    {
        $user = $this->model->find($id);

        $data = [
            'nama' => $this->request->getPost('nama'),
            'email' => $this->request->getPost('email'),
            'role' => $this->request->getPost('role'),
        ];

        $password = $this->request->getPost('password');
        if ($password) {
            $data['password'] = password_hash($password, PASSWORD_DEFAULT);
        }

        $foto = $this->request->getFile('foto');
        if ($foto && $foto->isValid() && !$foto->hasMoved()) {
            if ($user['foto']) {
                @unlink('assets/uploads/users' . $user['foto']);
            }
            $namaFoto = $foto->getRandomName();
            $foto->move('assets/uploads/users', $namaFoto);
            $data['foto'] = $namaFoto;
        }

        $this->model->update($id, $data);

        return redirect()->to('/lihatuser')->with('success', 'User berhasil diperbarui.');
    }

    public function delete($id)
    {
        $user = $this->model->find($id);

        if ($user['foto']) {
            @unlink('assets/uploads/' . $user['foto']);
        }

        $this->model->delete($id);
        return redirect()->to('/lihatuser')->with('success', 'User berhasil dihapus.');
    }

    public function setting()
    {
        $data['session'] = $this->data;

        echo view('user/template/head.php');
        echo view('user/template/header.php', $data);
        echo view('user/profile', $data);
        echo view('user/template/footer.php');
    }

    public function edit_profile()
    {
        $data['session'] = $this->data;

        echo view('user/template/head.php');
        echo view('user/template/header.php', $data);
        echo view('user/edit_profile', $data);
        echo view('user/template/footer.php');
    }

    public function update_profile()
    {
        $session = session();
        $id = $session->get('id'); // Sesuaikan dengan kolom ID user
        $username = $this->request->getPost('username');
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $foto = $this->request->getFile('foto');
        $fotoName = $session->get('foto'); // default: nama file lama

        // Jika file diupload dan valid
        if ($foto && $foto->isValid() && !$foto->hasMoved()) {
            $fotoName = $foto->getRandomName();
            $foto->move('assets/uploads/users', $fotoName);
        }

        // Update data ke DB (pakai model user, misalnya Muser)
        $this->model->update($id, [
            'nama' => $username,
            'email' => $email,
            'password' => $password,
            'foto' => $fotoName
        ]);

        // Update data di session
        $session->set([
            'username' => $username,
            'email' => $email,
            'password' => $password,
            'foto' => $fotoName
        ]);

        return redirect()->to(site_url('cuser/setting'))->with('success', 'Profile updated!');
    }

}
