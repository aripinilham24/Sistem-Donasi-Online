<?php

namespace App\Models;

use CodeIgniter\Model;

class Mdonasi extends Model
{
    protected $table            = 'donasi_kampanye';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id', 'judul', 'deskripsi', 'target_donasi', 'terkumpul', 'deadline', 'gambar', 'dibuat_pada'];

    
}
