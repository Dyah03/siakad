    <body>
    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">
            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="<?=base_url();?>siswa/index"><img src="<?php echo base_url() ?>foto/POLINDRA.png" width="40px"><span style="color:whitegi">POLINDRA</span></a>

            </div>

            

			<div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <h3 class="menu-title">Menu</h3>
							<li class="active"><a href="<?= base_url(); ?>siswa/index"><i class="menu-icon ti-home"></i>	Home</a></li>
							<li class="active"><a href="<?= base_url(); ?>siswa/biodata"><i class="menu-icon ti-user"></i>	Profil Mahasiswa</a></li>
            				<li class="active"><a href="<?= base_url(); ?>siswa/nilai"><i class="menu-icon ti-book"></i>	Nilai Mahasiswa</a></li>
							<li class="active"><a href="<?= base_url(); ?>siswa/jadwal"><i class="menu-icon ti-map"></i>	Jadwal Mahasiswa</a></li>
            				<li class="active"><a href="<?= base_url(); ?>siswa/pengumuman"><i class="menu-icon ti-bell"></i>	Pengumuman</a></li>
            				<li class="active"><a href="<?= base_url(); ?>siswa/statusspp"><i class="menu-icon ti-money"></i>	Status Pembayaran UKT</a></li>
                            <li class="active"><a href="<?= base_url(); ?>siswa/statussp"><i class="menu-icon fa fa-exclamation"></i>Peringatan Lisan/Tertulis</a></li>
							<li><a href="<?= base_url('logout'); ?>"><i class="menu-icon ti-power-off"></i>	Logout</a></li>
        		</ul>
            </div>
    
        <div class="navbar-header">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars"></i>
            </button>
        </div>
	</aside>        	

		<div id="right-panel" class="right-panel">
        <header id="header" class="header">
            <div class="header-menu">
                <div class="col-sm-6">
                    <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>
                    <div class="header-left">
                        <button class="search-trigger"><i class="fa fa-search"></i></button>
                        <div class="form-inline">
                            <form class="search-form">
                                <input class="form-control mr-sm-2" type="text" placeholder="Search ..." aria-label="Search">
                                <button class="search-close" type="submit"><i class="fa fa-close"></i></button>
                            </form>
                        </div>

            <div class="dropdown for-notification">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="notification" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-bell"></i>
                    <span class="count bg-danger">5</span>
                </button>
                <div class="dropdown-menu" aria-labelledby="notification">
                    <p class="red">You have 3 Notification</p>
                    <a class="dropdown-item media bg-flat-color-1" href="#">
                    <i class="fa fa-check"></i>
                    <p>Server #1 overloaded.</p>
                </a>
                    <a class="dropdown-item media bg-flat-color-4" href="#">
                    <i class="fa fa-info"></i>
                    <p>Server #2 overloaded.</p>
                </a>
                    <a class="dropdown-item media bg-flat-color-5" href="#">
                    <i class="fa fa-warning"></i>
                    <p>Server #3 overloaded.</p>
                </a>
                </div>
            </div>

            <div class="dropdown for-message">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="message" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="ti-email"></i>
                    <span class="count bg-primary">9</span>
                </button>
                <div class="dropdown-menu" aria-labelledby="message">
                    <p class="red">You have 4 Mails</p>
                    <a class="dropdown-item media bg-flat-color-1" href="#">
                    <span class="photo media-left"><img alt="avatar" src="images/avatar/1.jpg"></span>
                    <span class="message media-body">
                        <span class="name float-left">Jonathan Smith</span>
                        <span class="time float-right">Just now</span>
                            <p>Hello, this is an example msg</p>
                    </span>
                </a>
                    <a class="dropdown-item media bg-flat-color-4" href="#">
                    <span class="photo media-left"><img alt="avatar" src="images/avatar/2.jpg"></span>
                    <span class="message media-body">
                        <span class="name float-left">Jack Sanders</span>
                        <span class="time float-right">5 minutes ago</span>
                            <p>Lorem ipsum dolor sit amet, consectetur</p>
                    </span>
                </a>
                    <a class="dropdown-item media bg-flat-color-5" href="#">
                    <span class="photo media-left"><img alt="avatar" src="images/avatar/3.jpg"></span>
                    <span class="message media-body">
                        <span class="name float-left">Cheryl Wheeler</span>
                        <span class="time float-right">10 minutes ago</span>
                            <p>Hello, this is an example msg</p>
                    </span>
                </a>
                    <a class="dropdown-item media bg-flat-color-3" href="#">
                    <span class="photo media-left"><img alt="avatar" src="images/avatar/4.jpg"></span>
                    <span class="message media-body">
                        <span class="name float-left">Rachel Santos</span>
                        <span class="time float-right">15 minutes ago</span>
                            <p>Lorem ipsum dolor sit amet, consectetur</p>
                    </span>
                </a>
                </div>
            </div>
        </div>
    </div>


	

		<div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Menu</h1>
                    </div>
                </div>
            </div>
			<div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Dashboard</a></li>
                          
                            <li class="active">Home</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div> 

