<div class="container">
    <section class="content">
        <div class="jumbotron text-center">
            <h3> Nilai Mahasiswa </h3>
            <!-- <div class="inner">
    <button type="button" class="btn btn-primary"></a>Tampilkan Nilai</button>
        </div> -->
    </section>
</div>

<div class="col-lg-6">
    <div class="card">
        <div class="card-header">
            <strong class="card-title">
                <?php
                $this->db->select('nama_kelas');
                $q =  $this->db->join('kelas', 'kelas.id_kelas = siswa.id_kelas')->get_where('siswa', array('nisn' => $this->session->userdata("nisn")));

                foreach ($q->result_array() as $data) : ?>
                    Kelas <?= $data['nama_kelas']; ?></strong>
            <?php endforeach; ?>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Mata Kuliah</th>
                        <th scope="col">Nama Dosen</th>
                        <th scope="col">UAS</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <?php
                        $this->db->select('nisn,nama_lengkap,nama_kelas,nama_siswa,nama_matkul,nilai_siswa,semester');
                        $this->db->join('dosen', 'dosen.id_dosen = nilai.id_dosen');
                        $this->db->join('kelas', 'kelas.id_kelas = nilai.id_kelas');
                        $this->db->join('siswa', 'siswa.id_siswa = nilai.id_siswa');
                        $this->db->join('matkul', 'matkul.id_matkul = nilai.id_matkul');
                        $q = $this->db->join('semester', 'semester.id_semester = nilai.id_semester')->get_where('nilai', array('nisn' => $this->session->userdata("nisn")));

                        $no = 1;
                        foreach ($q->result_array() as $data) : ?>

                            <th scope="row"><?= $no++; ?></th>
                            <td><?= $data['nama_matkul']; ?></td>
                            <td><?= $data['nama_lengkap']; ?></td>
                            <td><?= $data['nilai_siswa']; ?></td>
                        </tr>
                    <?php endforeach; ?>


                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- <div class="col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Kelas IPA 10 Semester Genap</strong>
                            </div>
                            <div class="card-body">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Mata Pelajaran</th>
											<th scope="col">Nama Pengajar</th>
											<th scope="col">UAS</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row">1</th>
                                            <td>Matematika Wajib</td>
											<td>Sudrajat Eko, S.pd.</td>
											<td>80</td>
                                        </tr>
										<tr>
                                            <th scope="row">2</th>
                                            <td>Matematika Peminatan</td>
											<td>Sudrajat Eko, S.pd.</td>
											<td>80</td>
                                        </tr>									
                                        <tr>
                                            <th scope="row">3</th>
                                            <td>B. Inggirs</td>
											<td>Ayana, S.pd.</td>
                                            <td>85</td>
                                        </tr>
										<tr>
                                            <th scope="row">4</th>
                                            <td>B. Indonesia</td>
											<td>Widodo, S.pd.</td>
                                            <td>100</td>                                      
                                        </tr>
                                        <tr>
                                            <th scope="row">5</th>
                                            <td>Pendidikan Agama</td>
											<td>Yuli Setyowati, S.Ag.</td>
                                            <td>100</td>                                    
                                        </tr>
										<tr>
                                            <th scope="row">6</th>
                                            <td>Sejarah</td>
											<td>Herdi Mahendra, S.pd.</td>
                                            <td>100</td>                                      
                                        </tr>
										<tr>
                                            <th scope="row">7</th>
                                            <td>Fisika</td>
											<td>Liandi, S.pd.</td>
                                            <td>100</td>                                     
                                        </tr>
										<tr>
                                            <th scope="row">8</th>
                                            <td>Biologi</td>
											<td>Sulistyawan, S.pd.</td>
                                            <td>100</td>                                     
                                        </tr>
										<tr>
                                            <th scope="row">9</th>
                                            <td>Kimia</td>
											<td>Imbang Permadi, S.pd.</td>
                                            <td>100</td>                                    
                                        </tr>
										<tr>
                                            <th scope="row">10</th>
                                            <td>Ekonomi</td>
											<td>Nanik Wijaya, S.pd.</td>
                                            <td>100</td>                                    
                                        </tr>
										<tr>
                                            <th scope="row">11</th>
                                            <td>Olahraga</td>
											<td>Amin Thohari, S.pd.</td>
                                            <td>100</td>                                    
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

					<div class="col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Kelas IPA 11 Semester Ganjil</strong>
                            </div>
                            <div class="card-body">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Mata Pelajaran</th>
											<th scope="col">Nama Pengajar</th>
											<th scope="col">UAS</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row">1</th>
                                            <td>Matematika Wajib</td>
											<td>Sudrajat Eko, S.pd.</td>
											<td>80</td>
                                        </tr>
										<tr>
                                            <th scope="row">2</th>
                                            <td>Matematika Peminatan</td>
											<td>Sudrajat Eko, S.pd.</td>
											<td>80</td>
                                        </tr>									
                                        <tr>
                                            <th scope="row">3</th>
                                            <td>B. Inggirs</td>
											<td>Ayana, S.pd.</td>
                                            <td>85</td>
                                        </tr>
										<tr>
                                            <th scope="row">4</th>
                                            <td>B. Indonesia</td>
											<td>Widodo, S.pd.</td>
                                            <td>100</td>                                      
                                        </tr>
                                        <tr>
                                            <th scope="row">5</th>
                                            <td>Pendidikan Agama</td>
											<td>Yuli Setyowati, S.Ag.</td>
                                            <td>100</td>                                    
                                        </tr>
										<tr>
                                            <th scope="row">6</th>
                                            <td>Sejarah</td>
											<td>Herdi Mahendra, S.pd.</td>
                                            <td>100</td>                                      
                                        </tr>
										<tr>
                                            <th scope="row">7</th>
                                            <td>Fisika</td>
											<td>Liandi, S.pd.</td>
                                            <td>100</td>                                     
                                        </tr>
										<tr>
                                            <th scope="row">8</th>
                                            <td>Biologi</td>
											<td>Sulistyawan, S.pd.</td>
                                            <td>100</td>                                     
                                        </tr>
										<tr>
                                            <th scope="row">9</th>
                                            <td>Kimia</td>
											<td>Imbang Permadi, S.pd.</td>
                                            <td>100</td>                                    
                                        </tr>
										<tr>
                                            <th scope="row">10</th>
                                            <td>Ekonomi</td>
											<td>Nanik Wijaya, S.pd.</td>
                                            <td>100</td>                                    
                                        </tr>
										<tr>
                                            <th scope="row">11</th>
                                            <td>Olahraga</td>
											<td>Amin Thohari, S.pd.</td>
                                            <td>100</td>                                    
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

					<div class="col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Kelas IPA 11 Semester Genap</strong>
                            </div>
                            <div class="card-body">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Mata Pelajaran</th>
											<th scope="col">Nama Pengajar</th>
											<th scope="col">UAS</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row">1</th>
                                            <td>Matematika Wajib</td>
											<td>Sudrajat Eko, S.pd.</td>
											<td>80</td>
                                        </tr>
										<tr>
                                            <th scope="row">2</th>
                                            <td>Matematika Peminatan</td>
											<td>Sudrajat Eko, S.pd.</td>
											<td>80</td>
                                        </tr>									
                                        <tr>
                                            <th scope="row">3</th>
                                            <td>B. Inggirs</td>
											<td>Ayana, S.pd.</td>
                                            <td>85</td>
                                        </tr>
										<tr>
                                            <th scope="row">4</th>
                                            <td>B. Indonesia</td>
											<td>Widodo, S.pd.</td>
                                            <td>100</td>                                      
                                        </tr>
                                        <tr>
                                            <th scope="row">5</th>
                                            <td>Pendidikan Agama</td>
											<td>Yuli Setyowati, S.Ag.</td>
                                            <td>100</td>                                    
                                        </tr>
										<tr>
                                            <th scope="row">6</th>
                                            <td>Sejarah</td>
											<td>Herdi Mahendra, S.pd.</td>
                                            <td>100</td>                                      
                                        </tr>
										<tr>
                                            <th scope="row">7</th>
                                            <td>Fisika</td>
											<td>Liandi, S.pd.</td>
                                            <td>100</td>                                     
                                        </tr>
										<tr>
                                            <th scope="row">8</th>
                                            <td>Biologi</td>
											<td>Sulistyawan, S.pd.</td>
                                            <td>100</td>                                     
                                        </tr>
										<tr>
                                            <th scope="row">9</th>
                                            <td>Kimia</td>
											<td>Imbang Permadi, S.pd.</td>
                                            <td>100</td>                                    
                                        </tr>
										<tr>
                                            <th scope="row">10</th>
                                            <td>Ekonomi</td>
											<td>Nanik Wijaya, S.pd.</td>
                                            <td>100</td>                                    
                                        </tr>
										<tr>
                                            <th scope="row">11</th>
                                            <td>Olahraga</td>
											<td>Amin Thohari, S.pd.</td>
                                            <td>100</td>                                    
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

					<div class="col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Kelas IPA 12 Semester Ganjil</strong>
                            </div>
                            <div class="card-body">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Mata Pelajaran</th>
											<th scope="col">Nama Pengajar</th>
											<th scope="col">UAS</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row">1</th>
                                            <td>Matematika Wajib</td>
											<td>Sudrajat Eko, S.pd.</td>
											<td>80</td>
                                        </tr>
										<tr>
                                            <th scope="row">2</th>
                                            <td>Matematika Peminatan</td>
											<td>Sudrajat Eko, S.pd.</td>
											<td>80</td>
                                        </tr>									
                                        <tr>
                                            <th scope="row">3</th>
                                            <td>B. Inggirs</td>
											<td>Ayana, S.pd.</td>
                                            <td>85</td>
                                        </tr>
										<tr>
                                            <th scope="row">4</th>
                                            <td>B. Indonesia</td>
											<td>Widodo, S.pd.</td>
                                            <td>100</td>                                      
                                        </tr>
                                        <tr>
                                            <th scope="row">5</th>
                                            <td>Pendidikan Agama</td>
											<td>Yuli Setyowati, S.Ag.</td>
                                            <td>100</td>                                    
                                        </tr>
										<tr>
                                            <th scope="row">6</th>
                                            <td>Sejarah</td>
											<td>Herdi Mahendra, S.pd.</td>
                                            <td>100</td>                                      
                                        </tr>
										<tr>
                                            <th scope="row">7</th>
                                            <td>Fisika</td>
											<td>Liandi, S.pd.</td>
                                            <td>100</td>                                     
                                        </tr>
										<tr>
                                            <th scope="row">8</th>
                                            <td>Biologi</td>
											<td>Sulistyawan, S.pd.</td>
                                            <td>100</td>                                     
                                        </tr>
										<tr>
                                            <th scope="row">9</th>
                                            <td>Kimia</td>
											<td>Imbang Permadi, S.pd.</td>
                                            <td>100</td>                                    
                                        </tr>
										<tr>
                                            <th scope="row">10</th>
                                            <td>Ekonomi</td>
											<td>Nanik Wijaya, S.pd.</td>
                                            <td>100</td>                                    
                                        </tr>
										<tr>
                                            <th scope="row">11</th>
                                            <td>Olahraga</td>
											<td>Amin Thohari, S.pd.</td>
                                            <td>100</td>                                    
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

					<div class="col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Kelas IPA 12 Semester Genap</strong>
                            </div>
                            <div class="card-body">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Mata Pelajaran</th>
											<th scope="col">Nama Pengajar</th>
											<th scope="col">UAS</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row">1</th>
                                            <td>Matematika Wajib</td>
											<td>Sudrajat Eko, S.pd.</td>
											<td>80</td>
                                        </tr>
										<tr>
                                            <th scope="row">2</th>
                                            <td>Matematika Peminatan</td>
											<td>Sudrajat Eko, S.pd.</td>
											<td>80</td>
                                        </tr>									
                                        <tr>
                                            <th scope="row">3</th>
                                            <td>B. Inggirs</td>
											<td>Ayana, S.pd.</td>
                                            <td>85</td>
                                        </tr>
										<tr>
                                            <th scope="row">4</th>
                                            <td>B. Indonesia</td>
											<td>Widodo, S.pd.</td>
                                            <td>100</td>                                      
                                        </tr>
                                        <tr>
                                            <th scope="row">5</th>
                                            <td>Pendidikan Agama</td>
											<td>Yuli Setyowati, S.Ag.</td>
                                            <td>100</td>                                    
                                        </tr>
										<tr>
                                            <th scope="row">6</th>
                                            <td>Sejarah</td>
											<td>Herdi Mahendra, S.pd.</td>
                                            <td>100</td>                                      
                                        </tr>
										<tr>
                                            <th scope="row">7</th>
                                            <td>Fisika</td>
											<td>Liandi, S.pd.</td>
                                            <td>100</td>                                     
                                        </tr>
										<tr>
                                            <th scope="row">8</th>
                                            <td>Biologi</td>
											<td>Sulistyawan, S.pd.</td>
                                            <td>100</td>                                     
                                        </tr>
										<tr>
                                            <th scope="row">9</th>
                                            <td>Kimia</td>
											<td>Imbang Permadi, S.pd.</td>
                                            <td>100</td>                                    
                                        </tr>
										<tr>
                                            <th scope="row">10</th>
                                            <td>Ekonomi</td>
											<td>Nanik Wijaya, S.pd.</td>
                                            <td>100</td>                                    
                                        </tr>
										<tr>
                                            <th scope="row">11</th>
                                            <td>Olahraga</td>
											<td>Amin Thohari, S.pd.</td>
                                            <td>100</td>                                    
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div> -->