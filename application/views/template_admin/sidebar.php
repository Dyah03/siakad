<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
	<div class="profile-sidebar">
		<div class="profile-userpic">
			<img src="<?= base_url('foto') ?>/admin.png" class="img-responsive"  alt="">
		</div>
		<div class="profile-usertitle">
			<div class="profile-usertitle-name" >Username </div>
			<div class="profile-usertitle-status"><span class="indicator label-success"></span><?= $this->session->userdata("username"); ?></div>
		</div>
		<div class="clear"></div>
	</div>
	<div class="divider"></div>
		<ul class="nav menu">
		<div class="sidebar-heading">
		</div>
		<li class="parent"><a href="<?= base_url('admin') ?>"><em class="fa fa-dashboard">&nbsp;</em> Dashboard</a></li>
		<li><a href="<?= base_url('admin/daftarsiswaspp') ?>"><em class="fa fa-money">&nbsp;</em> Status Pembayaran Spp</a></li>
		<li><a href="<?= base_url('admin/uploadjadwal') ?>"><em class="fa fa-upload">&nbsp;</em> Upload Jadwal</a></li>
		<li><a href="<?= base_url('admin/pengumuman') ?>"><em class="fa fa-exclamation">&nbsp;</em>Pengumuman</a></li>
		<li class="parent "><a data-toggle="collapse" href="#sub-item-2">
				<em class="fa fa-user-plus">&nbsp;</em> List Data <span data-toggle="collapse" href="#sub-item-2" class="icon pull-right"><em class="fa fa-plus"></em></span>
			</a>
			<ul class="children collapse" id="sub-item-2">
				<li><a class="" href="<?= base_url('admin/listdosen') ?>">
						<span class="fa fa-arrow-right">&nbsp;</span>List Data Dosen
					</a></li>
				<li><a class="" href="<?= base_url('admin/listsiswa') ?>">
						<span class="fa fa-arrow-right">&nbsp;</span> List Data Siswa
					</a></li>
				<li><a class="" href="<?= base_url('admin/listpegawai') ?>">
						<span class="fa fa-arrow-right">&nbsp;</span> List Data Pegawai
					</a></li>
			</ul>
		</li>
		<li class="parent "><a data-toggle="collapse" href="#sub-item-3">
				<em class="fa fa-user-plus">&nbsp;</em> List Kurikulum <span data-toggle="collapse" href="#sub-item-2" class="icon pull-right"><em class="fa fa-plus"></em></span>
			</a>
			<ul class="children collapse" id="sub-item-3">
				<li><a class="" href="<?= base_url('admin/listkelas') ?>">
						<span class="fa fa-arrow-right">&nbsp;</span>List Kelas
					</a></li>
				<li><a class="" href="<?= base_url('admin/listjurusan') ?>">
						<span class="fa fa-arrow-right">&nbsp;</span> List Jurusan
					</a></li>
				<li><a class="" href="<?= base_url('admin/listmatkul') ?>">
						<span class="fa fa-arrow-right">&nbsp;</span> List Mata Kuliah
					</a></li>
				<li><a class="" href="<?= base_url('admin/listtahun') ?>">
						<span class="fa fa-arrow-right">&nbsp;</span> List Tahun 
					</a></li>
			</ul>
		</li>
		<li><a href="<?= base_url('admin/daftarsiswasp') ?>"><em class="fa fa-exclamation">&nbsp;</em>Surat Peringatan</a></li>
		<li><a href="<?= base_url('logout'); ?>"><em class="fa fa-power-off">&nbsp;</em> Logout</a></li>
	</ul>
</div>



































<!-- <div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
	<div class="profile-sidebar">
		<div class="profile-userpic">
			<img src="<?= base_url('foto') ?>/admin.png" class="img-responsive" alt="">
		</div>
		<div class="profile-usertitle">
			<div class="profile-usertitle-name">Username </div>
			<div class="profile-usertitle-status"><span class="indicator label-success"></span><?= $this->session->userdata("username"); ?></div>
		</div>
		<div class="clear"></div>
	</div>
	<div class="divider"></div>
	<form role="search">
		<div class="form-group">
			<input type="text" class="form-control" placeholder="Search">
		</div>
	</form>
	<ul class="nav menu">
		<div class="sidebar-heading">
		</div>
		<li class="parent"><a href="<?= base_url('admin') ?>"><em class="fa fa-dashboard">&nbsp;</em> Dashboard</a></li>
		<li><a href="<?= base_url('admin/daftarsiswaspp') ?>"><em class="fa fa-money">&nbsp;</em> Status Pembayaran Spp</a></li>
		<li><a href="<?= base_url('admin/uploadjadwal') ?>"><em class="fa fa-upload">&nbsp;</em> Upload Jadwal</a></li>
		<li><a href="<?= base_url('admin/pengumuman') ?>"><em class="fa fa-exclamation">&nbsp;</em>Pengumuman</a></li>
		<li class="parent "><a data-toggle="collapse" href="#sub-item-2">
				<em class="fa fa-user-plus">&nbsp;</em> Tambah data <span data-toggle="collapse" href="#sub-item-2" class="icon pull-right"><em class="fa fa-plus"></em></span>
			</a>
			<ul class="children collapse" id="sub-item-2">
				<li><a class="" href="<?= base_url('admin/listdosen') ?>">
						<span class="fa fa-arrow-right">&nbsp;</span>Tambah Data Dosen
					</a></li>
				<li><a class="" href="<?= base_url('admin/listsiswa') ?>">
						<span class="fa fa-arrow-right">&nbsp;</span> Tambah Data Siswa
					</a></li>
				<li><a class="" href="<?= base_url('admin/listpegawai') ?>">
						<span class="fa fa-arrow-right">&nbsp;</span> Tambah Data Pegawai
					</a></li>
				<li><a class="" href="<?= base_url('admin/listkurikulum') ?>">
						<span class="fa fa-arrow-right">&nbsp;</span> Tambah Data Kurikulum
					</a></li>
			</ul>
		</li>
		<li><a href="<?= base_url('logout'); ?>"><em class="fa fa-power-off">&nbsp;</em> Logout</a></li>
	</ul>
</div> -->