<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\Mtransaksi;
use App\Models\Mdonasi;

class Transaksi extends BaseController
{
    protected $model;
    protected $kampanyeModel;
    protected $data;
    public function __construct()
    {
        $this->model = new Mtransaksi();
        $this->kampanyeModel = new Mdonasi();
        $this->data = $this->getSession();
    }
    public function index($id)
    {
        if (!session()->get('id')) {
            return redirect()->to('auth/login')->with('error', 'Silakan login untuk berdonasi.');
        }

        $data['session'] = $this->data;
        $data['title'] = 'Donasi';
        $data['id_kampanye'] = $id;

        echo view('user/template/head.php', $data);
        echo view('user/template/header.php', $data);
        echo view('user/donasi.php', $data);
        echo view('user/template/footer.php');
    }

    public function donasi($id)
    {

        $user_id = session()->get('id');
        $kampanye_id = $id;
        $pesan = $this->request->getPost('pesan');
        $nominal = $this->request->getPost('nominal');

        if (empty($nominal) || !is_numeric($nominal) || $nominal <= 0) {
            return redirect()->back()->with('error', 'Nominal donasi tidak valid.');
        }

        $this->model->insert([
            'user_id' => $user_id,
            'kampanye_id' => $kampanye_id,
            'pesan' => $pesan,
            'nominal' => $nominal
        ]);
        $this->kampanyeModel->set('terkumpul', 'terkumpul + ' . (int)$nominal, false)
                    ->where('id', $kampanye_id)
                    ->update();

        return redirect()->to('beranda/detail_kampanye/' . $id)->with('success', 'Donasi berhasil dikirim!');
    }

}