<?php defined('BASEPATH') or exit('No direct script access allowed');

class Model_matkul extends CI_Model
{
    private $_table = "matkul";
    public $id_matkul;
    public $nama_matkul;

    public function rules()
    {
        return [
            [
                'field' => 'nama_matkul',
                'label' => 'nama_matkul',
                'rules' => 'required'
            ]
        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }

    public function getById($id_matkul)
    {
        return $this->db->get_where($this->_table, ["id_matkul" => $id_matkul])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        // $this->id_matkul = $post["id_matkul"];
        $this->nama_matkul = $post["nama_matkul"];
        
        $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        //  var_dump($post);
        $this->id_matkul = $post["id_matkul"];
        $this->nama_matkul = $post["nama_matkul"];
        
        $this->db->update($this->_table, $this, array("id_matkul" => $post["id_matkul"]));
    }

    public function delete($id_matkul)
    {
        return $this->db->delete($this->_table, array("id_matkul" => $id_matkul));
    }

}
