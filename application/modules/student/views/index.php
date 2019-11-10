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
 						<div class="box-tools pull-right">
 							<form action="<?=base_url('student/index')?>" method="post">
 								<div class="input-group pull-right col-xs-3">
 									<input type="text" name="keyword" placeholder="Search student here..." class="form-control input-sm" autocomplete="off" name="keyword" value="<?= set_value('keyword')?>">

 									<span class="input-group-btn">
 										<input type="submit" class="btn btn-primary btn-sm btn-flat" name="submit" value="Search">
 										<a href="<?=base_url('student/reset')?>"> <button type="button" class="btn btn-sm"><i class="fa fa-refresh" aria-hidden="true"></i></button></a>
 									</span>

 								</div>
 							</form>
 						</div>
 					</div>

 					<!-- box body -->
 					<div class="box-body">

 						<!-- add button -->
 						<div class="btn-group col-md-6 " >
 							<a href="<?=base_url('student/add')?>">
 								<button type="button" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Add Student</button>
 							</a>

 							<a href="<?=base_url('student/export')?>" target="_blank">
 								<button type="button" class="btn btn-success btn-sm"><i class="fa fa-table"></i> Excel</button>
 							</a>
 							<a href="<?=base_url('student/delet_by_class')?>" class="del-btn">
 								<button type="button" class="btn btn-danger btn-sm"><i class="fa fa-times"></i> Clear Data Class</button>
 							</a>
 						</div>

 						<!-- search -->
 						<div class="">
 							<form action="<?=base_url('student/index')?>" method="post">
 								<div class="input-group col-md-6" >


 									<select class="form-control select2 cls" style="width: 49%;" name="class">
 										<option value="">Class</option>
 										<?php foreach ($class as $cls): ?>
 											<option 
 											<?php if ($this->session->userdata('by_class') == $cls->id): ?>
 												selected
 											<?php endif ?>
 											value="<?=$cls->id?>" ><?=$cls->name?></option>
 										<?php endforeach ?>
 									</select>



 									<select class="form-control select2 per" style="width: 49%;" name="period">
 										<option value="">Period</option>
 										<?php foreach ($year as $period): ?>
 											<option 
 											<?php if ($this->session->userdata('by_period') == $period->id): ?>
 												selected
 											<?php endif ?>
 											value="<?=$period->id?>"><?=$period->year?></option>
 										<?php endforeach ?>
 									</select>

 								</div>
 							</form>
 						</div>
 						<div class="table-responsive no-padding"><br>
 							<table class="table table-bordered table-condensed table-striped table-hover" style="padding: 50px;">
 								<thead>
 									<tr>
 										<th class="text-center" width="10">No</th>
 										<th class="text-center" width="68">Action</th>
 										<th class="text-center" width="130">NIS</th>
 										<th class="text-center" >Full Name</th>
 										<th class="text-center" width="150">Class</th>
 										<th class="text-center" width="150">Period</th>
 										<th class="text-center" width="50">Ijazah</th>


 									</tr>
 								</thead>
 								<tbody>
 									<?php $no = 1; foreach($student as $baris): ?>
 									<tr>
 										<td class="text-center"><?=$no++?></td>
 										<td class="text-center">

 											<a href="<?=base_url('student/update/')?><?=$baris->id?> " class="btn btn-warning btn-xs">
 												<i class="text-center fa fa-pencil-square-o "></i>
 											</a>
 											<a href="<?=base_url('student/delet/')?><?=$baris->id?>" class="btn btn-danger btn-xs del-btn">
 												<i class="fa fa-trash "></i>
 											</a>

 										</td>
 										<td class="text-center"><?=$baris->nis?></td>
 										<td><?=$baris->name?></td>
 										<td class="text-center"><?=$baris->c?></td>
 										<td class="text-center"><?=$baris->y?></td>
 										<td class="text-center">
 											<?php if ($baris->ijasah != null): ?>
 												<a href="<?=base_url("assets/ijazah/$baris->ijasah")?>" target="_blank">
 													<button class="btn btn-info btn-xs">
 														<i class="fa fa-eye"></i>
 													</button>
 												</a>
 											<?php endif ?>
 										</td>
 									</tr>
 								<?php endforeach;?>
 							</tbody>
 							<?php if ($student == null): ?>
 								<tbody>
 									<td colspan="99" class="text-center">Data not found!</td>
 								</tbody>
 							<?php endif ?>
 						</table>
 					</div>
 				</div>
 				<div class="box-footer clearfix">
 						<!-- <?=$this->pagination->create_links()?>
 						<small class="label label-success">Avaliabe : <?=$total?> Data</small> -->
 					</div>
 				</div>
 			</div>
 		</div>
 	</section>
 	<!-- /.content -->
 </div>
 <!-- /.content-wrapper-->

 <script type="text/javascript">
 	$(document).ready(function() {

 		$('.cls').change(function(){ 
 			var e = $(this).val();
 			var s =window.location = '<?=base_url("student/cls/?cls=")?>' + e;
 		});
 		$('.per').change(function(){ 
 			var e = $(this).val();
 			var s =window.location = '<?=base_url("student/per/?per=")?>' + e;
 		});

 		
 	});    
 </script>
