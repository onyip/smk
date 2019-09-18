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
		<div class="row">
			<div class="col-md-7">
				<div class="box">
					<!-- header box -->
					<div class="box-header with-border">
						<h3 class="box-title"><?=$sub?></h3>
					</div>

					<!-- box body -->
					<div class="box-body">
						<table class="table table-bordered table-condensed table-striped">
							<thead>
								<tr>
									<th class="text-center" width="95">No</th>
									<th class="text-center" width="68">Action</th>
									<th class="text-center" width="130">Group</th>
									<th class="text-center" width="150">Created</th>
									<th class="text-center" >Status</th>

								</tr>
							</thead>
							<tbody>
								<?php 
								$no= 1;
								foreach($group as $baris): ?>
									<tr>
										<td class="text-center"><?=$no++?></td>
										<td class="text-center">
											<?php if ($baris->id == 1): ?>
											
											<?php else: ?>
												
											<a href="<?=base_url('group/update/')?><?=$baris->id?>" class="btn btn-xs btn-warning">
												<i class="fa fa-pencil-square-o"></i>
											</a>

											<a href="<?=base_url('group/delet/')?><?=$baris->id?>" class="btn btn-xs btn-danger del-btn">
												<i class="fa fa-trash"></i>
											</a>

											<?php endif ?>
										</td>
										<td class="text-center"><?=$baris->name?></td>
										<td class="text-center"><?=$baris->created?></td>
										<td class="text-center"><?php if ($baris->is_active == 1): ?>
										<p class="label label-success">Enable</p>
										<?php else:?>
											<p class="label label-warning">Disable</p>
										<?php endif ?>
									</td>
								</tr>
							<?php endforeach;?>
						</tbody>
					</table>
				</div>
			</div>
		</div>

		<!-- form add group -->
		<div class="col-md-5">
			<div class="box">
				<!-- header box -->
				<div class="box-header with-border">
					<h3 class="box-title">Add Group</h3>
				</div>
				<form action="<?=base_url('group/insert')?>" method="post">
					<div class="box-body">
						<div class="col-md-12">
							<div class="form-group">
								<label>Name Group</label>
								<input type="text" class="form-control" name="name">
							</div>
						</div>
					</div>
					<div class="box-footer">
						<button type="submit" class="btn btn-sm btn-primary">
							<i class="fa fa-floppy-o"></i> Save</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</section>
<!-- /.content -->
</div>
	<!-- /.content-wrapper