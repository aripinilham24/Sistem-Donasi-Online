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

        $order_id = uniqid('DONASI-');

        // Simpan data ke database
        $donasiModel = new \App\Models\DonasiModel();
        $donasiModel->insert([
            'order_id' => $order_id,
            'id_kampanye' => $id,
            'nama' => $nama,
            'email' => $email,
            'pesan' => $pesan,
            'jumlah' => $jumlah,
            'status' => 'Menunggu',
        ]);

        // Siapkan parameter Midtrans
        $params = [
            'transaction_details' => [
                'order_id' => $order_id,
                'gross_amount' => $jumlah,
            ],
            'customer_details' => [
                'first_name' => $nama,
                'email' => $email,
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

    public function callback()
    {
        // Ambil payload notifikasi
        $json_result = file_get_contents('php://input');
        $result = json_decode($json_result);

        // Cek status pembayaran dari Midtrans
        if ($result->transaction_status == 'settlement') {
            $orderId = $result->order_id;
            $grossAmount = $result->gross_amount;

            // Update status donasi berdasarkan order_id
            $donasiModel = new \App\Models\DonasiModel();
            $donasiModel->updateByOrderId($orderId, [
                'status' => 'Sukses',
                'jumlah' => $grossAmount,
                'tanggal_pembayaran' => date('Y-m-d H:i:s'),
            ]);

            // Optional: log transaksi sukses
            log_message('info', 'Donasi berhasil: ' . $orderId);
        }

        // Return response ke Midtrans
        return $this->response->setStatusCode(200)->setBody('OK');
    }

}
