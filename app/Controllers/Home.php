<?php

namespace App\Controllers;

class Home extends BaseController
{
	public function __construct()
	{
		helper('form');
	}
	public function index()
	{
		$data = [
			'title' => 'Vutsal | Reservasi Lapangan dan Cari Lawan',
		];
		echo view('index.php', $data);
	}
	public function kontak()
	{
		session();
		$data = [
			'title' => 'Kontak Kami',
			'validation' => \Config\Services::validation(),
		];
		return view('kontakkami', $data);
	}
	public function cek_kontak()
	{
		$db      = \Config\Database::connect();
		if (!$this->validate([
			'kritik_saran' => [
				'rules' => 'required|min_length[20]',
				'errors' => [
					'required' => 'Kritik dan Saran harus diisi',
					'min_length' => 'Kritik dan Saran minimal 20 karakter',
				],
			],
			'no_hp' => [
				'rules' => 'required|min_length[11]|numeric',
				'errors' => [
					'required' => 'Nomor Handphone harus diisi',
					'min_length' => 'Nomor Handphone tidak valid',
					'numeric' => 'Nomor Handphone hanya berupa angka',
				],
			],
			'email' => [
				'rules' => 'required|valid_email',
				'errors' => [
					'required' => 'Email harus diisi',
					'valid_email' => 'Masukkan alamat email yang valid',
				],
			],
		])) {
			$validation = \Config\Services::validation();
			return redirect()->to('/kontak')->withInput()->with('validation', $validation);
		} else {
			$email = $this->request->getPost('email');
			$no_hp = $this->request->getPost('no_hp');
			$kritik = $this->request->getPost('kritik_saran');
			$db->query("INSERT into tb_kritik_saran (email,no_hp,kritik_saran) VALUES ('$email','$no_hp','$kritik');");
			session()->setTempdata('berhasil', 'Kritik dan Saran anda telah kami terima !', 3);
			return redirect()->to('/kontak');
		}
	}
	//--------------------------------------------------------------------
}
