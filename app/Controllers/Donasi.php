<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Libraries\MidtransSnap;

class Donasi extends BaseController
{

    public function index($id)
    {

        if (!session()->get('id')) {
            return redirect()->to('auth/login')->with('error', 'Silakan login untuk berdonasi.');
        }

        $midtrans = new MidtransSnap();

        $nama = $this->request->getPost('nama');
        $email = $this->request->getPost('email');
        $jumlah = $this->request->getPost('donasi');
        $pesan = $this->request->getPost('pesan');

        $params = [
            'transaction_details' => [
                'order_id' => uniqid(),
                'gross_amount' => $jumlah,
                'id_kmpanye' => $id, 
            ],
            'customer_details' => [
                'name' => $nama,
                'email' => $email,
                'pesan' => $pesan,
            ],
        ];

        $data['session'] = $this->getSession();
        $data['title'] = 'Donasi';
        $data['midtrans_client_key'] = env('MIDTRANS_CLIENT_KEY');
        $data['id_kampanye'] = $id; 
        $data['snapToken'] = $midtrans->createSnapToken($params);
        $data['detail_donasi'] = [
            'nama' => $nama,
            'email' => $email,
            'jumlah' => $jumlah,
            'pesan' => $pesan,
        ];


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
