<?php

namespace App\Models;

use CodeIgniter\Model;

class Muser extends Model
{
    protected $table            = 'users';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id', 'nama', 'email', 'password', 'role', 'foto'];

    public function getUser($username) {
        return $this->where('nama',$username)->first();
    }
}
