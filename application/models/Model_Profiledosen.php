<?php defined('BASEPATH') or exit('No direct script access allowed');

class Model_Profiledosen extends CI_Model {


public function update($data, $id_dosen)
    {
        $this->db->where($this->id, $id_dosen);
        $this->db->update($this->table, $data);
        return $this->db->affected_rows();
    }

    public function get_by_id($id_dosen)
    {
        $this->db->select('dosen');
        $this->db->where($this->id, $id_dosen);
        $query = $this->db->get();
        return $query->row();
    }

}

