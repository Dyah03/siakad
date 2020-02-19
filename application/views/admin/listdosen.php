<div class="col-sm-8 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
	<div class="row">
		<ol class="breadcrumb">
			<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
			<li class="active">List Dosen</li>
		</ol>
	</div>

	<div class=container-fluid>
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Daftar Dosen</h1>
				
				<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-success">
					<div class="panel-heading">Data Dosen</div>
						<div class="panel-body timeline-container">
						<form method="post" action="<?php echo base_url() . 'admin/adddosen'; ?>">
							<button class="btn btn-primary" id="submit-buttons" type="submit" ​​​​​>Tambah Dosen</button>
						</form>
							<table data-toggle="table" data-url="<?base_url('assets_admin')?>/tables/data1.json"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
								<thead>
								    <tr>
									<th><font face ="Calibri"> No </font></th>
									<th data-sortable="true"><font face="Calibri">NIDN</font></th>
									<th data-sortable="true"><font face="Calibri">Nama</font></th>
									<th><font face="Calibri">Tanggal Lahir</font></th>
									<th><font face="Calibri">Kota Asal</font></th>
									<th><font face="Calibri">Jenis Kelamin</font></th>
									<th><font face="Calibri">Alamat</font></th>
									<th><font face="Calibri">No Telepon</font></th>
								
									<th><font face="Calibri"> Foto </font></th>
									<th><font face="Calibri"> Menu </font></th>
									</tr>
						    	</thead>
								<tbody>
					<?php  $nomor =1; ?>
						<?php
						foreach ($dosen as $dosen) :
							?>
							<tr>
							<td><?php echo $nomor; ?></td>
								<td>
									<p><?= $dosen->nidn_dosen ?></p>
								</td>
								<td>
									<p><?= $dosen->nama_lengkap ?></p>
								</td>
								<td>
									<p><?= $dosen->tanggal_lahir ?></p>
								</td>
								<td>
									<p><?= $dosen->asal_kota ?></p>
								</td>
								<td>
									<p><?= $dosen->jenis_kelamin ?></p>
								</td>
								<td>
									<p><?= $dosen->alamat ?></p>
								</td>
								<td>
									<p><?= $dosen->no_telp ?></p>
								</td>
								<td>
									<img src="<?php echo base_url('foto/dosen/' . $dosen->foto) ?>" width="64" />
								</td>
								<td>
								<?php echo anchor('Admin/dosenEdit/' . $dosen->id_dosen, '<button class="btn btn-primary margin" type="button"><span class="fa fa-pencil"></span> </button>'); ?>
								<?php echo anchor('Admin/dosenDelete/' . $dosen->id_dosen, '<button class="btn btn-danger margin" type="button"><span class="fa fa-trash"></span> </button>'); ?>
								</td>
							</tr>
							<?php $nomor++; ?>
						<?php endforeach; ?>
						</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
