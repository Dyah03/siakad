<?php defined('BASEPATH') or exit('No direct script access allowed');

class Model_sp extends CI_Model
{
    private $_table = "sp";
    public $id_sp;
    public $id_siswa;
    public $id_kelas;
    public $id_bulan;
    public $id_semester;
    public $id_tahun_ajaran;
    public $status;

    public function rules()
    {
        return [
            [
            ]
        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }

    public function getById($id_sp)
    {
        return $this->db->get_where($this->_table, ["id_sp" => $id_sp])->row();
    }

    public function update()
    {
        $post = $this->input->post();
        // var_dump($post);
        $this->id_sp = $post["id_sp"];
        $this->id_siswa =$post["id_siswa"];
        $this->id_kelas =$post["id_kelas"];
        $this->id_bulan =$post["id_bulan"];
        $this->id_semester =$post["id_semester"];
        $this->id_tahun_ajaran =$post["id_tahun_ajaran"];
        $this->status = $post["status"];

        $this->db->update($this->_table, $this, array("id_sp" => $post["id_sp"]));
    }

    public function save()
    {
        $post = $this->input->post();
        // var_dump($post);
        // $this->id_spp = $post["id_spp"];
        $this->id_siswa =$post["id_siswa"];
        $this->id_kelas =$post["id_kelas"];
        $this->id_bulan =$post["id_bulan"];
        $this->id_semester =$post["id_semester"];
        $this->id_tahun_ajaran =$post["id_tahun_ajaran"];
        $this->status = $post["status"];

        $this->db->insert($this->_table, $this);
    }

    
}
