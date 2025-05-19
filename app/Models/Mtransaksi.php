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

}
