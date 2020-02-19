<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
	private $_dosen 	=	"dosen";
	private $_admin		=	"admin";
	private $_siswa		=	"siswa";

	public function __construct()
	{
		parent::__construct();
		$this->load->model('login_model');
		$this->load->library('form_validation');
	}
	public function index()
	{
		redirect(base_url('loginsiswa'));
	}

	public function admin() // VIEW LOGIN ADMIN
	{
		if (($this->session->userdata('username'))) { // Jika ada session admin tidak boleh login lagi
			redirect(base_url('admin'));
		} elseif ($this->session->userdata('nidn_dosen')) {
			redirect(base_url('dosen'));
		} elseif ($this->session->userdata('nisn')) {
			redirect(base_url('siswa'));
		} else {
			$data['judul']	=	'Login Admin';
			$this->load->view('auth/header', $data);
			$this->load->view('auth/login_admin');
			$this->load->view('auth/footer');
		}
	}

	public function siswa() // VIEW LOGIN SISWA
	{
		if (($this->session->userdata('username'))) { // Jika ada session admin tidak boleh login lagi
			redirect(base_url('admin'));
		} elseif ($this->session->userdata('nidn_dosen')) {
			redirect(base_url('dosen'));
		} elseif ($this->session->userdata('nisn')) {
			redirect(base_url('siswa'));
		} else {
			$data['judul']	=	'Login Siswa';
			$this->load->view('auth/header', $data);
			$this->load->view('auth/login_siswa');
			$this->load->view('auth/footer');
		}
	}

	public function dosen() // VIEW LOGIN GURU
	{
		if (($this->session->userdata('username'))) { // Jika ada session admin tidak boleh login lagi
			redirect(base_url('admin'));
		} elseif ($this->session->userdata('nidn_dosen')) {
			redirect(base_url('dosen'));
		} elseif ($this->session->userdata('nisn')) {
			redirect(base_url('siswa'));
		} else {
			$data['judul']	=	'Login Dosen';
			$this->load->view('auth/header', $data);
			$this->load->view('auth/login_dosen');
			$this->load->view('auth/footer');
		}
	}

	public function login_admin()
	{
		$this->form_validation->set_rules('username', 'Username Admin', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->admin();
		} else {
			$username	=	$this->input->post('username');
			$password	=	$this->input->post('password');
			$where 		=	"username";
			$cek		= 	$this->login_model->cek_login($this->_admin, $where, $username, $password);

			if ($cek) { // jika username ada
				foreach ($cek as $row) {
					$this->session->set_userdata('username', $row->username);
					redirect(base_url("admin"));
				}
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger">
					username Password salah</div>');
				$this->admin();
			}
		}
	}

	public function login_dosen()
	{
		$this->form_validation->set_rules('nidn_dosen', 'NIDN Dosen', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->dosen();
		} else {
			$nidn_dosen	=	$this->input->post('nidn_dosen');
			$password	=	$this->input->post('password');
			//$cek		=	$this->db->get_where('dosen', ['nidn_dosen' => $nidn_dosen, 'password' => md5($password)])->row();
			$where		=	"nidn_dosen";
			$cek		= 	$this->login_model->cek_login($this->_dosen, $where, $nidn_dosen, $password);
			if ($cek) {
				// DATANYA ADA
				foreach ($cek as $row) {
					$this->session->set_userdata('nidn_dosen', $row->nidn_dosen);
					$this->session->set_userdata('nama_lengkap', $row->nama_lengkap);
					$this->session->set_userdata('asal_kota', $row->asal_kota);
					$this->session->set_userdata('tanggal_lahir', $row->tanggal_lahir);
					$this->session->set_userdata('jenis_kelamin', $row->jenis_kelamin);
					$this->session->set_userdata('no_telp', $row->no_telp);
					$this->session->set_userdata('alamat', $row->alamat);
					$this->session->set_userdata('foto', $row->foto);
					redirect(base_url("dosen")); // localhost/controllerSiswa
				}
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger">
					Nomor Induk Dosen / Password salah</div>');
				$this->dosen();
			}
		}
	}

	public function login_siswa()
	{
		$this->form_validation->set_rules('nisn', 'NISN Siswa', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->siswa();
		} else {
			$nisn		=	$this->input->post('nisn');
			$password	=	$this->input->post('password');
			$where 		=	"nisn";
			$cek		= 	$this->login_model->cek_login($this->_siswa, $where, $nisn, $password);
			if ($cek) {
				// DATANYA ADA
				foreach ($cek as $row) {
					$this->session->set_userdata('id_siswa', $row->idsiswa);
					$this->session->set_userdata('nisn', $row->nisn);
					$this->session->set_userdata('nama_siswa', $row->nama_siswa);
					$this->session->set_userdata('kota', $row->kota);
					$this->session->set_userdata('tanggal_lahir', $row->tanggal_lahir);
					$this->session->set_userdata('jenis_kelamin', $row->jenis_kelamin);
					$this->session->set_userdata('no_telp', $row->no_telp);
					$this->session->set_userdata('alamat', $row->alamat);
					$this->session->set_userdata('foto', $row->foto);
					redirect(base_url("siswa")); // localhost/controllerSiswa
				}
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger">
					Nomor Induk Siswa / Password salah</div>');
				$this->siswa();
			}
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url());
	}
}
