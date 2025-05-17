<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\Mdonasi;

class Beranda extends BaseController
{
    protected $model;
    public function __construct()
    {
        $this->model = new Mdonasi();
    }
    public function index()
    {
        $data['donasi'] = $this->model->getAllWithPercentage();
        echo view('user/template/head.php', $data);
        echo view('user/template/header.php', $data);
        echo view('user/template/content.php', $data);
        echo view('user/template/footer.php', $data);
    }

    public function detail_kampanye($id)
    {
        $data['data'] = $this->model->find($id);

        echo view('user/template/head.php', $data);
        echo view('user/template/header.php', $data);
        echo view('user/detail_kampanye.php', $data);
        echo view('user/template/footer.php', $data);
    }
}
