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
				<form action="<?=base_url('menu/editmenu')?>" method="post">
					<div class="box-body">
						<div class="col-md-12">
							<input type="hidden" name="update" value="<?=$menu->id?>">
							<div class="form-group">
								<label>Parent</label><br>
								
								<small class="text-danger">If the menu does not have a parent, please select blank</small>

								<select class="form-control" name="parent">
									<option value="">--select--</option>
									<?php foreach ($parent as $option): ?>
										<option value="<?=$option->id?>"
											<?php if ($menu->parent == $option->id){echo "selected";}?>>
											<?=$option->id?> (<?=$option->name?>)</option>
										<?php endforeach ?>
									</select>
								</div>


								<div class="form-group">
									<label>Type</label>
									<select class="form-control" name="type">
										<?php if ($menu->type == 1): ?>
										<option value="1" selected="">Menu</option>
										<option value="2">Header</option>
										<?php else: ?>
										<option value="1">Menu</option>
										<option value="2" selected="">Header</option>	
										<?php endif ?>
									</select>
								</div>

								<div class="form-group">
									<label>ID</label>
									<input type="text" class="form-control" name="id" value="<?=$menu->id?>">
								</div>

								<div class="form-group">
									<label>Name Menu</label>
									<input type="text" class="form-control" name="name" value="<?=$menu->name?>">
								</div>

								<div class="form-group">
									<label>Controller</label>
									<input type="text" class="form-control" name="controller" value="<?=$menu->controller?>">
								</div>

								<div class="form-group">
									<label>Icon</label>
									<input type="text" class="form-control" name="icon" value="<?=$menu->icon?>">
								</div>

								<div class="form-group">
									<label>Url</label>
									<input type="text" class="form-control" name="url" value="<?=$menu->url?>">
								</div>

								<div class="form-group">
									<?php if ($menu->is_active == 1): ?>
										<input type="checkbox" name="is_active" value="<?=$menu->is_active?>" checked> Enable
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
								<a href="<?=base_url('menu')?>">
									<button type="button" class="btn btn-sm btn-danger">
										<i class="fa fa-times" ></i>Cancel
									</button></a>
							</div>
						</form>
					</div>
				</div>
			</section>
			<!-- /.content -->
		</div>
		<!-- /.content-wrapper -->


