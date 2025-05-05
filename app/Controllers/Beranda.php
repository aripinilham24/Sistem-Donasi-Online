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
        $persentase = $model->getPercentage();
        $data['donasi'] = [
            'donasi' => $model->findAll(),
            'persentase' => $persentase,
            'width' => round($persentase)
        ];
        return view('user/beranda', $data);
    }
}
