<div class="col-sm-8 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">Edit Kurikulum</li>
			</ol><br>
		</div>
    
		<div class= container>
        <div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Edit Kurikulum</h1>
            
                <div class="col-md-12">
				<div class="panel panel-primary ">
					<div class="panel-heading">
                    Edit Tahun Ajaran		
				<span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span>
					</div>
					 <div class="panel-body timeline-container">
						
                     <div class="card-body">
                             <form action="<?php echo base_url("Admin/tahunEdit/$tahun_ajaran->id_tahun_ajaran") ?>" method="post" enctype="multipart/form-data" >
                             <input type="hidden" name="id_tahun_ajaran" value="<?php echo $tahun_ajaran->id_tahun_ajaran?>"/>                          
                                <div class="form-group">
                                    <label for="tahun_ajaran">Tahun Ajaran</label>
                                    <input class="form-control <?php echo form_error('tahun_ajaran') ? 'is-invalid':'' ?>" type="text" name="tahun_ajaran" value="<?php echo $tahun_ajaran->tahun_ajaran?>" />
                                    <div class="invalid-feedback">
                                    <?php echo form_error('tahun_ajaran') ?>
                                    </div>
                                </div>
                               
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                    <button type="reset" class="btn btn-danger">Reset</button>
                            </form>
                        </div>

                                    </div>
                            </div>
                        </div>
             </div>
								
		</div> 