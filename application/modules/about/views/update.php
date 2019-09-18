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
		<div class="col-md-8">
			<div class="box">
				<!-- header box -->
				<div class="box-header with-border">
					<h3 class="box-title"><?=$title?></h3>
				</div>

				<!-- box body -->
				<form action="<?=base_url('about/edit')?>" method="post" enctype="multipart/form-data">
					<div class="box-body">
						<div class="col-md-12">
							<input type="hidden" name="id" value="<?=$app->id?>">

							<div class="form-group">
								<label>Logo Application</label>
								<input type="file" name="logo">
								<input type="hidden" name="last-img" value="<?=$app->logo?>">
							</div>
							<div class="form-group">
								<label>Name Application</label>
								<input type="text" class="form-control" name="application" value="<?=$app->application?>">
							</div>
							<div class="form-group">
								<label>Abbreviation</label>
								<input type="text" class="form-control" name="abbreviation" value="<?=$app->abbreviation?>">
							</div>
							<div class="form-group">
								<label>Info</label>
								<input type="text" class="form-control" name="info" value="<?=$app->info?>">
							</div>
							<div class="form-group">
								<label>Copyright</label>
								<input type="text" class="form-control" name="copyright" value="<?=$app->copyright?>">
							</div>
							<div class="form-group">
								<label>Version</label>
								<input type="text" class="form-control" name="version" value="<?=$app->version?>">
							</div>

							<!-- /.box-body -->
							<div class="box-footer">
								<button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-floppy-o"></i> Save</button>
								<a href="<?=base_url('about')?>"><button type="button" class="btn btn-danger btn-sm"><i class="fa fa-times"></i> Cancel</button></a>
							</div>
						</form>
					</div>
				</div>
			</section>
			<!-- /.content -->
		</div>
		<!-- /.content-wrapper -->


