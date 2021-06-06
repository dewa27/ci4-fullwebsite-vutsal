<?php

namespace App\Controllers;

use App\Models\LoginModel;
use App\Controllers\Home;

class Login extends BaseController
{
    protected $loginModel;
    public function __construct()
    {
        helper('form');
        $this->loginModel = new LoginModel();
    }
    public function login_team()
    {
        if (!empty(session()->get('nama_team'))) {
            return redirect()->to(base_url());
        }
        $data = [
            'title' => 'Login Team',
        ];
        echo view('login_team', $data);
    }
    public function cek_login()
    {
        $email_team = $this->request->getPost('email_team');
        $password_team = $this->request->getPost('password_team');
        $cek = $this->loginModel->cek_login_team($email_team, $password_team);
        if (($email_team == "") && ($password_team == "")) {
            session()->setFlashdata('gagal', 'Email atau Password kosong');
            return redirect()->to(base_url('team-login'));
        } else {
            if (($cek['email_team'] == $email_team) && ($cek['password_team'] == $password_team)) {
                session()->set('email_team', $cek['email_team']);
                session()->set('nama_team', $cek['nama_team']);
                session()->set('team_id', $cek['team_id']);
                session()->setTempdata('berhasil', 'Anda berhasil login!', 5);
                return redirect()->to(base_url());
            } else {
                session()->setFlashdata('gagal', 'Email atau Password salah');
                return redirect()->to(base_url('team-login'));
            }
        }
    }
    public function logout()
    {
        session()->destroy();
        return redirect()->to(base_url());
    }
    public function login_arena()
    {
        if (!empty(session()->get('nama_arena'))) {
            return redirect()->to(base_url());
        }
        $data = [
            'title' => 'Login Arena',
        ];
        return view('login_arena', $data);
    }
    public function cek_login_arena()
    {
        $email_arena = $this->request->getPost('email_arena');
        $password_arena = $this->request->getPost('password_arena');
        $cek = $this->loginModel->cek_login_arena($email_arena, $password_arena);
        if (($email_arena == "") && ($password_arena == "")) {
            session()->setFlashdata('gagal', 'Email atau Password kosong');
            return redirect()->to(base_url('arena-login'));
        } else {
            if (($cek['email_arena'] == $email_arena) && ($cek['password_arena'] == $password_arena)) {
                session()->set('email_arena', $cek['email_arena']);
                session()->set('nama_arena', $cek['nama_arena']);
                session()->set('arena_id', $cek['arena_id']);
                session()->setTempdata('berhasil', 'Anda berhasil login!', 5);
                return redirect()->to(base_url());
            } else {
                session()->setFlashdata('gagal', 'Email atau Password salah');
                return redirect()->to(base_url('arena-login'));
            }
        }
    }
}
