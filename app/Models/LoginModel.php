<?php

namespace App\Models;

use CodeIgniter\Model;

class LoginModel extends Model
{
    public function cek_login_team($email, $password)
    {
        return $this->db->table('tb_team')
            ->where(array('email_team' => $email, 'password_team' => $password))
            ->get()->getRowArray();
    }
    public function cek_login_arena($email, $password)
    {
        return $this->db->table('tb_arena_futsal')
            ->where(array('email_arena' => $email, 'password_arena' => $password))
            ->get()->getRowArray();
    }
}
