<?php

namespace App\Models;

use CodeIgniter\Model;

class ArenaModel extends Model
{
    protected $table      = 'tb_arena_futsal';
    protected $primaryKey = 'arena_id';

    protected $allowedFields = ['email_arena', 'password_arena', 'nama_arena', 'no_hp', 'deskripsi', 'foto_arena', 'alamat', 'lokasi_id'];

    protected $useTimestamps = false;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    public function all_arena()
    {
        $builder = $this->db->table('tb_arena_futsal');
        $query   = $builder->get();
        $result = $query->getResultArray();
        return json_encode($result);
    }
    public function getId($nama)
    {
        return $this->db->query("SELECT arena_id from tb_arena_futsal where nama_arena='$nama'")->getRowArray();
    }
    public function find_arena($keyword, $location, $price)
    {
        if ($keyword != NULL && $location == 0 && $price == 0) {
            $sql = "SELECT * FROM tb_arena_futsal WHERE nama_arena LIKE '$keyword%';";
        } else if ($keyword != NULL && $location != 0 && $price == 0) {
            $sql = "SELECT * FROM tb_arena_futsal WHERE lokasi_id =$location AND nama_arena LIKE '$keyword%' GROUP BY tb_arena_futsal.arena_id;";
        } else if ($keyword == NULL && $location != 0 && $price == 0) {
            $sql = "SELECT * FROM tb_arena_futsal JOIN tb_lapangan ON tb_arena_futsal.arena_id= tb_lapangan.arena_id WHERE lokasi_id =$location GROUP BY tb_arena_futsal.arena_id;";
        } else {
            $sql = "SELECT * FROM tb_arena_futsal;";
        }
        $result = $this->db->query($sql)->getResultArray();
        return json_encode($result);
    }
    public function detail_arena($nama_arena)
    {
        return $this->db->query("SELECT * FROM tb_arena_futsal WHERE nama_arena='$nama_arena';")->getRowArray();
    }
    public function detail_lapangan($nama_arena)
    {
        return $this->db->query("SELECT * FROM tb_lapangan JOIN tb_arena_futsal ON tb_lapangan.arena_id=tb_arena_futsal.arena_id WHERE nama_arena='$nama_arena';")->getResultArray();
    }
    public function ambil_profile_arena($arena_id)
    {
        return $this->db->query("SELECT * FROM tb_lapangan JOIN tb_arena_futsal ON tb_lapangan.arena_id=tb_arena_futsal.arena_id WHERE tb_arena_futsal.arena_id=$arena_id;")->getResultArray();
    }
    public function ambil_jadwal_arena($arena_id)
    {
        return $this->db->query("SELECT * FROM tb_jadwal JOIN tb_arena_futsal ON tb_jadwal.arena_id=tb_arena_futsal.arena_id WHERE tb_jadwal.arena_id='$arena_id';")->getResultArray();
    }
}
