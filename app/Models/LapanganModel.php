<?php

namespace App\Models;

use CodeIgniter\Model;

class LapanganModel extends Model
{
    protected $table      = 'tb_lapangan';
    protected $primaryKey = 'lapangan_id';

    protected $allowedFields = ['nama_lapangan', 'jenis_lapangan', 'harga', 'arena_id'];

    protected $useTimestamps = false;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    public function update_lapangan($arena_id, $data)
    {
        foreach ($data['nama_lapangan'] as $index => $d) {
            $condition = array('lapangan_id' => $data['id_lapangan'][$index], 'arena_id' => $arena_id);
            $this->set('nama_lapangan', $d);
            $this->set('jenis_lapangan', $data['jenis_lapangan'][$index]);
            $this->set('harga', $data['harga_lapangan'][$index]);
            $this->where($condition);
            $this->update();
        }
    }
    public function ambil_harga_jadwal($lapangan_id)
    {
        $result_lapangan = $this->db->query("SELECT * from tb_lapangan where lapangan_id=$lapangan_id")->getRowArray();
        $result_arena = $this->db->query("SELECT * from tb_pemesanan where arena_id=" . $result_lapangan['arena_id'])->getResultArray();
        $data = [
            'lapangan' => $result_lapangan,
            'arena' => $result_arena,
        ];
        return $data;
    }
    public function tambah_lapangan($arena_id, $data)
    {
        foreach ($data['nama_lapangan'] as $index => $d) {
            $jenis = $data['jenis_lapangan'][$index];
            $harga = $data['harga_lapangan'][$index];
            $this->db->query("INSERT INTO tb_lapangan (nama_lapangan,jenis_lapangan,harga,arena_id) VALUES ('$d','$jenis',$harga,$arena_id);");
        }
    }
}
