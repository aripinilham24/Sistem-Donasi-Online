<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\Mdonasi;
use App\Models\Mtransaksi;

class Beranda extends BaseController
{
    protected $model;
    protected $model_transaksi;
    public function __construct()
    {
        $this->model = new Mdonasi();
        $this->model_transaksi = new Mtransaksi();
    }
    public function index()
    {
        $data['session'] = $this->getSession();
        $data['donasi'] = $this->model->getAllWithPercentage();
        echo view('user/template/head.php', $data);
        echo view('user/template/header.php', $data);
        echo view('user/template/content.php', $data);
        echo view('user/template/footer.php', $data);
    }

    public function kategori($kategori) {
        $data['session'] = $this->getSession();
        $data['kategori'] = $kategori;
        $data['donasi'] = $this->model->getAllKategori($kategori);
        echo view('user/template/head.php', $data);
        echo view('user/template/header.php', $data);
        echo view('user/kategori_kampanye.php', $data);
    }

    public function detail_kampanye($id)
    {
        $data['session'] = $this->getSession();
        $data['data'] = [
            'detail_kampanye' => $this->model->find($id),
            'donatur_kampanye' => $this->model_transaksi->donatur_kampanye($id),
            'total_donatur' => $this->model_transaksi->total_donatur($id),
            'id_kampanye' => $id
        ];

        echo view('user/template/head.php', $data);
        echo view('user/template/header.php', $data);
        echo view('user/detail_kampanye.php', $data);
        echo view('user/template/footer.php', $data);
    }
}
