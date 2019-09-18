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
			<div class="col-md-9">
				<div class="box">
					<!-- header box -->
					<div class="box-header with-border">
						<h3 class="box-title"><?=$title?></h3>
					</div>

					<!-- box body -->
					<div class="box-body">
						<table class="table table-bordered table-condensed table-striped">
							<thead>
								<tr>
									<th class="text-center" width="95">No</th>
									<th class="text-center" width="68">Option</th>
									<th class="text-center" >Group</th>
									<th class="text-center" width="68">Status</th>

								</tr>
							</thead>
							<tbody>
								<?php 
								$no= 1;
								foreach($group as $baris): ?>
									<tr>
										<td class="text-center"><?=$no++?></td>
										<td class="text-center">
											<a href="<?=base_url('permission/form/')?><?=$baris->id?>"><i class="fa fa-bars" aria-hidden="true"></i></a>
										</td>
										<td class="text-center"><?=$baris->name?></td>
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
	</div>
</section>
<!-- /.content -->
</div>
	<!-- /.content-wrapper