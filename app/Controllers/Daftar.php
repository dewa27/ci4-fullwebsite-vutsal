<?php

namespace App\Controllers;


use App\Models\TeamModel;
use App\Models\ArenaModel;

class Daftar extends BaseController
{
    protected $arenaModel;
    protected $teamModel;
    public function __construct()
    {
        helper('form');
        $this->arenaModel = new ArenaModel();
        $this->teamModel = new TeamModel();
    }
    public function v_daftar_team()
    {
        session();
        $data = [
            'title' => 'Daftar Team',
            'validation' => \Config\Services::validation(),
        ];
        return view('regis_team', $data);
    }
    public function daftar_team()
    {
        if (!$this->validate([
            'nama_team' => [
                'rules' => 'required|min_length[3]|max_length[20]|is_unique[tb_team.nama_team]',
                'errors' => [
                    'required' => 'Nama Tim harus diisi',
                    'is_unique' => 'Nama Tim sudah ada',
                    'min_length' => 'Nama Tim terdiri dari minimal 3 huruf',
                    'max_length' => 'Nama Tim terdiri dari maksimal 20 huruf',
                ],
            ],
            'no_hp' => [
                'rules' => 'required|min_length[11]|is_unique[tb_team.no_hp]|numeric',
                'errors' => [
                    'required' => 'Nomor Handphone harus diisi',
                    'is_unique' => 'Nomor Handphone telah terdaftar',
                    'min_length' => 'Nomor Handphone tidak valid',
                    'numeric' => 'Nomor Handphone hanya berupa angka',
                ],
            ],
            'deskripsi' => [
                'rules' => 'required|min_length[50]',
                'errors' => [
                    'required' => 'Deskripsi tim harus diisi',
                    'min_length' => 'Deskripsi minimal 50 karakter',
                ],
            ],
            'lokasi' => [
                'rules' => 'required|greater_than[0]',
                'errors' => [
                    'required' => 'Lokasi team harus diisi',
                    'greater_than' => 'Harap isi lokasi team',
                ],
            ],
            'foto' => [
                'rules' => 'uploaded[foto]|is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'uploaded' => 'Foto harus diisi',
                    'is_image' => 'File yang anda pilih bukan gambar',
                    'mime_in' => 'File yang anda pilih bukan gambar',
                ],
            ],
            'email_team' => [
                'rules' => 'required|valid_email|is_unique[tb_team.email_team]',
                'errors' => [
                    'required' => 'Email harus diisi',
                    'is_unique' => 'Email telah terdaftar',
                    'valid_email' => 'Masukkan alamat email yang valid',
                ],
            ],
            'password_team' => [
                'rules' => 'required|min_length[4]|max_length[50]',
                'errors' => [
                    'required' => 'Password harus diisi',
                    'min_length' => 'Password minimal 4 karakter',
                ],
            ],
            're_password_team' => [
                'rules' => 'matches[password_team]',
                'errors' => [
                    'matches' => 'Password tidak sesuai'
                ],
            ],
        ])) {
            // $validation = \Config\Services::validation();
            // return redirect()->to('/team-daftar')->withInput()->with('validation', $validation);
            return redirect()->to('/team-daftar')->withInput();
        } else {
            $no_hp_mentah = $this->request->getPost('no_hp');
            if ($no_hp_mentah[0] == "0") {
                $no_hp = ltrim($no_hp_mentah, $no_hp_mentah[0]);
                $no_hp = "62" . $no_hp;
            }
            $file = $this->request->getFile('foto');
            $file->move('images');
            $nama_file = $file->getName();
            $data = array(
                'nama_team' => $this->request->getPost('nama_team'),
                'no_hp' => $no_hp,
                'foto' => $nama_file,
                'email_team' => $this->request->getPost('email_team'),
                'password_team' => $this->request->getPost('password_team'),
                'deskripsi' => $this->request->getPost('deskripsi'),
                'lokasi_id' => $this->request->getPost('lokasi'),
            );
            session()->set('email_team', $data['email_team']);
            session()->set('nama_team', $data['nama_team']);
            $this->teamModel->insert($data);
            $id = $this->teamModel->getId($data['nama_team']);
            session()->set('team_id', $id['team_id']);
            session()->setTempdata('berhasil', 'Akun anda telah terdaftar!', 5);
            return redirect()->to('/team-detail');
        }
    }
    public function v_daftar_arena()
    {
        session();
        $data = [
            'title' => 'Daftar Arena',
            'validation' => \Config\Services::validation(),
        ];
        return view('regis_arena', $data);
    }
    public function daftar_arena()
    {
        if (!$this->validate([
            'nama_arena' => [
                'rules' => 'required|min_length[3]|max_length[20]|is_unique[tb_arena_futsal.nama_arena]',
                'errors' => [
                    'required' => 'Nama Arena harus diisi',
                    'is_unique' => 'Nama Arena sudah ada',
                    'min_length' => 'Nama Arena terdiri dari minimal 3 huruf',
                    'max_length' => 'Nama Arena terdiri dari maksimal 20 huruf',
                ],
            ],
            'no_hp' => [
                'rules' => 'required|min_length[11]|is_unique[tb_arena_futsal.no_hp]|numeric',
                'errors' => [
                    'required' => 'Nomor Handphone harus diisi',
                    'is_unique' => 'Nomor Handphone telah terdaftar',
                    'min_length' => 'Nomor Handphone tidak valid',
                    'numeric' => 'Nomor Handphone hanya berupa angka',
                ],
            ],
            'email_arena' => [
                'rules' => 'required|valid_email|is_unique[tb_arena_futsal.email_arena]',
                'errors' => [
                    'required' => 'Email harus diisi',
                    'is_unique' => 'Email telah terdaftar',
                    'valid_email' => 'Masukkan alamat email yang valid',
                ],
            ],
            'deskripsi' => [
                'rules' => 'required|min_length[20]',
                'errors' => [
                    'required' => 'Deskripsi harus diisi',
                    'min_length' => 'Deskripsi minimal 20 karakter',
                ],
            ],
            'foto' => [
                'rules' => 'uploaded[foto]|is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'uploaded' => 'Foto harus diisi',
                    'is_image' => 'File yang anda pilih bukan gambar',
                    'mime_in' => 'File yang anda pilih bukan gambar',
                ],
            ],
            'lokasi' => [
                'rules' => 'required|greater_than[0]',
                'errors' => [
                    'required' => 'Lokasi arena harus diisi',
                    'greater_than' => 'Harap isi lokasi arena',
                ],
            ],
            'alamat' => [
                'rules' => 'required|min_length[10]',
                'errors' => [
                    'required' => 'Alamat harus diisi',
                ],
            ],
            'password_arena' => [
                'rules' => 'required|min_length[4]|max_length[50]',
                'errors' => [
                    'required' => 'Password harus diisi',
                    'min_length' => 'Password minimal 4 karakter',
                ],
            ],
            're_password_arena' => [
                'rules' => 'matches[password_arena]',
                'errors' => [
                    'matches' => 'Password tidak sesuai'
                ],
            ],
        ])) {
            // $validation = \Config\Services::validation();
            // return redirect()->to('/arena-daftar')->withInput()->with('validation', $validation);
            return redirect()->to('/arena-daftar')->withInput();
        } else {
            $file = $this->request->getFile('foto');
            $file->move('images');
            $nama_file = $file->getName();
            $no_hp_mentah = $this->request->getPost('no_hp');
            if ($no_hp_mentah[0] == "0") {
                $no_hp = ltrim($no_hp_mentah, $no_hp_mentah[0]);
                $no_hp = "62" . $no_hp;
            }
            $data = array(
                'nama_arena' => $this->request->getPost('nama_arena'),
                'no_hp' => $no_hp,
                'email_arena' => $this->request->getPost('email_arena'),
                'password_arena' => $this->request->getPost('password_arena'),
                'deskripsi' => $this->request->getPost('deskripsi'),
                'alamat' => $this->request->getPost('alamat'),
                'foto_arena' => $nama_file,
                'lokasi_id' => $this->request->getPost('lokasi'),
            );
            session()->set('email_arena', $data['email_arena']);
            session()->set('nama_arena', $data['nama_arena']);
            $this->arenaModel = new ArenaModel();
            $this->arenaModel->insert($data);
            $id = $this->arenaModel->getId($data['nama_arena']);
            session()->set('arena_id', $id['arena_id']);
            session()->setTempdata('berhasil', 'Akun anda telah terdaftar!', 5);
            return redirect()->to('/arena-detail');
        }
    }
}
