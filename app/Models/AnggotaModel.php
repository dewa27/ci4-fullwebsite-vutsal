<?php

namespace App\Models;

use CodeIgniter\Model;

class AnggotaModel extends Model
{
    protected $table      = 'tb_anggota';
    protected $primaryKey = 'anggota_id';

    protected $allowedFields = ['nama_anggota'];

    protected $useTimestamps = false;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    public function update_anggota($team_id, $data)
    {
        foreach ($data['nama_anggota'] as $index => $d) {
            $condition = array('anggota_id' => $data['id_anggota'][$index], 'team_id' => $team_id);
            $this->set('nama_anggota', $d);
            $this->where($condition);
            $this->update();
        }
    }
    public function tambah_anggota($team_id, $data)
    {
        foreach ($data as $index => $d) {
            $this->db->query("INSERT INTO tb_anggota (nama_anggota,team_id) VALUES ('$d','$team_id');");
        }
    }
}
