<!-- Dasboard -->

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
	<div class="row">
		<ol class="breadcrumb">
			<li><a href="#">
					<em class="glyphicon glyphicon-home"></em>
				</a></li>
			<li class="active">Dashboard</li>
		</ol>
	</div>
	<!--/.row-->

	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Dashboard</h1>
		</div>
	</div>
	<!--/.row-->
	<div class="panel panel-container">
		<div class="row">
			<div class="col-xs-6 col-md-3 col-lg-3 no-padding">
				<div class="panel panel-teal panel-widget border-right">
					<div class="row no-padding"><em class="fa fa-xl fa-graduation-cap color-blue"></em>
						<?php
						$this->db->from('siswa');
						$this->db->where('id_jurusan', 1);
						$q = $this->db->count_all_results();
						echo '<div class="large">' . $q . '</div>';
						?>
						<div class="text-muted">Mahasiswa Teknik Informatika</div>
					</div>
				</div>
			</div>
			<div class="col-xs-6 col-md-3 col-lg-3 no-padding">
				<div class="panel panel-blue panel-widget border-right">
					<div class="row no-padding"><em class="fa fa-xl fa-graduation-cap color-orange"></em>
						<?php
						$this->db->from('siswa');
						$this->db->where('id_jurusan', 2);
						$q = $this->db->count_all_results();
						echo '<div class="large">' . $q . '</div>';
						?>
						<div class="text-muted">Mahasiswa Rekayasa Perangkat Lunak</div>
					</div>
				</div>
			</div>
			<div class="col-xs-6 col-md-3 col-lg-3 no-padding">
				<div class="panel panel-orange panel-widget border-right">
					<div class="row no-padding"><em class="fa fa-xl fa-users color-teal"></em>
						<?php
						$data = $this->db->count_all('dosen');
						echo '
						<div class="large">' . $data . '</div>';
						?>
						<div class="text-muted">Dosen</div>
					</div>
				</div>
			</div>
			<div class="col-xs-6 col-md-3 col-lg-3 no-padding">
				<div class="panel panel-red panel-widget ">
					<div class="row no-padding"><em class="fa fa-xl fa-users color-red"></em>
						<?php
						$data = $this->db->count_all('admin');
						echo '
						<div class="large">' . $data . '</div>';
						?>
						<div class="text-muted">Administrator</div>
					</div>
				</div>
			</div>
			<!--/.row-->
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-primary ">
				<div class="panel-heading">
					Pengumuman
				</div>
				<div class="panel-body timeline-container">

				<table data-toggle="table"  data-url="<?base_url('assets_admin')?>/tables/data1.json"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
                        <thead>
                            <tr>
                                <th><font face ="Calibri"> Tanggal </font></th>
                                <th><font face ="Calibri"> Judul </font></th>
                                <th><font face ="Calibri"> Keterangan </font></th>
                                
                                <th><font face ="Calibri"> Menu </font></th>
                            </tr>
						<tbody>
							<?php
							foreach ($pengumuman  as $umum) :
								?>
								<tr>
									<td>
										<p><?= $umum->tanggal ?></p>
									</td>
									<td>
										<p><?= $umum->judul ?></p>
									</td>

									<td>
										<p><?= $umum->keterangan ?></p>
									</td>
									<td>
										<?php echo anchor('Admin/pengumumanEdit/' . $umum->id_pengumuman, '<button class="btn btn-primary margin" type="button"><span class="fa fa-pencil"></span> </button>'); ?>
										<?php echo anchor('Admin/pengumumanDelete/' . $umum->id_pengumuman, '<button class="btn btn-danger margin" type="button"><span class="fa fa-trash"></span> </button>'); ?>
									</td>
								</tr>
							<?php endforeach; ?>
						</tbody>
					</table>
				</div>

			</div>

		</div>
	</div>
</div>
<!--/.col-->