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

    public function getAllWithPercentage()
    {
        $donations = $this->findAll();
        
        // Hitung persentase untuk setiap donasi
        foreach ($donations as &$donation) {
            $donation['persentase'] = $this->calculatePercentage(
                $donation['terkumpul'], 
                $donation['target_donasi']
            );
        }
        
        return $donations;
    }
    
    // Hitung persentase
    protected function calculatePercentage($terkumpul, $target)
    {
        if ($target > 0) {
            return ($terkumpul / $target) * 100;
        }
        return 0;
    }
    
}
