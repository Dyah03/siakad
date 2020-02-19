<div class="container">
    <section class="content">
        <div class="jumbotron text-center">
            <h2>Status Peringatan Lisan/Tertulis Siswa</h2>
        </div>

        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-external-link-square"></i> </div>
                <div class="panel-body">
                    <?php
                    $this->db->select('status');
                    $q = $this->db->join('siswa', 'siswa.id_siswa = sp.id_siswa')->get_where('sp', array('nisn' => $this->session->userdata("nisn")));

                    foreach ($q->result_array() as $data) :
                        ?>
                        <h2>Status Peringatan <?= $data['status']; ?></h2>
                    <?php endforeach; ?>
                    <h3>Apabila ada tidak kesesuaian data bisa menghubungi admin</h3>
                    

                </div>
            </div>

        </div>
    </section>

</div>