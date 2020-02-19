<?php

defined('BASEPATH') or exit('No direct script access allowed');
class Dosen extends CI_Controller
{
    public function __construct()
    {
		parent::__construct();
		$this->load->helper(array('form' , 'url')) ;
        $this->load->model("Model_siswa");
        $this->load->model("Dosen_model");
		$this->load->model('login_model');
        $this->load->model('Model_pengumuman');
        // if (!($this->session->userdata('nidn_dosen'))) {
        //     redirect(base_url('logindosen'));
		// }
		
    }

    public function index()
    {
        $data['judul'] = 'Selamat Datang Dosen' ;
        $data["pengumuman"] = $this->Model_pengumuman->getAll();
        $this->load->view('template_dosen/header');
        $this->load->view('template_dosen/sidebar');
        $this->load->view('dosen/home',$data);
        $this->load->view('template_dosen/footer');
    }
    public function biodata()
    {
		$data["dosen"] = $this->Dosen_model->getAll();
        $this->load->view('template_dosen/header');
        $this->load->view('template_dosen/sidebar');
        $this->load->view('dosen/biodata' , $data);
        $this->load->view('template_dosen/footer');
    }
    public function isinilai()
    {
        $this->load->view('template_dosen/header');
        $this->load->view('template_dosen/sidebar');
        $this->load->view('dosen/isinilai');
        $this->load->view('template_dosen/footer');
    }
    public function jadwal()
    {
        $this->load->view('template_dosen/header');
        $this->load->view('template_dosen/sidebar');
        $this->load->view('dosen/jadwal');
        $this->load->view('template_dosen/footer');
    }
    public function nilai()
    {
        $this->load->view('template_dosen/header');
        $this->load->view('template_dosen/sidebar');
        $this->load->view('dosen/nilai');
        $this->load->view('template_dosen/footer');
    }
    public function tambahnilai()
    {
        $this->load->view('template_dosen/header');
        $this->load->view('template_dosen/sidebar');
        $this->load->view('dosen/tambahnilai');
        $this->load->view('template_dosen/footer');
    }
    public function editbiodata()
    {
		$data["dosen"] = $this->Dosen_model->getAll() ;
        $this->load->view('template_dosen/header');
        $this->load->view('template_dosen/sidebar');
        $this->load->view('dosen/editbiodata' , $data ) ;
		$this->load->view('template_dosen/footer');
			// if (!$this->session->userdata('nidn_dosen')) {
			// 	redirect(site_url('logindosen'));
			// } else {
			// 	$data['id_dosen'] = $this->session->userdata('id_dosen');
			// }
			
			// $id = $this->uri->segment(3);
			// //$id = $this->input->post('id');
			
			// if (empty($id)) {
			// 	show_404();
			// }        
			
			// $this->load->helper('form');
			// $this->load->library('form_validation');
			
			// $data['title'] = 'Edit Profilemu';        
			// $data['DosenM'] = $this->Dosen_model->get_news_by_id($id);
			
			// if ($data['DosenM']['id_dosen'] != $this->session->userdata('id_dosen')) {
			// 	$currentClass = $this->router->fetch_class(); // class = controller
			// 	redirect(site_url($currentClass));
			// }
			
			// // $this->form_validation->set_rules('title', 'Title', 'required');
			// // $this->form_validation->set_rules('text', 'Text', 'required');
	 
			// if ($this->form_validation->run() === FALSE) {
			// 	$this->load->view('templates_dosen/header');
			// 	$this->load->view('templates_dosen/sidebar') ;
			// 	$this->load->view('dosen/editbiodata', $data);
			// 	$this->load->view('templates_dosen/footer');
				
			// } else {
			// 	$this->Dosen_model->set_news($id);
			// 	//$this->load->view('news/success');
			// 	redirect( site_url('dosen') );
			// }


		}
	public function updateProfile() {

		$id = $this->session->userdata('id_dosen');
        $data = array(
            'nidn_dosen' => $this->input->post('nidn_dosen'),
            'password' => $this->input->post('password'),
            'nama_lengkap' => $this->input->post('nama_lengkap'),
            'asal_kota' => $this->input->post('asal_kota'),
			'tanggal_lahir' => $this->input->post('tanggal_lahir'),
			'jenis_kelamin' => $this->input->post('jenis_kelamin'),
			'no_telp' => $this->input->post('no_telp'),
			'alamat' => $this->input->post('alamat'),
		);

		$result = $this->Dosen_model->updateProfile($data, $id_dosen);
		if ($result > 0) {
			$this->updateProfil();
			$this->session->set_flashdata('msg', show_succ_msg('Data Profile Berhasil diubah, silakan lakukan login ulang!'));
			redirect('dosen/biodata');
		} else {
			$this->session->set_flashdata('msg', show_err_msg('Data Profile Gagal diubah'));
			redirect('dosen/biodata');
	}

	}
    public function password()
    {
        $this->load->view('template_dosen/header');
        $this->load->view('template_dosen/sidebar');
        $this->load->view('dosen/password');
        $this->load->view('template_dosen/footer');
    }
    public function uploadnilai()
    {
        $this->load->view('template_dosen/header');
        $this->load->view('template_dosen/sidebar');
        $this->load->view('dosen/uploadnilai');
        $this->load->view('template_dosen/footer');
    }
}
