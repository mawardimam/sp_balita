<?php

namespace App\Models;

use CodeIgniter\Model;

class AdminModel extends Model
{
    protected $table = 'tb_user';
    protected $primaryKey = 'id_user';
    protected $allowedFields = ['username', 'password', 'nama'];

    public function validateLogin($username, $password)
    {
        $tb_user = $this->where('username', $username)
            ->where('password', $password)
            ->first();

        return $tb_user;
    }
}
