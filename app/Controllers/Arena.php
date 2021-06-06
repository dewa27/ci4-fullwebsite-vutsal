<?php

namespace App\Controllers;

use App\Models\ArenaModel;
use App\Models\LapanganModel;
use App\Models\PesananModel;
use App\Models\JadwalModel;


class Arena extends BaseController
{
    protected $arenaModel;
    protected $lapanganModel;
    protected $pesananModel;
    protected $jadwalModel;
    public function __construct()
    {
        $this->arenaModel = new ArenaModel();
        $this->lapanganModel = new LapanganModel();
        $this->pesananModel = new PesananModel();
        $this->jadwalModel = new JadwalModel();
    }
    public function search_arena()
    {
        $data = [
            'title' => 'Reservasi Lapangan',
            'arenaArr' => $this->arenaModel->findAll(),
        ];
        echo view('search_arena', $data);
    }
    public function find_arena()
    {
        if ($this->request->isAJAX()) {
            $keyword = $this->request->getVar('keyword');
            $location = $this->request->getVar('location');
            $price = $this->request->getVar('price');
            $arena = $this->arenaModel->find_arena($keyword, $location, $price);
            return $arena;
        }
    }
    public function info_arena()
    {
        if (!empty(session()->get('nama_arena'))) {
            $email_arena = session()->get('email_arena');
            $nama_arena = session()->get('nama_arena');
            $data = [
                'title' => 'Arena',
                'arena' => $this->arenaModel->detail_arena($nama_arena),
                'lapangan' => $this->arenaModel->detail_lapangan($nama_arena),
                'jadwal' => $this->jadwalModel->detail_jadwal($nama_arena),
            ];
            return view('info_arena', $data);
        } else {
            return redirect()->to('/arena-login');
        }
    }
    // public function v_profile_arena()
    // {
    //     $arena_id = session()->get('arena_id');
    //     $nama_arena = session()->get('nama_arena');
    //     // $data_anggota = $this->teamModel->ambil_anggota($team_id);
    //     // $data_tim = $this->teamModel->ambil_data_team($nama_team);
    //     // $prestasi_tim = $this->teamModel->ambil_prestasi($team_id);
    //     $data = [
    //         'title' => 'Arena',
    //         // 'anggota' => $data_anggota,
    //         // 'tim' => $data_tim,
    //         // 'prestasi' => $prestasi_tim,
    //     ];
    //     return view('profile_arena', $data);
    // }
    public function edit_info()
    {
        if ($this->request->isAJAX()) {
            $arena_id = session()->get('arena_id');
            $nama_arena = $this->request->getVar('edit_nama_arena');
            $no_hp = $this->request->getVar('edit_kontak_arena');
            $email_arena = $this->request->getVar('edit_email_arena');
            $deskripsi_arena = $this->request->getVar('edit_deskripsi_arena');
            $alamat = $this->request->getVar('edit_alamat_arena');
            $data = [
                'nama_arena' => $nama_arena,
                'no_hp' => $no_hp,
                'email_arena' => $email_arena,
                'deskripsi' => $deskripsi_arena,
                'alamat' => $alamat,
            ];
            $this->arenaModel->update($arena_id, $data);
            session()->set('nama_arena', $nama_arena);
        }
    }
    public function edit_lapangan()
    {
        if ($this->request->isAJAX()) {
            $arena_id = session()->get('arena_id');
            $nama_lapangan = $this->request->getVar('nama_lapangan');
            $id_lapangan = $this->request->getVar('id_lapangan');
            $jenis_lapangan = $this->request->getVar('jenis_lapangan');
            $harga_lapangan = $this->request->getVar('harga_lapangan');
            $t_nama_lapangan = $this->request->getVar('tambah_nama_lapangan');
            $t_harga_lapangan = $this->request->getVar('tambah_harga_lapangan');
            $t_jenis_lapangan = $this->request->getVar('tambah_jenis_lapangan');
            $data = [
                'nama_lapangan' => $nama_lapangan,
                'id_lapangan' => $id_lapangan,
                'jenis_lapangan' => $jenis_lapangan,
                'harga_lapangan' => $harga_lapangan,
            ];
            $data_tambah = [
                'nama_lapangan' => $t_nama_lapangan,
                'jenis_lapangan' => $t_jenis_lapangan,
                'harga_lapangan' => $t_harga_lapangan,
            ];
            if ($nama_lapangan != null) {
                $this->lapanganModel->update_lapangan($arena_id, $data);
            }
            if ($t_nama_lapangan != null) {
                $this->lapanganModel->tambah_lapangan($arena_id, $data_tambah);
            }
        }
    }
    public function detail_arena($arena_id)
    {
        $team_id = session()->get('team_id');
        $detail_arena = $this->arenaModel->ambil_profile_arena($arena_id);
        $jadwal_arena = $this->arenaModel->ambil_jadwal_arena($arena_id);
        $data = [
            'title' => 'Arena',
            'arena' => $detail_arena,
            'jadwal_arena' => $jadwal_arena,
            'team_id' => $team_id,
        ];
        return view('profile_arena', $data);
    }
    public function get_harga_jadwal()
    {
        if ($this->request->isAJAX()) {
            $id_lapangan = $this->request->getVar('id');
            $data = $this->lapanganModel->ambil_harga_jadwal($id_lapangan);
            return json_encode($data);
        }
    }
    public function pesan_lapangan()
    {
        if ($this->request->isAJAX()) {
            $tanggal_main = $this->request->getVar('tanggal_main');
            $jam_book = $this->request->getVar('jam_book');
            $durasi = $this->request->getVar('durasi');
            $harga = $this->request->getVar('harga');
            $id_lapangan = $this->request->getVar('id_lap');
            $nama_team = session()->get('nama_team');
            $data = [
                'tanggal_main' => $tanggal_main,
                'jam_book' => $jam_book,
                'durasi' => $durasi,
                'harga' => $harga,
                'id_lapangan' => $id_lapangan,
            ];
            $this->pesananModel->tambah_pesanan($nama_team, $data);
        }
        return $data;
    }
    public function simpan_jadwal()
    {
        if ($this->request->isAJAX()) {
            $jadwalArr = $this->request->getVar('jadwalArr');
            $this->jadwalModel->update_jadwal($jadwalArr);
        }
    }
    public function view_pemesanan()
    {
        if (!empty(session()->get('nama_arena'))) {
            $email_arena = session()->get('email_arena');
            $nama_arena = session()->get('nama_arena');
            $data = [
                'title' => 'Pemesanan Lapangan',
                'lapangan' => $this->arenaModel->detail_lapangan($nama_arena),
                'jadwal' => $this->pesananModel->info_pesanan($nama_arena),
                'jadwal2' => $this->pesananModel->info_pesanan_fix($nama_arena),
            ];
            return view('pemesanan_arena', $data);
        } else {
            return redirect()->to('/arena-login');
        }
    }
    public function get_detail_pesanan()
    {
        if ($this->request->isAJAX()) {
            $id_pemesanan = $this->request->getVar('id');
            $detail_pesanan = $this->pesananModel->detail_pesanan($id_pemesanan);
        }
        return $detail_pesanan;
    }
    public function terima_pesanan()
    {
        if ($this->request->isAJAX()) {
            $id_pemesanan = $this->request->getVar('id');
            $this->pesananModel->terima_pesanan($id_pemesanan);
        }
    }
    public function tolak_pesanan()
    {
        if ($this->request->isAJAX()) {
            $id_pemesanan = $this->request->getVar('id');
            $this->pesananModel->tolak_pesanan($id_pemesanan);
        }
    }
    //--------------------------------------------------------------------
}
