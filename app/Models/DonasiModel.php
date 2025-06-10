<?php

namespace App\Models;

use CodeIgniter\Model;

class DonasiModel extends Model
{
    protected $table = 'donasi';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $protectFields = true;
    protected $allowedFields = ['order_id', 'status', 'jumlah', 'tanggal_pembayaran'];

    public function updateByOrderId($orderId, $data)
    {
        return $this->where('order_id', $orderId)->set($data)->update();
    }

}
