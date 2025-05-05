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

    public function getCurrentDana()
    {
        return $this->select('terkumpul, target_donasi')
                   ->orderBy('id', 'DESC')
                   ->first();
    }
    
    // Hitung persentase
    public function getPercentage()
    {
        $data = $this->getCurrentDana();
        if ($data && $data['target_donasi'] > 0) {
            return ($data['terkumpul'] / $data['target_donasi']) * 100;
        }
        return 0;
    }
    
}
