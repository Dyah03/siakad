<div class="col-sm-8 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
	<div class="row">
		<ol class="breadcrumb">
			<li><a href="#">
					<em class="glyphicon glyphicon-home"></em>
				</a></li>
			<li class="active">SP Mahasiswa</li>
		</ol>
	</div>
	<?php if ($this->session->flashdata('success')) : ?>
		<div class="alert alert-success" role="alert">
			<?php echo $this->session->flashdata('success'); ?>
		</div>
	<?php endif; ?>
	<div class="container-fluid" style="margin-top:10px;">
		
	</div><br>
	<div class="container col-md-12">
		<table class="table table-striped clickable">
			<thead>
				<tr>
					<th>No</th>
					<th>NIM</th>
					<th>Nama Mahasssiswa</th>
					<th>Jenis Kelamin</th>
					<th>Kelas</th>
					<th>Bulan</th>
					<th>Semester</th>
					<th>Tahun Ajaran</th>
					<th>Status SP</th>
                    <th>Edit</th>
					<th>Aksi</th>
					
				</tr>
			<tbody>
				<tr>
					<?php
					$this->db->select('nisn,nama_kelas,nama_siswa,jenis_kelamin, nama_bulan, semester, tahun_ajaran, status, id_sp, ');
					// SELECT 
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
						<td>
							
						
						
							<div class=col-md-12 >

							<?php 
							// // $this->db-select*from spp where id_spp = $sp['id_spp'] ;
							// 	$table = "spp";
							// 	$a = $this->db->get_where($this->$table, ["id_spp"->$sp['id_spp']])->row();
							
								$data["sp"] = $this->Model_sp->getById($sp['id_sp']);
								foreach ($data as $tab):
										// echo $tab->id_spp;
										// echo $tab->id_siswa;
										// echo $tab->id_kelas;
										// echo $tab->id_bulan;
										// echo $tab->id_tahun_ajaran;
										// echo $tab->id_semester;
							?>
							<form action="<?php echo base_url("Admin/spEdit/$tab->id_sp")?>" method="post" enctype="multipart/form-data" >
							<input type="hidden" name="id_sp" value="<?php echo $tab->id_sp?>" />
							<input type="hidden" name="id_siswa" value="<?php echo $tab->id_siswa?>" />
							<input type="hidden" name="id_kelas" value="<?php echo $tab->id_kelas?>" />
							<input type="hidden" name="id_bulan" value="<?php echo $tab->id_bulan?>" />
							<input type="hidden" name="id_semester" value="<?php echo $tab->id_semester?>" />
							<input type="hidden" name="id_tahun_ajaran" value="<?php echo $tab->id_tahun_ajaran?>" />
							
								<p>
									<input type="radio" name="status" value="SP Lisan 1" class="status"> SP Lisan 1
								</p>
								<p>
									<input type="radio" name="status" value="SP Lisan 2" class="status"> SP Lisan 2
								</p>
								<p>
									<input type="radio" name="status" value="SP Lisan 3" class="status"> SP Lisan 3
								</p>
								<p>
									<input type="radio" name="status" value="SP 1" class="status"> SP 1
								</p>
								<p>
									<input type="radio" name="status" value="SP 2" class="status"> SP 2
								</p>
								<p>
									<input type="radio" name="status" value="SP 3" class="status"> SP 3
								</p>
									
						
<!-- 
							<label class="status">SP Lisan 1
                            <input type="checkbox" value="Lunas" name="status">
							</label>
							<label class="status">SP Lisan 2
                            <input type="checkbox" value="Lunas" name="status">
							</label><br>
							<label class="status">SP Lisan 2
                            <input type="checkbox" value="Lunas" name="status">
							</label>
							<label class="status"> Belum Lunas
                            <input type="checkbox" value="Belum Lunas" name="status">
                            </label> -->
                            </div>
                        
                        </td>
                        <td>    <button type="submit" class="btn btn-primary"  >Simpan</button>
								<button type="reset" class="btn btn-danger">Reset</button> 
                        </td>
						</form>
						
						<?php endforeach; ?>
					</tr>
				<?php endforeach; ?>
			</tbody>
			</thead>
		</table>
	</div>

</div>