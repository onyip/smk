<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			<?=$title?>
		</h1>
	</section>
	
	<!-- Main content -->
	<section class="content container-fluid">
		<div class="box">
			<!-- header box -->
			<div class="box-header with-border">
				<h3 class="box-title"><?=$sub?></h3>
			</div>

			<!-- box body -->
			<div class="box-body">
				<div class="row">
					<div class="col-md-6">
						<form action="<?=base_url('user/insert')?>" method="post">
							<div class="form-group">
								<label>Full Name</label>
								<input type="text" class="form-control" placeholder="Full name" name="name">
							</div>
							<div class="form-group">
								<label>Username</label>
								<input type="text" class="form-control" placeholder="Username" name="user">
							</div>
							<div class="form-group">
								<label>Password</label>
								<input type="password" class="form-control" placeholder="Password" name="password">
							</div>
							<div class="form-group">
								<label>Repassword</label>
								<input type="password" class="form-control" placeholder="Repassword" name="repassword">
								<br>

								<div class="pull-right">

									<div class="btn-group ">
										<button type="submit" class="btn btn-primary btn-sm pull-right"><i class="fa fa-floppy-o"></i> Save</button>
									</div>
									
									<div class="btn-group ">
										<a href="<?=base_url('user')?>">
											<button type="button" class="btn btn-danger btn-sm pull-right" data-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
										</a>
									</div>
								</div>
							</div>
						</form>
					</div>

					<div class="col-md-6">
						<h3 class="text-center"><b>Import</b></h3>
						<small>Download import form here!</small><br>
						<a  href="<?=base_url('user/get_form')?>" target="_blank">
							<button class="btn btn-sm btn-info"><i class="fa fa-cloud-download"></i> Dowenload</button>
						</a>
						<br><br><br>
						<form action="<?=base_url('user/inport')?>" method="post" enctype="multipart/form-data">
							

							<div class="form-group">
								<input type="file" name="excel">
							</div>
							
							<div class="form-group">
								<button type="submit" name="submit" class="btn btn-sm btn-primary"><i class="fa fa-upload"></i> Import</button>
							</div>
						</form>
					</div>

				</div>
			</div>
		</div>
	</section>
	<!-- /.content -->
</div>
<!-- /.content-wrapper -->