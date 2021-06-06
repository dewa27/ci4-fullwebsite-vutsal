<?php

namespace App\Controllers;

use App\Models\TeamModel;
use App\Models\AnggotaModel;
use App\Models\PesananModel;

class Team extends BaseController
{
    protected $teamModel;
    protected $anggotaModel;
    protected $pesananModel;
    public function __construct()
    {
        $this->teamModel = new TeamModel();
        $this->anggotaModel = new AnggotaModel();
        $this->pesananModel = new PesananModel();
    }
    public function detail_akun()
    {
        if (!empty(session()->get('nama_team'))) {
            $team_id = session()->get('team_id');
            $nama_team = session()->get('nama_team');
            $data_anggota = $this->teamModel->ambil_anggota($team_id);
            $data_tim = $this->teamModel->ambil_data_team($nama_team);
            $data_prestasi = $this->teamModel->ambil_prestasi($team_id);
            $data = [
                'title' => 'Team',
                'anggota' => $data_anggota,
                'tim' => $data_tim,
                'prestasi' => $data_prestasi,
            ];
            return view('info_team', $data);
        } else {
            return redirect()->to('/team-login');
        }
    }
    public function profile_team()
    {
        $team_id = session()->get('team_id');
        $nama_team = session()->get('nama_team');
        $data_anggota = $this->teamModel->ambil_anggota($team_id);
        $data_tim = $this->teamModel->ambil_data_team($nama_team);
        $prestasi_tim = $this->teamModel->ambil_prestasi($team_id);
        $data = [
            'title' => 'Team',
            'anggota' => $data_anggota,
            'tim' => $data_tim,
            'prestasi' => $prestasi_tim,
        ];
        return view('profile_team', $data);
    }
    public function edit_info()
    {
        if ($this->request->isAJAX()) {
            $team_id = session()->get('team_id');
            $nama_team = $this->request->getVar('edit_nama_team');
            $no_hp = $this->request->getVar('edit_kontak_team');
            $email_team = $this->request->getVar('edit_email_team');
            $deskripsi_team = $this->request->getVar('edit_deskripsi_team');
            $data = [
                'nama_team' => $nama_team,
                'no_hp' => $no_hp,
                'email_team' => $email_team,
                'deskripsi' => $deskripsi_team,
            ];
            $this->teamModel->update($team_id, $data);
            session()->set('nama_team', $nama_team);
        }
    }
    public function edit_anggota()
    {
        if ($this->request->isAJAX()) {
            $team_id = session()->get('team_id');
            $nama_anggota = $this->request->getVar('nama_anggota');
            $id_anggota = $this->request->getVar('id_anggota');
            $t_nama_anggota = $this->request->getVar('tambah_nama_anggota');
            $data = [
                'nama_anggota' => $nama_anggota,
                'id_anggota' => $id_anggota,
            ];
            if ($nama_anggota != null) {
                $this->anggotaModel->update_anggota($team_id, $data);
            }
            if ($t_nama_anggota != null) {
                $this->anggotaModel->tambah_anggota($team_id, $t_nama_anggota);
            }
        }
    }
    public function edit_prestasi()
    {
        if ($this->request->isAJAX()) {
            $team_id = session()->get('team_id');
            $nama_prestasi = $this->request->getVar('nama_prestasi');
            $posisi_prestasi = $this->request->getVar('posisi');
            $hadiah = $this->request->getVar('hadiah');
            $id_prestasi = $this->request->getVar('id_prestasi');
            $t_nama_prestasi = $this->request->getVar('tambah_nama_prestasi');
            $data = [
                'nama_prestasi' => $nama_prestasi,
                'id_prestasi' => $id_prestasi,
                'posisi' => $posisi_prestasi,
                'hadiah' => $hadiah,
            ];
            if ($nama_prestasi != null) {
                $this->teamModel->update_prestasi($team_id, $data);
            }
            $this->teamModel->tambah_prestasi($team_id, $data);
        }
    }
    public function view_pemesanan()
    {
        if (!empty(session()->get('nama_team'))) {
            $nama_team = session()->get('nama_team');
            $data = [
                'title' => 'Pemesanan Saya',
                'jadwal' => $this->pesananModel->t_info_pesanan($nama_team),
                'jadwal2' => $this->pesananModel->t_info_pesanan_fix($nama_team),
            ];
            return view('pemesanan_team', $data);
        } else {
            return redirect()->to('/team-login');
        }
    }
    public function search_lawan()
    {
        $team_id = session()->get('team_id');
        $data = [
            'title' => 'Cari Lawan',
            'teamArr' => $this->teamModel->findAll(),
        ];
        echo view('search_team', $data);
    }
    public function detail_team($team_id)
    {
        $data = [
            'title' => 'Profile Team',
            'tim' => $this->teamModel->ambil_profile_team($team_id),
            'anggota' => $this->teamModel->ambil_anggota($team_id),
            'prestasi' => $this->teamModel->ambil_prestasi($team_id),
        ];
        return view('profile_another_team', $data);
    }
    public function find_team()
    {
        if ($this->request->isAJAX()) {
            $keyword = $this->request->getVar('keyword');
            $location = $this->request->getVar('location');
            $arena = $this->teamModel->find_team($keyword, $location);
            return $arena;
        }
    }
    //--------------------------------------------------------------------
}
