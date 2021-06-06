<?php

namespace App\Models;

use CodeIgniter\Model;

class PesananModel extends Model
{
    protected $table      = 'tb_pemesanan';
    protected $primaryKey = 'book_id';

    protected $allowedFields = ['tanggal_main', 'jam_main', 'durasi', 'tanggal_book', 'arena_id', 'lapangan_id', 'team_id', 'team_lawan_id'];

    protected $useTimestamps = false;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    public function tambah_pesanan($nama_team, $data)
    {
        date_default_timezone_set('Asia/Makassar');
        $id_lapangan = $data['id_lapangan'];
        $tanggal_main = $data['tanggal_main'];
        $tanggal_main = date("Y-m-d", strtotime($tanggal_main));
        $jam_book = $data['jam_book'];
        $durasi = $data['durasi'];
        $durasi = gmdate("H:i", 3600 * $durasi);
        $tanggal_book = date('Y-m-d H:i:s');
        $sql = "SELECT arena_id from tb_lapangan where lapangan_id=$id_lapangan";
        $result = $this->db->query($sql)->getResultArray();
        // var_dump($result);
        $arena_id = $result[0]['arena_id'];
        $hasil_query = $this->db->query("SELECT team_id from tb_team where nama_team='$nama_team'")->getRowArray();
        $team_id = $hasil_query['team_id'];
        var_dump($team_id);
        $sql = "INSERT into tb_pemesanan (tanggal_main,jam_main,durasi,tanggal_book,arena_id,lapangan_id,team_id) VALUE ('$tanggal_main','$jam_book','$durasi','$tanggal_book',$arena_id,$id_lapangan,$team_id);";
        $hasil = $this->db->query($sql);
    }
    public function info_pesanan($nama_arena)
    {
        return $this->db->query("SELECT * from tb_pemesanan join tb_arena_futsal ON tb_pemesanan.arena_id=tb_arena_futsal.arena_id JOIN tb_lapangan ON tb_pemesanan.lapangan_id=tb_lapangan.lapangan_id JOIN tb_team ON tb_pemesanan.team_id=tb_team.team_id join tb_konfirmasi ON tb_konfirmasi.book_id=tb_pemesanan.book_id where nama_arena='$nama_arena' and status_arena='Menunggu' ORDER BY tanggal_book ASC")->getResultArray();
    }
    public function info_pesanan_fix($nama_arena)
    {
        return $this->db->query("SELECT * from tb_pemesanan join tb_arena_futsal ON tb_pemesanan.arena_id=tb_arena_futsal.arena_id JOIN tb_lapangan ON tb_pemesanan.lapangan_id=tb_lapangan.lapangan_id JOIN tb_team ON tb_pemesanan.team_id=tb_team.team_id join tb_konfirmasi ON tb_konfirmasi.book_id=tb_pemesanan.book_id where nama_arena='$nama_arena' and status_arena='Setuju' ORDER BY tanggal_book ASC")->getResultArray();
    }
    public function detail_pesanan($id_pemesanan)
    {
        $hasil = $this->db->query("SELECT * from tb_pemesanan JOIN tb_lapangan ON tb_pemesanan.lapangan_id=tb_lapangan.lapangan_id JOIN tb_team ON tb_pemesanan.team_id=tb_team.team_id where book_id=$id_pemesanan")->getRowArray();
        return json_encode($hasil);
    }
    public function terima_pesanan($id_pemesanan)
    {
        $this->db->query("UPDATE tb_konfirmasi set status_arena='Setuju' where book_id=$id_pemesanan");
    }
    public function tolak_pesanan($id_pemesanan)
    {
        $this->db->query("UPDATE tb_konfirmasi set status_arena='Batal' where book_id=$id_pemesanan");
    }
    public function t_info_pesanan($nama_team)
    {
        return $this->db->query("SELECT * from tb_pemesanan join tb_arena_futsal ON tb_pemesanan.arena_id=tb_arena_futsal.arena_id JOIN tb_lapangan ON tb_pemesanan.lapangan_id=tb_lapangan.lapangan_id JOIN tb_team ON tb_pemesanan.team_id=tb_team.team_id join tb_konfirmasi ON tb_konfirmasi.book_id=tb_pemesanan.book_id where nama_team='$nama_team' and status_arena='Menunggu' ORDER BY tanggal_book ASC")->getResultArray();
    }
    public function t_info_pesanan_fix($nama_team)
    {
        return $this->db->query("SELECT * from tb_pemesanan join tb_arena_futsal ON tb_pemesanan.arena_id=tb_arena_futsal.arena_id JOIN tb_lapangan ON tb_pemesanan.lapangan_id=tb_lapangan.lapangan_id JOIN tb_team ON tb_pemesanan.team_id=tb_team.team_id join tb_konfirmasi ON tb_konfirmasi.book_id=tb_pemesanan.book_id where nama_team='$nama_team' and status_arena='Setuju' ORDER BY tanggal_book ASC")->getResultArray();
    }
}
