<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\Muser;
use App\Models\Mdonasi;


class DashboardAdmin extends BaseController
{
    protected $model_user;
    protected $model_donasi;
    public function __construct()
    {
        $this->model_user = new Muser();
        $this->model_donasi = new Mdonasi();
    }
    public function index()
    {
        $data['datadb'] = [
            'user' => $this->model_user->countAll(),
            'donasi' => $this->model_donasi->countAll(),
            'datadonasi' => $this->model_donasi->findAll()
        ];
        // return view('index');
        echo view('template/header.php');
        echo view('template/sidebar.php');
        echo view('template/topnavbar.php');
        echo view('template/content.php', $data);
        echo view('template/footer.php');
    }
}
