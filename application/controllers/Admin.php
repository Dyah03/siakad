<?php

class Admin extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->model('login_model');
        $this->load->library('form_validation');

        //CRUD SISWA
        $this->load->model("Model_siswa");

        //CRUD PEGAWAI
        $this->load->model("Pegawai_model");

        //CRUD PENGUMUMAN
        $this->load->model("Model_pengumuman");

        //CRUD GURU
        $this->load->model("Dosen_model");

        //CRUD MATKUL
        $this->load->model("Model_matkul");

        //CRUD JURUSAN
        $this->load->model("Model_jurusan");

        //CRUD KELAS
        $this->load->model("Model_kelas");

        //CRUD TAHUN AJARAN
        $this->load->model("Model_thnAjar");

        //CRUD SPP
        $this->load->model("Model_spp");

        //CRUD SP
        $this->load->model("Model_sp");

        //CRUD JADWAL
        $this->load->model("Model_jadwal");


        if (!($this->session->userdata('username'))) {
            redirect(base_url('loginadmin'));
            // redirect($this->index());
        }
    }

    // ----------------------------FRONT END-------------------------------------------------
    // ----------------------------VIEW-------------------------------------------------------

    public function index() // HALAMAN SEBELUM ADA SESSION
    {
        $data['judul'] = "Wellcome To Administrator";
        $data["pengumuman"] = $this->Model_pengumuman->getAll();
        $this->load->view('template_admin/header', $data);
        $this->load->view('template_admin/sidebar');
        $this->load->view('admin/dashboard');

        $this->load->view('template_admin/footer');
    }
    public function pengumuman()
    {
        $this->load->view('template_admin/header');
        $this->load->view('template_admin/sidebar');
        $this->load->view('admin/pengumuman');
        $this->load->view('template_admin/footer');
    }

    public function nilaisiswaipa()
    {
        $this->load->view('template_admin/header');
        $this->load->view('template_admin/sidebar');
        $this->load->view('admin/nilaisiswaipa');
        $this->load->view('template_admin/footer');
    }
     /////////////////////////// SPP///////////////////////
    public function daftarsiswaspp()
    {
        $data['sp'] = $this->Model_spp->getAll();
        $this->load->view('template_admin/header');
        $this->load->view('template_admin/sidebar');
        $this->load->view('admin/daftarsiswaspp', $data);
        $this->load->view('template_admin/footer');
    }

    public function addsppsiswa(){
        $this->load->view('template_admin/header');
        $this->load->view('template_admin/sidebar');
        $this->load->view('admin/addsppsiswa');
        $this->load->view('template_admin/footer');
    }
    public function addformspp(){
        $data['judul'] = "Halaman Tambah Siswa";
        $data['spp'] = $this->Model_spp->getAll();
        $data['siswa'] = $this->Model_siswa->getAll();
        $data['tahun_ajaran'] = $this->Model_thnAjar->getAll();
        $data['kelas'] = $this->Model_kelas->getAll();
        $data["jurusan"] = $this->Model_jurusan->getAll();
        $this->load->view('template_admin/header');
        $this->load->view('template_admin/sidebar');
        $this->load->view('admin/addformspp',$data);
        $this->load->view('template_admin/footer');
    }
    public function editspp()
    {
        $data["spp"] = $this->Model_spp->getAll();
        $this->load->view('template_admin/header', $data);
        $this->load->view('template_admin/sidebar');
        $this->load->view('admin/editspp', $data);
        $this->load->view('template_admin/footer');
    }
    ////////////////////// SP //////////////////////////////
    public function daftarsiswasp()
    {
        $data['sp'] = $this->Model_sp->getAll();
        $this->load->view('template_admin/header');
        $this->load->view('template_admin/sidebar');
        $this->load->view('admin/daftarsiswasp', $data);
        $this->load->view('template_admin/footer');
    }
    public function addspsiswa(){
        $this->load->view('template_admin/header');
        $this->load->view('template_admin/sidebar');
        $this->load->view('admin/addspsiswa');
        $this->load->view('template_admin/footer');
    }
    public function addformsp(){
        $data['judul'] = "Halaman Tambah Siswa";
        $data['sp'] = $this->Model_sp->getAll();
        $data['siswa'] = $this->Model_siswa->getAll();
        $data['tahun_ajaran'] = $this->Model_thnAjar->getAll();
        $data['kelas'] = $this->Model_kelas->getAll();
        $data["jurusan"] = $this->Model_jurusan->getAll();
        $this->load->view('template_admin/header');
        $this->load->view('template_admin/sidebar');
        $this->load->view('admin/addformsp',$data);
        $this->load->view('template_admin/footer');
    }
    public function editsp()
    {
        $data["sp"] = $this->Model_sp->getAll();
        $this->load->view('template_admin/header', $data);
        $this->load->view('template_admin/sidebar');
        $this->load->view('admin/editsp', $data);
        $this->load->view('template_admin/footer');
    }



    public function nilaisiswaips()
    {
        $this->load->view('template_admin/header');
        $this->load->view('template_admin/sidebar');
        $this->load->view('admin/nilaisiswaips');
        $this->load->view('template_admin/footer');
    }
    public function statusspp()
    {
        $this->load->view('template_admin/header');
        $this->load->view('template_admin/sidebar');
        $this->load->view('admin/statusspp');
        $this->load->view('template_admin/footer');
    }
    public function listdosen()
    {
        $data["dosen"] = $this->Dosen_model->getAll();
        $this->load->view('template_admin/header');
        $this->load->view('template_admin/sidebar');
        $this->load->view('admin/listdosen', $data);
        $this->load->view('template_admin/footer');
    }
    public function listsiswa()
    {
        $data['siswa'] = $this->Model_siswa->getAll();
        $this->load->view('template_admin/header');
        $this->load->view('template_admin/sidebar');
        $this->load->view('admin/listsiswa', $data);
        $this->load->view('template_admin/footer');
    }

    public function listpegawai()
    {
        $data["admin"] = $this->Pegawai_model->getAll();
        $this->load->view('template_admin/header');
        $this->load->view('template_admin/sidebar');
        $this->load->view('admin/listpegawai', $data);
        $this->load->view('template_admin/footer');
    }
    public function listpengumuman()
    {
        $data["pengumuman"] = $this->Model_pengumuman->getAll();
        $this->load->view('template_admin/header');
        $this->load->view('template_admin/sidebar');
        $this->load->view('admin/listpengumuman', $data);
        $this->load->view('template_admin/footer');
    }

    public function listkelas()
    {
        $data["kelas"] = $this->Model_kelas->getAll();
        $this->load->view('template_admin/header');
        $this->load->view('template_admin/sidebar');
        $this->load->view('admin/listkelas', $data);
        $this->load->view('template_admin/footer');
    }

    public function listjurusan()
    {
        $data["jurusan"] = $this->Model_jurusan->getAll();
        $this->load->view('template_admin/header');
        $this->load->view('template_admin/sidebar');
        $this->load->view('admin/listjurusan', $data);
        $this->load->view('template_admin/footer');
    }

    public function listmatkul()
    {
        $data["matkul"] = $this->Model_matkul->getAll();
        $this->load->view('template_admin/header');
        $this->load->view('template_admin/sidebar');
        $this->load->view('admin/listmatkul', $data);
        $this->load->view('template_admin/footer');
    }

    public function listtahun()
    {
        $data["tahun_ajaran"] = $this->Model_thnAjar->getAll();
        $this->load->view('template_admin/header');
        $this->load->view('template_admin/sidebar');
        $this->load->view('admin/listtahun', $data);
        $this->load->view('template_admin/footer');
    }

    public function adddosen()
    {
        $data['judul'] = "Halaman Tambah Dosen";
        $this->load->view('template_admin/header');
        $this->load->view('template_admin/sidebar');
        $this->load->view('admin/adddosen');
        $this->load->view('template_admin/footer');
    }

    public function addsiswa()
    {
        $data['judul'] = "Halaman Tambah Siswa";
        $data['kelas'] = $this->Model_kelas->getAll();
        $data["jurusan"] = $this->Model_jurusan->getAll();
        $this->load->view('template_admin/header', $data);
        $this->load->view('template_admin/sidebar');
        $this->load->view('admin/addsiswa', $data);
        $this->load->view('template_admin/footer');
    }
    public function addpegawai(){
        $data['judul'] = "Halaman Tambah Pegawai";
        $this->load->view('template_admin/header',$data);
        $this->load->view('template_admin/sidebar');
        $this->load->view('admin/addpegawai');
        $this->load->view('template_admin/footer');
    }
    public function editdosen()
    {
        $this->load->view('template_admin/header');
        $this->load->view('template_admin/sidebar');
        $this->load->view('admin/editdosen');
        $this->load->view('template_admin/footer');
    }
    public function editpegawai()
    {
        $this->load->view('template_admin/header');
        $this->load->view('template_admin/sidebar');
        $this->load->view('admin/editpegawai');
        $this->load->view('template_admin/footer');
    }
    public function uploadjadwal()
    {
        $data["kelas"] = $this->Model_kelas->getAll();
        $data["jurusan"] = $this->Model_jurusan->getAll();
        $data["jadwal"] = $this->Model_jadwal->getAll();
        $this->load->view('template_admin/header');
        $this->load->view('template_admin/sidebar');
        $this->load->view('admin/jadwal', $data);
        $this->load->view('template_admin/footer');
    }

    public function editjadwal()
    {
        $data["kelas"] = $this->Model_kelas->getAll();
        $data["jurusan"] = $this->Model_jurusan->getAll();
        $data["jadwal"] = $this->Model_jadwal->getAll();
        $this->load->view('template_admin/header');
        $this->load->view('template_admin/sidebar');
        $this->load->view('admin/editjadwal', $data);
        $this->load->view('template_admin/footer');
    }

    public function addjurusan()
    {
        $this->load->view('template_admin/header');
        $this->load->view('template_admin/sidebar');
        $this->load->view('admin/addjurusan');
        $this->load->view('template_admin/footer');
    }

    public function addmatkul()
    {
        $this->load->view('template_admin/header');
        $this->load->view('template_admin/sidebar');
        $this->load->view('admin/addmatkul');
        $this->load->view('template_admin/footer');
    }

    public function addtahun()
    {
        $this->load->view('template_admin/header');
        $this->load->view('template_admin/sidebar');
        $this->load->view('admin/addtahun');
        $this->load->view('template_admin/footer');
    }

    public function addkelas()
    {
        $data["jurusan"] = $this->Model_jurusan->getAll();
        $this->load->view('template_admin/header', $data);
        $this->load->view('template_admin/sidebar');
        $this->load->view('admin/addkelas', $data);
        $this->load->view('template_admin/footer');
    }


    // public function editSpSiswa()
    // {
    //     $data["spp"] = $this->Model_sp->getAll();
    //     $this->load->view('template_admin/header', $data);
    //     $this->load->view('template_admin/sidebar');
    //     $this->load->view('admin/editSpSiswa', $data);
    //     $this->load->view('template_admin/footer');
    // }




    // ----------------------------BACK END--------------------------------------------------
    // ----------------------------CRUD SISWA------------------------------------------------

    public function dataSiswa()
    {
        $data["siswa"] = $this->Model_siswa->getAll();
        $this->load->view("template_admin/header");
        $this->load->view("template_admin/sidebar");
        $this->load->view("admin/listsiswa", $data);
        $this->load->view("template_admin/footer");
    }



    public function siswaAdd()
    {
        $tambah = $this->Model_siswa;
        $validation = $this->form_validation;
        $validation->set_rules($tambah->rules());

        if ($validation->run()) {
            $tambah->save();
            // $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["siswa"] = $this->Model_siswa->getAll();
        $this->load->view("template_admin/header");
        $this->load->view("template_admin/sidebar");
        $this->load->view("admin/listsiswa", $data);
        $this->load->view("template_admin/footer");
    }

    public function siswaEdit($id_siswa = null)
    {
        // var_dump($id);
        if (!isset($id_siswa)) redirect('c_siswa');


        $var = $this->Model_siswa;
        $validation = $this->form_validation;
        $validation->set_rules($var->rules());

        if ($validation->run()) {
            $var->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }
        $data["kelas"] = $this->Model_kelas->getAll();
        $data["jurusan"] = $this->Model_jurusan->getAll();
        $data["siswa"] = $var->getById($id_siswa);
        if (!$data["siswa"]) show_404();
        $this->load->view("template_admin/header");
        $this->load->view("template_admin/sidebar");
        $this->load->view("admin/editsiswa", $data);
        $this->load->view("template_admin/footer");
    }

    public function siswaPass($id_siswa = null)
    {
       var_dump($id_siswa);
       if (!isset($id_siswa)) redirect('admin/dataSiswa');


       $var = $this->Model_siswa;
       $validation = $this->form_validation;
       $validation->set_rules($var->rules());

       if ($validation->run()) {
        $var->pass();
        $this->session->set_flashdata('success', 'Berhasil disimpan');
    }
    $data["kelas"] = $this->Model_kelas->getAll();
    $data["jurusan"] = $this->Model_jurusan->getAll();
    $data["siswa"] = $var->getById($id_siswa);
    if (!$data["siswa"]) show_404();
    $this->load->view("template_admin/header");
    $this->load->view("template_admin/sidebar");
    $this->load->view("admin/editsiswa", $data);
    $this->load->view("template_admin/footer");
}





public function siswaDelete($id_siswa = null)
{
    if (!isset($id_siswa)) show_404();

    if ($this->Model_siswa->delete($id_siswa)) {
        $data["siswa"] = $this->Model_siswa->getAll();
        $this->load->view("template_admin/header");
        $this->load->view("template_admin/sidebar");
        $this->load->view("admin/listsiswa", $data);
        $this->load->view("template_admin/footer");
    }
}

    // ----------------------------BACK END--------------------------------------------------
    // ----------------------------CRUD PEGAWAI----------------------------------------------
public function dataPegawai()
{
    $data["pegawai"] = $this->Pegawai_model->getAll();
    $this->load->view("template_admin/header");
    $this->load->view("template_admin/sidebar");
    $this->load->view("admin/listpegawai", $data);
    $this->load->view("template_admin/footer");
}



public function pegawaiAdd()
{
    $tambah = $this->Pegawai_model;
    $validation = $this->form_validation;
    $validation->set_rules($tambah->rules());

    if ($validation->run()) {
        $tambah->save();
            // $this->session->set_flashdata('success', 'Berhasil disimpan');
    }

    $data["admin"] = $this->Pegawai_model->getAll();
    $this->load->view("template_admin/header");
    $this->load->view("template_admin/sidebar");
    $this->load->view("admin/listpegawai", $data);
    $this->load->view("template_admin/footer");
}

public function pegawaiEdit($id_admin = null)
{
        // var_dump($id_admin);
    if (!isset($id_admin)) redirect('Admin/dataPegawai');


    $var = $this->Pegawai_model;
    $validation = $this->form_validation;
    $validation->set_rules($var->rules());

    if ($validation->run()) {
        $var->update();
        $this->session->set_flashdata('success', 'Berhasil disimpan');
    }

    $data["admin"] = $var->getById($id_admin);
    if (!$data["admin"]) show_404();
    $this->load->view("template_admin/header");
    $this->load->view("template_admin/sidebar");
    $this->load->view("admin/editpegawai", $data);
    $this->load->view("template_admin/footer");
}

public function pegawaiDelete($id = null)
{
    if (!isset($id)) show_404();

    if ($this->Pegawai_model->delete($id)) {
        $data["admin"] = $this->Pegawai_model->getAll();
        $this->load->view("template_admin/header");
        $this->load->view("template_admin/sidebar");
        $this->load->view("admin/listpegawai", $data);
        $this->load->view("template_admin/footer");
    }
}

    // ----------------------------BACK END--------------------------------------------------
    // ----------------------------CRUD PENGUMUMAN-------------------------------------------

public function dataPengumuman()
{
    $data["pengumuman"] = $this->M_pengumuman->getAll();
    $this->load->view("template_admin/header");
    $this->load->view("template_admin/sidebar");
    $this->load->view("admin/listpengumuman", $data);
    $this->load->view("template_admin/footer");


}

public function pengumumanAdd()
{
    $tambah = $this->Model_pengumuman;
    $validation = $this->form_validation;
    $validation->set_rules($tambah->rules());

    if ($validation->run()) {
        $tambah->save();
        $this->session->set_flashdata('success', 'Berhasil disimpan');
    }

    $data["pengumuman"]=$this->Model_pengumuman->getAll();
    $this->load->view("template_admin/header");
    $this->load->view("template_admin/sidebar");
    $this->load->view("admin/dashboard", $data);
    $this->load->view("template_admin/footer");

}

public function pengumumanEdit($id=null)
{
        // var_dump($id);
    if (!isset($id)) redirect('Admin/dataPengumuman');


    $var = $this->Model_pengumuman;
    $validation = $this->form_validation;
    $validation->set_rules($var->rules());

    if ($validation->run()) {
        $var->update();
        $this->session->set_flashdata('success', 'Berhasil disimpan');
    }

        // $data["siswa"]=$this->M_siswa->getAll();
        // $this->load->view("template/header");
        // $this->load->view("admin/listsiswa", $data);
        // $this->load->view("template/sidebar");
        // $this->load->view("template/footer");

    $data["pengumuman"] = $var->getById($id);
    if (!$data["pengumuman"]) show_404();
    $this->load->view("template_admin/header");
    $this->load->view("template_admin/sidebar");
    $this->load->view("admin/editpengumuman", $data);
    $this->load->view("template_admin/footer");
}

public function pengumumanDelete($id=null)
{
    if (!isset($id)) show_404();

    if ($this->Model_pengumuman->delete($id)) {
        $data["pengumuman"]=$this->Model_pengumuman->getAll();
        $this->load->view("template_admin/header");
        $this->load->view("template_admin/sidebar");
        $this->load->view("admin/dashboard", $data);
        $this->load->view("template_admin/footer");
    }
}

    // ----------------------------BACK END--------------------------------------------------
    // ----------------------------CRUD GURU----------------------------------------------

public function dataDosen()
{
    $data["dosen"] = $this->Dosen_model->getAll();
    $this->load->view("template_admin/header");
    $this->load->view("template_admin/sidebar");
    $this->load->view("admin/listdosen", $data);
    $this->load->view("template_admin/footer");
}



public function dosenAdd()
{
    $tambah = $this->Dosen_model;
    $validation = $this->form_validation;
    $validation->set_rules($tambah->rules());

    if ($validation->run()) {
        $tambah->save();
            // $this->session->set_flashdata('success', 'Berhasil disimpan');
    }

    $data["dosen"] = $this->Dosen_model->getAll();
    $this->load->view("template_admin/header");
    $this->load->view("template_admin/sidebar");
    $this->load->view("admin/listdosen", $data);
    $this->load->view("template_admin/footer");
}

public function dosenEdit($id_dosen = null)
{
        // var_dump($id_dosen);
    if (!isset($id_dosen)) redirect('c_siswa');


    $var = $this->Dosen_model;
    $validation = $this->form_validation;
    $validation->set_rules($var->rules());

    if ($validation->run()) {
        $var->update();
        $this->session->set_flashdata('success', 'Berhasil disimpan');
    }

        // $data["siswa"]=$this->Dosen_model->getAll();
        // $this->load->view("template/header");
        // $this->load->view("admin/listsiswa", $data);
        // $this->load->view("template/sidebar");
        // $this->load->view("template/footer");

    $data["dosen"] = $var->getById($id_dosen);
    if (!$data["dosen"]) show_404();
    $this->load->view("template_admin/header");
    $this->load->view("template_admin/sidebar");
    $this->load->view("admin/editdosen", $data);
    $this->load->view("template_admin/footer");
}

public function dosenDelete($id_dosen = null)
{
    if (!isset($id_dosen)) show_404();

    if ($this->Dosen_model->delete($id_dosen)) {
        $data["dosen"] = $this->Dosen_model->getAll();
        $this->load->view("template_admin/header");
        $this->load->view("template_admin/sidebar");
        $this->load->view("admin/listdosen", $data);
        $this->load->view("template_admin/footer");
    }
}

    // ----------------------------BACK END--------------------------------------------------
    // ----------------------------CRUD MATKUL----------------------------------------------
public function dataMapel()
{
    $data["kelas"] = $this->Model_kelas->getAll();
    $data["jurusan"] = $this->Model_jurusan->getAll();
    $data["matkul"] = $this->Model_matkul->getAll();
    $data["tahun_ajaran"] = $this->Model_thnAjar->getAll();
    $this->load->view('template_admin/header');
    $this->load->view('template_admin/sidebar');
    $this->load->view('admin/listkelas', $data);
    $this->load->view('template_admin/footer');


}

public function matkulAdd()
{
    $tambah = $this->Model_matkul;
    $validation = $this->form_validation;
    $validation->set_rules($tambah->rules());

    if ($validation->run()) {
        $tambah->save();
        $this->session->set_flashdata('success', 'Berhasil disimpan');
    }

    $data["kelas"] = $this->Model_kelas->getAll();
    $data["jurusan"] = $this->Model_jurusan->getAll();
    $data["matkul"] = $this->Model_matkul->getAll();
    $data["tahun_ajaran"] = $this->Model_thnAjar->getAll();
    $this->load->view('template_admin/header');
    $this->load->view('template_admin/sidebar');
    $this->load->view('admin/listkelas', $data);
    $this->load->view('template_admin/footer');;

}

public function matkulEdit($id_matkul=null)
{
        // var_dump($id);
    if (!isset($id_matkul)) redirect('Admin/dataPengumuman');


    $var = $this->Model_matkul;
    $validation = $this->form_validation;
    $validation->set_rules($var->rules());

    if ($validation->run()) {
        $var->update();
        $this->session->set_flashdata('success', 'Berhasil disimpan');
    }


    $data["matkul"] = $var->getById($id_matkul);
    if (!$data["matkul"]) show_404();
    $this->load->view("template_admin/header");
    $this->load->view("template_admin/sidebar");
    $this->load->view("admin/editmatkul", $data);
    $this->load->view("template_admin/footer");
}

public function matkulDelete($id_matkul=null)
{
    if (!isset($id_matkul)) show_404();

    if ($this->Model_matkul->delete($id_matkul)) {
        $data["kelas"] = $this->Model_kelas->getAll();
        $data["jurusan"] = $this->Model_jurusan->getAll();
        $data["matkul"] = $this->Model_matkul->getAll();
        $data["tahun_ajaran"] = $this->Model_thnAjar->getAll();
        $this->load->view('template_admin/header');
        $this->load->view('template_admin/sidebar');
        $this->load->view('admin/listkelas', $data);
        $this->load->view('template_admin/footer');
    }
}

    // ----------------------------BACK END--------------------------------------------------
    // ----------------------------CRUD KELAS----------------------------------------------
public function dataKelas()
{
    $data["kelas"] = $this->Model_kelas->getAll();
    $data["jurusan"] = $this->Model_jurusan->getAll();
    $data["matkul"] = $this->Model_matkul->getAll();
    $data["tahun_ajaran"] = $this->Model_thnAjar->getAll();
    $this->load->view('template_admin/header');
    $this->load->view('template_admin/sidebar');
    $this->load->view('admin/listkelas', $data);
    $this->load->view('template_admin/footer');


}

public function kelasAdd()
{
    $tambah = $this->Model_kelas;
    $validation = $this->form_validation;
    $validation->set_rules($tambah->rules());

    if ($validation->run()) {
        $tambah->save();
        $this->session->set_flashdata('success', 'Berhasil disimpan');
    }

    $data["kelas"] = $this->Model_kelas->getAll();
    $data["jurusan"] = $this->Model_jurusan->getAll();
    $data["matkul"] = $this->Model_matkul->getAll();
    $data["tahun_ajaran"] = $this->Model_thnAjar->getAll();
    $this->load->view('template_admin/header');
    $this->load->view('template_admin/sidebar');
    $this->load->view('admin/listkelas', $data);
    $this->load->view('template_admin/footer');

}

public function kelasEdit($id_kelas=null)
{
        // var_dump($id);
    if (!isset($id_kelas)) redirect('Admin/dataPengumuman');


    $var = $this->Model_kelas;
    $validation = $this->form_validation;
    $validation->set_rules($var->rules());

    if ($validation->run()) {
        $var->update();
        $this->session->set_flashdata('success', 'Berhasil disimpan');
    }

    $data["jurusan"] = $this->Model_jurusan->getAll();
    $data["kelas"] = $var->getById($id_kelas);
    if (!$data["kelas"]) show_404();
    $this->load->view("template_admin/header");
    $this->load->view("template_admin/sidebar");
    $this->load->view("admin/editkelas", $data);
    $this->load->view("template_admin/footer");
}

public function kelasDelete($id_kelas=null)
{
    if (!isset($id_kelas)) show_404();

    if ($this->Model_kelas->delete($id_kelas)) {
        $data["kelas"] = $this->Model_kelas->getAll();
        $data["jurusan"] = $this->Model_jurusan->getAll();
        $data["matkul"] = $this->Model_matkul->getAll();
        $data["tahun_ajaran"] = $this->Model_thnAjar->getAll();
        $this->load->view('template_admin/header');
        $this->load->view('template_admin/sidebar');
        $this->load->view('admin/listkelas', $data);
        $this->load->view('template_admin/footer');
    }
}
    // ----------------------------BACK END--------------------------------------------------
    // ----------------------------CRUD JURUSAN----------------------------------------------
public function dataJurusan()
{
    $data["kelas"] = $this->Model_kelas->getAll();
    $data["jurusan"] = $this->Model_jurusan->getAll();
    $data["matkul"] = $this->Model_matkul->getAll();
    $data["tahun_ajaran"] = $this->Model_thnAjar->getAll();
    $this->load->view('template_admin/header');
    $this->load->view('template_admin/sidebar');
    $this->load->view('admin/listkelas', $data);
    $this->load->view('template_admin/footer');


}

public function jurusanAdd()
{
    $tambah = $this->Model_jurusan;
    $validation = $this->form_validation;
    $validation->set_rules($tambah->rules());

    if ($validation->run()) {
        $tambah->save();
        $this->session->set_flashdata('success', 'Berhasil disimpan');
    }

    $data["kelas"] = $this->Model_kelas->getAll();
    $data["jurusan"] = $this->Model_jurusan->getAll();
    $data["matkul"] = $this->Model_matkul->getAll();
    $data["tahun_ajaran"] = $this->Model_thnAjar->getAll();
    $this->load->view('template_admin/header');
    $this->load->view('template_admin/sidebar');
    $this->load->view('admin/listkelas', $data);
    $this->load->view('template_admin/footer');

}

public function jurusanEdit($id_jurusan=null)
{
        // var_dump($id);
    if (!isset($id_jurusan)) redirect('Admin/dataPengumuman');


    $var = $this->Model_jurusan;
    $validation = $this->form_validation;
    $validation->set_rules($var->rules());

    if ($validation->run()) {
        $var->update();
        $this->session->set_flashdata('success', 'Berhasil disimpan');
    }


    $data["jurusan"] = $var->getById($id_jurusan);
    if (!$data["jurusan"]) show_404();
    $this->load->view("template_admin/header");
    $this->load->view("template_admin/sidebar");
    $this->load->view("admin/editjurusan", $data); 
    $this->load->view("template_admin/footer");
}

public function jurusanDelete($id_jurusan=null)
{
    if (!isset($id_jurusan)) show_404();

    if ($this->Model_jurusan->delete($id_jurusan)) {
        $data["kelas"] = $this->Model_kelas->getAll();
        $data["jurusan"] = $this->Model_jurusan->getAll();
        $data["matkul"] = $this->Model_matkul->getAll();
        $data["tahun_ajaran"] = $this->Model_thnAjar->getAll();
        $this->load->view('template_admin/header');
        $this->load->view('template_admin/sidebar');
        $this->load->view('admin/listkelas', $data);
        $this->load->view('template_admin/footer');
    }
}
    // ----------------------------BACK END--------------------------------------------------
    // ----------------------------CRUD TAHUN AJARAN----------------------------------------------
public function dataTahun()
{
    $data["kelas"] = $this->Model_kelas->getAll();
    $data["jurusan"] = $this->Model_jurusan->getAll();
    $data["matkul"] = $this->Model_matkul->getAll();
    $data["tahun_ajaran"] = $this->Model_thnAjar->getAll();
    $this->load->view('template_admin/header');
    $this->load->view('template_admin/sidebar');
    $this->load->view('admin/listkelas', $data);
    $this->load->view('template_admin/footer');


}

public function tahunAdd()
{
    $tambah = $this->Model_thnAjar;
    $validation = $this->form_validation;
    $validation->set_rules($tambah->rules());

    if ($validation->run()) {
        $tambah->save();
        $this->session->set_flashdata('success', 'Berhasil disimpan');
    }


    $data["kelas"] = $this->Model_kelas->getAll();
    $data["jurusan"] = $this->Model_jurusan->getAll();
    $data["matkul"] = $this->Model_matkul->getAll();
    $data["tahun_ajaran"] = $this->Model_thnAjar->getAll();
    $this->load->view('template_admin/header');
    $this->load->view('template_admin/sidebar');
    $this->load->view('admin/listtahun', $data);
    $this->load->view('template_admin/footer');

}


public function tahunEdit($id_tahun_ajaran=null)
{
        // var_dump($id);
    if (!isset($id_tahun_ajaran)) redirect('Admin/dataPengumuman');


    $var = $this->Model_thnAjar;
    $validation = $this->form_validation;
    $validation->set_rules($var->rules());

    if ($validation->run()) {
        $var->update();
        $this->session->set_flashdata('success', 'Berhasil disimpan');
    }


    $data["tahun_ajaran"] = $var->getById($id_tahun_ajaran);
    if (!$data["tahun_ajaran"]) show_404();
    $this->load->view("template_admin/header");
    $this->load->view("template_admin/sidebar");
    $this->load->view("admin/edittahun", $data);
    $this->load->view("template_admin/footer");
}

public function tahunDelete($id_tahun_ajaran=null)
{
    if (!isset($id_tahun_ajaran)) show_404();

    if ($this->Model_thnAjar->delete($id_tahun_ajaran)) {
        $data["kelas"] = $this->Model_kelas->getAll();
        $data["jurusan"] = $this->Model_jurusan->getAll();
        $data["matkul"] = $this->Model_matkul->getAll();
        $data["tahun_ajaran"] = $this->Model_thnAjar->getAll();
        $this->load->view('template_admin/header');
        $this->load->view('template_admin/sidebar');
        $this->load->view('admin/listkelas', $data);
        $this->load->view('template_admin/footer');;
    }
}

    // ----------------------------BACK END--------------------------------------------------
    // ----------------------------CRUD SPP-------------------------------------------
public function sppAdd()
{
    $tambah = $this->Model_spp;
        // $validation = $this->form_validation;
        // $validation->set_rules($tambah->rules());

        // if ($validation->run()) {
    $tambah->save();
            // $this->session->set_flashdata('success', 'Berhasil disimpan');


    $data['spp'] = $this->Model_spp->getAll();
    $this->load->view('template_admin/header');
    $this->load->view('template_admin/sidebar');
    $this->load->view('admin/daftarsiswaspp',$data);
    $this->load->view('template_admin/footer');
}

    //     public function spAdd()
    // {
    //     $tambah = $this->Model_spp;
    //     // $validation = $this->form_validation;
    //     // $validation->set_rules($tambah->rules());

    //     // if ($validation->run()) {
    //         $tambah->save();
    //         // $this->session->set_flashdata('success', 'Berhasil disimpan');


    //     $data['sp'] = $this->Model_spp->getAll();
    //     $this->load->view('template_admin/header');
    //     $this->load->view('template_admin/sidebar');
    //     $this->load->view('admin/daftarsiswaspp',$data);
    //     $this->load->view('template_admin/footer');
    // }




public function sppEdit($id_spp = null)
{
        // var_dump($id_spp);
    if (!isset($id_spp)) redirect('Admin');


    $var = $this->Model_spp;
        // $validation = $this->form_validation;
        // $validation->set_rules($var->rules());

        // if ($validation->run()) {
    $var->update();
            // $this->session->set_flashdata('success', 'Berhasil disimpan');
        // }


    $data["spp"] = $var->getById($id_spp);
    if (!$data["spp"]) show_404();
    $this->load->view("template_admin/header");
    $this->load->view("template_admin/sidebar");
    $this->load->view("admin/editspp", $data);
    $this->load->view("template_admin/footer");
}


    // ----------------------------CRUD SP-------------------------------------------
public function spAdd()
{
    $tambah = $this->Model_sp;
        // $validation = $this->form_validation;
        // $validation->set_rules($tambah->rules());

        // if ($validation->run()) {
    $tambah->save();
            // $this->session->set_flashdata('success', 'Berhasil disimpan');


    $data['sp'] = $this->Model_sp->getAll();
    $this->load->view('template_admin/header');
    $this->load->view('template_admin/sidebar');
    $this->load->view('admin/daftarsiswasp',$data);
    $this->load->view('template_admin/footer');
}



public function spEdit($id_sp = null)
{
        // var_dump($id_spp);
    if (!isset($id_sp)) redirect('Admin');


    $var = $this->Model_sp;
        // $validation = $this->form_validation;
        // $validation->set_rules($var->rules());

        // if ($validation->run()) {
    $var->update();
            // $this->session->set_flashdata('success', 'Berhasil disimpan');
        // }


    $data["sp"] = $var->getById($id_sp);
    if (!$data["sp"]) show_404();
    $this->load->view("template_admin/header");
    $this->load->view("template_admin/sidebar");
    $this->load->view("admin/editsp", $data);
    $this->load->view("template_admin/footer");
}

    // ----------------------------BACK END--------------------------------------------------
    // ----------------------------CRUD JADWAL--------------------------------------------------

public function dataJadwal()
{
    $data["jadwal"] = $this->Model_jadwal->getAll();
    $this->load->view('template_admin/header');
    $this->load->view('template_admin/sidebar');
    $this->load->view('admin/jadwal', $data);
    $this->load->view('template_admin/footer');


}

public function jadwalAdd()
{
    $tambah = $this->Model_jadwal;
    $validation = $this->form_validation;
    $validation->set_rules($tambah->rules());

    if ($validation->run()) {
        $tambah->save();
        $this->session->set_flashdata('success', 'Berhasil disimpan');
    } else {
        $this->session->set_flashdata('Gagal', 'Tidak Berhasil disimpan');
    }
    $data["kelas"] = $this->Model_kelas->getAll();
    $data["jurusan"] = $this->Model_jurusan->getAll();
    $data["jadwal"] = $this->Model_jadwal->getAll();
    $this->load->view('template_admin/header');
    $this->load->view('template_admin/sidebar');
    $this->load->view('admin/jadwal', $data);
    $this->load->view('template_admin/footer');

}

public function jadwalEdit($id_jadwal=null)
{
        // var_dump($id);
    if (!isset($id_jadwal)) redirect('Admin/jadwal');


    $var = $this->Model_jadwal;
    $validation = $this->form_validation;
    $validation->set_rules($var->rules());

    if ($validation->run()) {
        $var->update();
        $this->session->set_flashdata('success', 'Berhasil disimpan');
    }

    $data["kelas"] = $this->Model_kelas->getAll();
    $data["jurusan"] = $this->Model_jurusan->getAll();
    $data["jadwal"] = $var->getById($id_jadwal);
    if (!$data["jadwal"]) show_404();
    $this->load->view("template_admin/header");
    $this->load->view("template_admin/sidebar");
    $this->load->view("admin/editjadwal", $data);
    $this->load->view("template_admin/footer");
}

public function jadwalDelete($id_jadwal=null)
{
    if (!isset($id_jadwal)) show_404();

    if ($this->Model_jadwal->delete($id_jadwal)) {
        $data["jadwal"] = $this->Model_jadwal->getAll();
        $this->load->view('template_admin/header');
        $this->load->view('template_admin/sidebar');
        $this->load->view('admin/jadwal', $data);
        $this->load->view('template_admin/footer');;
    }
}


}
