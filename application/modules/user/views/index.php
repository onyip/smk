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
 			<div class="col-md-12">
 				<div class="box">
 					<!-- header box -->
 					<div class="box-header with-border">
 						<h3 class="box-title"><?=$sub?></h3>
 					</div>

 					<!-- box body -->
 					<div class="box-body">

 						<!-- add button -->
 						<div class="btn-group pull-left">
 							<a href="<?=base_url('user/add')?>">
 								<button type="button" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Add User</button>
 							</a>
 							<a href="<?=base_url('user/pdf')?>" target="_blank">
 								<button type="button" class="btn btn-danger btn-sm"><i class="fa fa-file-pdf-o"></i> PDF</button>
 							</a>
 							<a href="<?=base_url('user/export')?>" target="_blank">
 								<button type="button" class="btn btn-success btn-sm"><i class="fa fa-table"></i> Excel</button>
 							</a>
 						</div>

 						<!-- search -->
 						<form action="<?=base_url('user/index')?>" method="post">
 							<div class="input-group pull-right col-xs-3">

 								<input type="text" name="keyword" placeholder="Search Username here..." class="form-control input-sm" autocomplete="off" name="keyword" value="<?= set_value('keyword')?>">

 								<span class="input-group-btn">
 									<input type="submit" class="btn btn-primary btn-sm btn-flat" name="submit" value="Search">
 									<a href="<?=base_url('user/reset')?>"> <button type="button" class="btn btn-sm"><i class="fa fa-refresh" aria-hidden="true"></i></button></a>
 								</span>

 							</div>
 						</form>
 						<br>
 						<br>

 						<table class="table table-bordered table-condensed table-striped">
 							<thead>
 								<tr>
 									<th class="text-center" width="95">No</th>
 									<th class="text-center" width="68">Action</th>
 									<th class="text-center">Name</th>
 									<th class="text-center" width="130">Username</th>
 									<th class="text-center" width="150">Created</th>
 									<th class="text-center" width="150">Group ID</th>
 									<th class="text-center" >Status</th>

 								</tr>
 							</thead>
 							<tbody>
 								<?php foreach($user as $baris): ?>
 									<tr>
 										<td class="text-center"><?=++$start?></td>
 										<td class="text-center">
 											<?php if ($baris->id == 1140029943): ?>

 												<?php else: ?>
 													<a href="<?=base_url('user/update/')?><?=$baris->id?> " class="btn btn-warning btn-xs">
 														<i class="text-center fa fa-pencil-square-o "></i>
 													</a>
 													<a href="<?=base_url('user/delet/')?><?=$baris->id?>" class="btn btn-danger btn-xs del-btn">
 														<i class="fa fa-trash "></i>
 													</a>

 												<?php endif ?>
 											</td>
 											<td><?=$baris->name?></td>
 											<td><?=$baris->username?></td>
 											<td class="text-center"><?=$baris->created?></td>
 											<td class="text-center">
 												<?php foreach ($group as $show): ?>	
 													<?php if ($baris->id_group == $show->id): ?>
 														<label ><?=$show->name?></label>
 													<?php endif ?>
 												<?php endforeach ?>
 												<td class="text-center"><?php if ($baris->is_active == 1): ?>
 												<p class="label label-success">Enable</p>
 												<?php else:?>
 													<p class="label label-warning">Disable</p>
 												<?php endif ?>
 											</td>
 										</tr>
 									<?php endforeach;?>
 								</tbody>
 								<?php if ($user == null): ?>
 									<tbody>
 										<td colspan="99" class="text-center">Data not found!</td>
 									</tbody>
 								<?php endif ?>
 							</table>
 						</div>
 						<div class="box-footer clearfix">
 							<?=$this->pagination->create_links()?>
 							<small class="label label-success">Avaliabe : <?=$total?> Data</small>
 						</div>
 					</div>
 				</div>
 			</div>
 		</section>
 		<!-- /.content -->
 	</div>
 	<!-- /.content-wrapper-->
