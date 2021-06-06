<?php

namespace App\Models;

use CodeIgniter\Model;

class JadwalModel extends Model
{
    protected $table      = 'tb_jadwal';
    protected $primaryKey = 'jadwal_id';

    protected $allowedFields = ['hari', 'jam_mulai', 'jam_selesai', 'arena_id'];

    protected $useTimestamps = false;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    public function detail_jadwal($nama_arena)
    {
        return $this->db->query("SELECT * from tb_jadwal join tb_arena_futsal ON tb_jadwal.arena_id=tb_arena_futsal.arena_id where nama_arena='$nama_arena'")->getResultArray();
    }
    public function update_jadwal($array)
    {
        foreach ($array as $i => $row) {
            if ($row[1] == null && $row[2] == null) {
                $this->db->query("UPDATE tb_jadwal SET jam_mulai=null, jam_selesai=null where jadwal_id=$row[0]");
            } else {
                $this->db->query("UPDATE tb_jadwal SET jam_mulai='" . $row[1] . "', jam_selesai='" . $row[2] . "' where jadwal_id=$row[0]");
            }
        }
    }
}
