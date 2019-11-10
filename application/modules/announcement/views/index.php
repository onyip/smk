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
 				<!-- add button -->
 				<div class="box-tools">
 					<a href="<?=base_url('announcement/form')?>">
 						<li class="btn btn-primary btn-md pull-left"><i class="fa fa-plus" aria-hidden="true"></i> Add Announcement</li>
 					</a>
 				</div>

 				<!-- search -->
 				<form action="<?=base_url('menu/index')?>" method="post">
 					<div class="input-group pull-right col-xs-3">

 						<input type="text" name="keyword" placeholder="Search menu here..." class="form-control input-sm" autocomplete="off" name="keyword" value="<?= set_value('keyword')?>">

 						<span class="input-group-btn">
 							<input type="submit" class="btn btn-sm btn-primary btn-flat" name="submit" value="Search">
 							<a href="<?=base_url('user/reset')?>"> <button type="button" class="btn btn-sm"><i class="fa fa-refresh" aria-hidden="true"></i></button></a>
 						</span>

 					</div>
 				</form>
 				<br>
 				<br>
 				<div class="table-responsive">
 					<table class="table table-bordered table-condensed table-striped">
 						<thead>
 							<tr>
 								<th class="text-center" width="95">No</th>
 								<th class="text-center" width="68">Action</th>
 								<th class="text-center" >Title</th>
 								<th class="text-center" width="50">Status</th>
 							</tr>
 						</thead>
 						<tbody>
 							<?php $i = 1; foreach($main as $baris): ?>
 							<tr>
 								<td class="text-center"><?=$i++?></td>
 								<td class="text-center">
 									<a href="<?=base_url('announcement/form/')?><?=$baris->id?>" class="btn btn-xs btn-warning">
 										<i class="fa fa-pencil-square-o"></i>
 									</a>

 									<a href="<?=base_url('announcement/delet/')?><?=$baris->id?>" class="btn btn-xs btn-danger del-btn ">
 										<i class="fa fa-trash"></i>
 									</a>
 								</td>
 								<td class=""><?=$baris->title?></td>

 								<td class="text-center">
 									<?php if ($baris->is_active == 1): ?>
 										<a href="<?=base_url('announcement/ganti/dis/')?><?=$baris->id?>">
 											<i class="badge bg-green">Enable</i>
 										</a>
 										<?php else:?>
 											<a href="<?=base_url('announcement/ganti/ena/')?><?=$baris->id?>">
 												<i class="badge bg-yellow">Disable</i>
 											</a>
 										<?php endif ?>
 									</td>
 								</tr>
 							<?php endforeach;?>
 						</tbody>
 					</table>
 				</div>
 			</div>
 			<div class="box-footer">
 			</div>
 		</div>

 	</section>
 	<!-- /.content -->
 </div>
 <!--  /.content-wrapper -->
