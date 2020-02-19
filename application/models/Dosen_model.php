<?php defined('BASEPATH') or exit('No direct script access allowed');

class Dosen_model extends CI_Model
{

	private $_table = "dosen";
	public 	$id_dosen, $nidn_dosen, $password, $nama_lengkap,
		$asal_kota,	$tanggal_lahir,	$jenis_kelamin,
		$no_telp, $alamat, $foto = "default.jpg";


	public function rules()
	{
		return [
			[
				'field' => 'nidn_dosen',
				'label' => 'Nomor Induk Dosen',
				'rules' => 'required'
			],

			[
				'field' => 'nama_lengkap',
				'label' => 'Nama Lengkap',
				'rules' => 'required'
			],

			['field' => 'tanggal_lahir' ,
			'label' => 'Tanggal Lahir' ,
			'rules' => 'required']
			] ;
	}

	public function getAll()
	{
		return $this->db->get($this->_table)->result();
	}

	public function getById($id_dosen)
	{
		return $this->db->get_where($this->_table, ["id_dosen" => $id_dosen])->row();
	}

	public function save()
	{
		$post = $this->input->post();
		// var_dump($post);

		$this->nidn_dosen = $post["nidn_dosen"];
		$this->nama_lengkap = $post["nama_lengkap"];
		$this->tanggal_lahir = $post["tanggal_lahir"];
		$this->asal_kota = $post["asal_kota"];
		$this->alamat = $post["alamat"];
		$this->no_telp = $post["no_telp"];
		
		if (empty($post["password"])){
            $this->password =md5($post["nidn_dosen"]);
        } else {
            $this->password=md5($post["password"]) ;
        }

		$this->jenis_kelamin = $post["jenis_kelamin"];
		$this->foto = $this->_uploadImage();

		$this->db->insert($this->_table, $this);
	}

	public function update()
	{
		$post = $this->input->post();
		// var_dump($post);
		$this->id_dosen = $post["id_dosen"];
		$this->nidn_dosen = $post["nidn_dosen"];
		$this->nama_lengkap = $post["nama_lengkap"];
		$this->tanggal_lahir = $post["tanggal_lahir"];
		$this->asal_kota = $post["asal_kota"];
		$this->alamat = $post["alamat"];
		$this->no_telp = $post["no_telp"];
		$this->jenis_kelamin = $post["jenis_kelamin"];

		if (empty($post["password"])){
            $this->password =md5($post["nidn_dosen"]);
        } else {
            $this->password=md5($post["password"]) ;
        }


		if (!empty($_FILES["foto"]["name"])) {
			$this->foto = $this->_uploadImage();
		} else {
			$this->foto = $post["old_image"];
		}

		$this->db->update($this->_table, $this, array("id_dosen" => $post["id_dosen"]));
	}

	public function updateProfile() {
		$this->db->where($this->id_dosen, $id_dosen);
        $this->db->update($this->table, $data);
        return $this->db->affected_rows();
	}

	public function delete($id_dosen)
	{
		$this->_deleteImage($id_dosen);
		return $this->db->delete($this->_table, array("id_dosen" => $id_dosen));
	}

	private function _uploadImage()
	{
		$config['upload_path']          = './foto/dosen';
		$config['allowed_types']        = 'gif|jpg|png';
		$config['file_name']            = $this->nama_lengkap;
		$config['overwrite']            = true;
		$config['max_size']             = 1024; // 1MB
		// $config['max_width']            = 1024;
		// $config['max_height']           = 768;

		$this->load->library('upload', $config);

		if ($this->upload->do_upload('foto')) {
			return $this->upload->data("file_name");
		}

		return "default.jpg";
	}

	private function _deleteImage($id_dosen)
	{
		$img = $this->getById($id_dosen);
		if ($img->foto != "default.jpg") {
			$filename = explode(".", $img->foto)[0];
			return array_map('unlink', glob(FCPATH . "foto/dosen/$filename.*"));
		}
	}
}

