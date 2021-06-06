<?php

namespace App\Models;

use CodeIgniter\Model;

class TeamModel extends Model
{
    protected $table      = 'tb_team';
    protected $primaryKey = 'team_id';

    protected $allowedFields = ['email_team', 'password_team', 'nama_team', 'no_hp', 'foto', 'deskripsi', 'lokasi_id'];

    protected $useTimestamps = false;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    // return $this->db->table('tb_arena_futsal')
    //     ->where(array('email_arena' => $email, 'password_arena' => $password, 'nama_arena' => $nama_arena, 'no_hp' => $no_hp))
    //     ->get()->getRowArray();
    public function ambil_anggota($team_id)
    {
        return $this->db->query("SELECT * FROM tb_anggota WHERE team_id=$team_id;")->getResultArray();
    }
    public function ambil_data_team($nama_team)
    {
        return $this->db->query("SELECT * FROM tb_team WHERE nama_team='$nama_team';")->getRowArray();
    }
    public function ambil_prestasi($team_id)
    {
        return $this->db->query("SELECT * FROM tb_prestasi WHERE team_id=$team_id;")->getResultArray();
    }
    public function ambil_profile_team($team_id)
    {
        return $this->db->query("SELECT * FROM tb_team WHERE team_id=$team_id;")->getRowArray();
    }
    public function insertData($data)
    {
        $email = $data['email_team'];
        $password = $data['password_team'];
        $nama = $data['nama_team'];
        $no_hp = $data['no_hp'];
        $deskripsi = $data['deskripsi'];
        $lokasi = $data['lokasi_id'];
        return $this->db->query("INSERT into tb_team (email_team,password_team,nama_team,no_hp,deskripsi,lokasi_id) VALUES ($email,$password,$nama,$no_hp,$deskripsi,$lokasi);");
    }
    public function getId($nama)
    {
        return $this->db->query("SELECT team_id from tb_team where nama_team='$nama'")->getRowArray();
    }
    public function find_team($keyword, $location)
    {
        if ($keyword != NULL && $location == 0) {
            $sql = "SELECT * FROM tb_team WHERE nama_team LIKE '$keyword%';";
        } else if ($keyword != NULL && $location != 0) {
            $sql = "SELECT * FROM tb_team WHERE lokasi_id =$location AND nama_team LIKE '$keyword%';";
        } else if ($keyword == NULL && $location != 0) {
            $sql = "SELECT * FROM tb_team WHERE lokasi_id =$location;";
        } else {
            $sql = "SELECT * FROM tb_arena_futsal;";
        }
        $result = $this->db->query($sql)->getResultArray();
        return json_encode($result);
    }
    // // public function update_prestasi($team_id, $data)
    // // {
    // //     foreach ($data as $index => $d) {
    // //         $this->db->query("UPDATE tb_prestasi (nama_turnamen,posisi,team_id,hadiah) VALUES ('$d','$team_id');");
    // //     }
    // // }
    // public function tambah_prestasi($team_id, $data)
    // {
    //     foreach ($data as $index => $d) {
    //         $this->db->query("INSERT into tb_prestasi (nama_turnamen,posisi,team_id,hadiah) VALUES ('$d','$team_id');");
    //     }
    // }
}
