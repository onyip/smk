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
 					<a href="<?=base_url('menu/addmenu')?>">
 						<li class="btn btn-primary btn-md pull-left"><i class="fa fa-plus" aria-hidden="true"></i> Add Menu</li>
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
 				<table class="table table-bordered table-condensed table-striped">
 					<thead>
 						<tr>
 							<th class="text-center" width="95">ID</th>
 							<th class="text-center" width="68">Action</th>
 							<th class="text-center" width="75">Parent</th>
 							<th class="text-center" width="65">Type</th>
 							<th class="text-center" >Name</th>
 							<th class="text-center" >Controller</th>
 							<th class="text-center" >URL</th>
 							<th class="text-center" width="20">Icon</th>
 							<th class="text-center" width="50">Status</th>
 						</tr>
 					</thead>
 					<tbody>
 						<?php foreach($menu as $baris): ?>
 							<tr>
 								<td class="text-center"><?=$baris['id']?></td>
 								<td class="text-center">
 									<a href="<?=base_url('menu/updatemenu/')?><?=$baris['id']?>" class="btn btn-xs btn-warning">
 										<i class="fa fa-pencil-square-o"></i>
 									</a>

 									<a href="<?=base_url('menu/deletmenu/')?><?=$baris['id']?>" class="btn btn-xs btn-danger del-btn ">
 										<i class="fa fa-trash"></i>
 									</a>
 								</td>
 								<td class="text-center"><?=$baris['parent']?></td>
 								<td class="text-center">
 									<?php if ($baris['type'] == 1): ?>
 										<label>Menu</label>
 										<?php else: ?>
 											<label>Header</label>
 										<?php endif ?>
 									</td>

 									<td><?=$baris['name']?></td>
 									<td><?=$baris['controller']?></td>
 									<td ><?php 
 									$url=base_url();
 									$bar=$baris['url'];
 									echo $url."$bar"?></td>
 									<td class="text-center"><i class="<?=$baris['icon']?>"></i></td>
 									<td><?php if ($baris['is_active'] == 1): ?>
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

 			<div class="box-footer clearfix">
 				<?=$this->pagination->create_links()?>
 				<h4>Avaliabe : <?=$total?> Data</h4>
 			</div>

 		</div>
 	</section>
 	<!-- /.content -->
 </div>
	<!-- /.content-wrapper