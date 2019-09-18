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
					<h3 class="box-title"><?=$sub?></h3>
				</div>

				<!-- box body -->
				<form action="<?=base_url('group/edit')?>" method="post">
					<div class="box-body">
						<div class="col-md-12">
							<input type="hidden" name="id" value="<?=$group->id?>">

							<div class="form-group">
								<label>Name Group</label>
								<input type="text" class="form-control" name="name" value="<?=$group->name?>">
							</div>

							<div class="form-group">
								<?php if ($group->is_active == 1): ?>
									<input type="checkbox" name="is_active" value="<?=$group->is_active?>" checked> Enable
									<?php else: ?>
										<input type="checkbox" name="is_active" value="1"> Enable	
									<?php endif ?>
								</div>
							</div>
						</div>
						<!-- /.box-body -->

						<div class="box-footer">
							<button type="submit" class="btn btn-sm btn-primary">
								<i class="fa fa-floppy-o"></i> Save
							</button>
							<a href="<?=base_url('group')?>">
								<button type="button" class="btn btn-sm btn-danger">
								<i class="fa fa-times" ></i> Cancel
								</button>
							</a>
						</div>
					</form>
				</div>
			</div>
		</section>
		<!-- /.content -->
	</div>
	<!-- /.content-wrapper -->


