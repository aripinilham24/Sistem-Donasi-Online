<?php

namespace App\Models;

use CodeIgniter\Model;

class Mtransaksi extends Model
{
    protected $table            = 'donasi_transaksi';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id', 'kampanye_id', 'user_id', 'nama_donatur', 'nominal', 'pesan', 'dibuat_pada'];

    public function donatur_kampanye($id){
        return $this->select('donasi_transaksi.*, users.id, users.foto')
        ->join('users', 'users.id = donasi_transaksi.user_id')
        ->where('kampanye_id', $id)->findAll();
    }

    public function total_donatur($id) {
        return $this->where('kampanye_id', $id)->countAllResults();
    }
}
