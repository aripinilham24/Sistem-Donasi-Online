<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Libraries\MidtransSnap;

class Donasi extends BaseController
{

    public function index() {

        if (!session()->get('id')) {
            return redirect()->to('auth/login')->with('error', 'Silakan login untuk berdonasi.');
        }

        $data['session'] = $this->getSession();
        $data['title'] = 'Donasi';
        $data['midtrans_client_key'] = env('MIDTRANS_CLIENT_KEY');
        $data['id_kampanye'] = 1; // Ganti dengan ID kampanye yang sesuai
        $data['snapToken'] = '';

        echo view('user/template/head.php', $data);
        echo view('user/template/header.php', $data);
        echo view('user/vdonasi.php', $data);
        echo view('user/template/footer.php');
    }

   public function bayar()
    {
        $midtrans = new MidtransSnap();

        $params = [
            'transaction_details' => [
                'order_id' => uniqid(),
                'gross_amount' => 10000,
            ],
            'customer_details' => [
                'first_name' => 'Budi',
                'email' => 'budi@example.com',
            ],
        ];

        $data['snapToken'] = $midtrans->createSnapToken($params);
        $data['session'] = $this->getSession();
        $data['title'] = 'Donasi';
        $data['midtrans_client_key'] = env('MIDTRANS_CLIENT_KEY');
        $data['id_kampanye'] = 1; // Ganti dengan ID kampanye yang sesuai

        echo view('user/template/head.php', $data);
        echo view('user/template/header.php', $data);
        echo view('user/vdonasi.php', $data);
        echo view('user/template/footer.php');
    }
}
