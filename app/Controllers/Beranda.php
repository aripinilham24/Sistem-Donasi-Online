<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\Mdonasi;

class Beranda extends BaseController
{
    public function index()
    {
        $model = new Mdonasi();
        $data['donasi'] = $model->findAll();
        return view('user/beranda', $data);
    }
}
