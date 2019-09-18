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
 						<!-- search -->
 						<form action="<?=base_url('classs/index')?>" method="post">
 							<div class="input-group pull-right col-xs-5">

 								<input type="text" name="keyword" placeholder="Search class here..." class="form-control input-sm" autocomplete="off" name="keyword" value="<?= set_value('keyword')?>">
 								<input type="hidden" name="submit">

 								<span class="input-group-btn">
 									<input type="submit" class="btn btn-primary btn-sm btn-flat" name="submit">
 									<a href="<?=base_url('classs/reset')?>">
 										<button type="button" class="btn btn-sm"><i class="fa fa-refresh" aria-hidden="true"></i></button>
 									</a>
 								</span>

 							</div>
 						</form>
 						<br>
 						<br>

 						<table class="table table-bordered table-condensed table-striped">
 							<thead>
 								<tr>
 									<th class="text-center" width="50px">No</th>
 									<th class="text-center" width="80px">Action</th>
 									<th class="text-center" width="">Class</th>
 								</tr>
 							</thead>
 							<tbody>
 								<?php 
 								$no= 1;
 								foreach($class as $baris): ?>
 									<tr>
 										<td class="text-center"><?=++$start?></td>
 										<td class="text-center">
 											<?php if ($baris->id == 1): ?>

 												<?php else: ?>

 													<a href="<?=base_url('classs/index/')?><?=$baris->id?>" class="btn btn-xs btn-warning ">
 														<i class="fa fa-pencil-square-o"></i>
 													</a>

 													<a href="<?=base_url('classs/delet/')?><?=$baris->id?>" class="btn btn-xs btn-danger del-btn">
 														<i class="fa fa-trash"></i>
 													</a>

 												<?php endif ?>
 											</td>
 											<td class="text-center"><?=$baris->name?></td>
 										</td>
 									</tr>
 								<?php endforeach;?>
 							</tbody>
 							<?php if ($class == null): ?>
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
 			<?php if ($update != null): ?>

 				<!-- form uodate class -->
 				<div class="col-md-5">
 					<div class="box">
 						<!-- header box -->
 						<div class="box-header with-border">
 							<h3 class="box-title">Update Class</h3>
 						</div>
 						<form action="<?=base_url('classs/edit')?>" method="post">
 							<div class="box-body">
 								<div class="col-md-12">
 									<div class="form-group">
 										<label>Name Class</label>
 										<input type="hidden" name="id" value="<?=$update->id?>">
 										<input type="text" class="form-control" name="name" autofocus="on" value="<?=$update->name?>" >
 									</div>
 								</div>
 							</div>
 							<div class="box-footer">
 								<div class="pull-right ">
 									<button type="submit" class="btn btn-sm btn-primary"><i class="fa fa fa-upload"></i> Update</button>

 									<a href="<?=base_url('classs')?>">
 										<button type="button" class="btn btn-sm btn-danger"><i class="fa fa fa-times"></i> Cancel</button>
 									</a>

 								</div>
 							</div>
 						</form>
 					</div>
 				</div>

 			<?php endif ?>

 			<!-- form add class-->
 			<div class="col-md-5">
 				<div class="box">
 					<!-- header box -->
 					<div class="box-header with-border">
 						<h3 class="box-title">Add Class</h3>
 					</div>
 					<form action="<?=base_url('classs/insert')?>" method="post">
 						<div class="box-body">
 							<div class="col-md-12">
 								<div class="form-group">
 									<label>Name Class</label>
 									<input type="text" class="form-control" name="name">
 								</div>
 							</div>
 						</div>
 						<div class="box-footer">
 							<button type="submit" class="pull-right btn btn-sm btn-primary"><i class="fa fa-floppy-o"></i> Save	</button>
 						</div>
 					</form>
 				</div>
 			</div>



 		</div>
 	</section>
 	<!-- /.content -->
 </div>
	<!-- /.content-wrapper