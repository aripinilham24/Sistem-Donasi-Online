<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\Mdonasi;

class Cdonasi extends BaseController
{
    protected $model;
    public function __construct()
    {
        $this->model = new Mdonasi();
    }
    public function index()
    {
        $data['datadonasi'] = $this->model->findAll();
        echo view('template/header.php');
        echo view('template/sidebar.php');
        echo view('template/topnavbar.php');
        echo view('Vdonasi.php',$data);
        echo view('template/footer.php');
    }

    public function tambah_data() 
    {
        echo view('template/header.php');
        echo view('template/sidebar.php');
        echo view('template/topnavbar.php');
        echo view('Vtambah_data.php');
        echo view('template/footer.php');
    }

    public function simpan_data()
{
    $validation = \Config\Services::validation();

    $rules = [
        'judul' => 'required',
        'deskripsi' => 'required',
        'target_donasi' => 'required|numeric',
        'deadline' => 'required|valid_date',
        'gambar' => 'uploaded[gambar]|is_image[gambar]|max_size[gambar,2048]',
    ];

    if (!$this->validate($rules)) {
        return redirect()->back()->withInput()->with('errors', $validation->getErrors());
    }

    $gambar = $this->request->getFile('gambar');
    $namaGambar = $gambar->getRandomName();
    $gambar->move('assets/uploads/', $namaGambar);

    $this->model->save([
        'judul' => $this->request->getPost('judul'),
        'deskripsi' => $this->request->getPost('deskripsi'),
        'target_donasi' => $this->request->getPost('target_donasi'),
        'deadline' => $this->request->getPost('deadline'),
        'gambar' => $namaGambar,
        'dibuat_pada' => date('Y-m-d'),
        'terkumpul' => 0,
    ]);

    return redirect()->to(base_url('lihatdonasi'))->with('success', 'Kampanye berhasil ditambahkan');

}

public function hapus_data($id)
{
    $donasi = $this->model->find($id);

    // Jika data tidak ditemukan
    if (!$donasi) {
        return redirect()->to(base_url('lihatdonasi'))->with('errors', ['Data tidak ditemukan']);
    }

    // Hapus gambar jika ada
    if ($donasi['gambar'] && file_exists('assets/uploads/' . $donasi['gambar'])) {
        unlink('assets/uploads/' . $donasi['gambar']);
    }

    // Hapus data dari database
    $this->model->delete($id);

    return redirect()->to(base_url('lihatdonasi'))->with('success', 'Data kampanye berhasil dihapus');
}

public function edit_data($id)
{
    $data['donasi'] = $this->model->find($id);
    
    if (!$data['donasi']) {
        throw new \CodeIgniter\Exceptions\PageNotFoundException('Data donasi tidak ditemukan.');
    }

    echo view('template/header.php');
    echo view('template/sidebar.php');
    echo view('template/topnavbar.php');
    echo view('Vedit_data.php', $data);
    echo view('template/footer.php');
}

public function update_data($id)
{
    $validation = \Config\Services::validation();

    $rules = [
        'judul' => 'required',
        'deskripsi' => 'required',
        'target_donasi' => 'required|numeric',
        'deadline' => 'required|valid_date',
        'gambar' => 'is_image[gambar]|max_size[gambar,2048]',
    ];

    if (!$this->validate($rules)) {
        return redirect()->back()->withInput()->with('errors', $validation->getErrors());
    }

    $gambar = $this->request->getFile('gambar');
    $namaGambar = $this->model->find($id)['gambar']; // Ambil gambar lama jika tidak upload gambar baru
    if ($gambar->isValid()) {
        $namaGambar = $gambar->getRandomName();
        $gambar->move('assets/uploads/', $namaGambar);
    }

    $this->model->update($id, [
        'judul' => $this->request->getPost('judul'),
        'deskripsi' => $this->request->getPost('deskripsi'),
        'target_donasi' => $this->request->getPost('target_donasi'),
        'deadline' => $this->request->getPost('deadline'),
        'gambar' => $namaGambar,
    ]);

    return redirect()->to(base_url('lihatdonasi'))->with('success', 'Kampanye berhasil diupdate');
}



}
