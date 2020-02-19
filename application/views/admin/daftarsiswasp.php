<div class="col-sm-8 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#">
                    <em class="glyphicon glyphicon-home"></em>
                </a></li>
            <li class="active">SP Mahasiswa</li>
        </ol>
    </div>
    <div class="container-fluid" style="margin-top:20px">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-primary">
                    <div class="panel panel-heading">
                    Daftar Surat Peringatan Mahasiswa    
                    </div>
                        <div class="col-md-2">
                                <form method="post"  action="<?php  echo base_url(). 'admin/addspsiswa'; ?>">
                                    <button class="btn btn-primary" id="submit-buttons" type="submit" ​​​​​>Tambah Data SP Via Excel</button>
                                </form>
                        </div>  
                        <div class="col-md-2">
                                <form method="post"  action="<?php  echo base_url(). 'admin/addformsp'; ?>">
                                    <button class="btn btn-primary" id="submit-buttons" type="submit" ​​​​​>Tambah Data SP </button>
                                </form>
                        </div>  

                        <div class="col-md-2">
                            <form method="post"  action="<?php  echo base_url(). 'admin/editsp'; ?>">
                                <button class="btn btn-success" id="submit-buttons" type="submit" ​​​​​>Edit SP</button>
                            </form>
                        </div>
                    <div class="panel-body">
                        <table data-toggle="table"  data-url="<?base_url('assets_admin')?>/tables/data1.json"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">           <thead>
                            <tr>
                                <th>No</th>
                                <th>NIM</th>
                                <th>Nama Mahasiswa</th>
                                <th>Jenis Kelamin</th>
                                <th>Kelas</th>
                                <th>Bulan</th>
                                <th>Semester</th>
                                <th>Tahun Ajaran</th>
                                <th>Status SP</th>
                                <!-- <th>Edit</th> -->
                            </tr>
                            </thead>
                                <tbody>
                                        <tr>
                                        <?php
                                            $this->db->select('nisn,nama_kelas,nama_siswa,jenis_kelamin, nama_bulan, semester, tahun_ajaran, status, id_sp');

                                            $this->db->join('kelas', 'kelas.id_kelas = sp.id_kelas');
                                            $this->db->join('siswa', 'siswa.id_siswa = sp.id_siswa');
                                            $this->db->join('bulan', 'bulan.id_bulan = sp.id_bulan');
                                            $this->db->join('semester', 'semester.id_semester = sp.id_semester');
                                            $q = $this->db->join('tahun_ajaran', 'tahun_ajaran.id_tahun_ajaran = sp.id_tahun_ajaran')->get('sp');
                                            $no = 1;
                                            foreach ($q->result_array() as $sp) : ?>
                                                <td><?= $no++; ?></td>
                                                <td><?= $sp['nisn']; ?></td>
                                                <td><?= $sp['nama_siswa']; ?></td>
                                                <td><?= $sp['jenis_kelamin']; ?></td>
                                                <td><?= $sp['nama_kelas']; ?></td>
                                                <td><?= $sp['nama_bulan']; ?></td>
                                                <td><?= $sp['semester']; ?></td>
                                                <td><?= $sp['tahun_ajaran']; ?></td>
                                                <td><?= $sp['status']; ?></td>
                                                <!-- <td><?php echo anchor('Admin/editsp/'.$sp['id_sp'],'<button class="btn btn-primary margin" type="button"><span class="fa fa-pencil"></span></button>'); ?></td> -->
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                        </table>    
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>