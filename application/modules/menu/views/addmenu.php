<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<?=$this->session->flashdata('pesan') ?>
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
					<h3 class="box-title"><?=$sub?></h3>
				</div>

				<!-- box body -->
				<div class="box-body">
					<form action="<?=base_url('menu/insertmenu')?>" method="post">
						<div class="box-body">
							<div class="col-md-12">

								<div class="form-group">
									<label>Parent</label><br>
									<small class="text-danger">If the menu does not have a parent, please select blank</small>
									<select class="form-control" name="parent">
										<option value="">--select--</option>
										<?php foreach ($parent as $option): ?>
											<option value="<?=$option->id?>"><?=$option->id?> => <?=$option->name?></option>
										<?php endforeach ?>
									</select>
								</div>

								<div class="form-group">
									<label>ID</label>
									<input type="text" class="form-control" name="id">
								</div>

								<div class="form-group">
									<label>Type</label>
									<select class="form-control" name="type">
										<option value="1">Menu</option>
										<option value="2">Header</option>
									</select>
								</div>

								<div class="form-group">
									<label>Name Menu</label>
									<input type="text" class="form-control" name="name">
								</div>

								<div class="form-group">
									<label>Controller</label>
									<input type="text" class="form-control" name="controller">
								</div>

								<div class="form-group">
									<label>Icon</label>
									<input type="text" class="form-control" name="icon">
								</div>

								<div class="form-group">
									<label>Url</label>
									<input type="text" class="form-control" name="url">
								</div>

							</div>
						</div>
						<!-- /.box-body -->

						<div class="box-footer">
							<button type="submit" class="btn btn-sm btn-primary">
								<i class="fa fa-floppy-o"></i> Save
							</button>
							<a href="<?=base_url('menu')?>">
								<button type="button" class="btn btn-sm btn-danger">
									<i class="fa fa-times" ></i>Cancel
								</button>
							</a>
						</div>
					</form>
				</div>
			</div>
		</div>
	</section>
	<!-- /.content -->
</div>
<!-- /.content-wrapper -->
<script >
	setInterval(function(){ 
		$("#pesan").fadeOut();
	}, 5000);

</script>


