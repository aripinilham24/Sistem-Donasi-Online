<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\Mtransaksi;
use App\Libraries\MidtransSnap;

class Transaksi extends BaseController
{
   protected $model;
    protected $data;
    public function __construct() 
    {
        $this->model = new Mtransaksi();
        $this->data = $this->getSession();
    }
    public function index()
    {
        $data['session'] = $this->data;

        echo view('user/template/head.php');
        echo view('user/template/header.php', $data);
        echo view('user/donasi.php',$data);
        echo view('user/template/footer.php');
    }
    public function snapToken()
    {
        new MidtransSnap(); // Init config Midtrans

        // Data dummy untuk testing
        $params = [
            'transaction_details' => [
                'order_id' => uniqid(), // bisa pakai id dari DB
                'gross_amount' => 10000, // nominal donasi
            ],
            'customer_details' => [
                'first_name' => 'John',
                'email' => 'john@example.com',
            ],
        ];

        $snapToken = \Midtrans\Snap::getSnapToken($params);
        return $this->response->setJSON(['snapToken' => $snapToken]);
    }
}