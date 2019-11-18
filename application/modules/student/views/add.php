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
				<div class="row">
					<div class="col-md-6">
						<form action="<?=base_url('student/insert')?>" method="post" enctype="multipart/form-data">

							<div class="form-group">
								<label>NIS</label>
								<input type="number" class="form-control" placeholder="NIS" name="nis">
							</div>
							<div class="form-group">
								<label>Full Name</label>
								<input type="text" class="form-control" placeholder="Full Name" name="name">
							</div>
							<div class="form-group">
								<label>Tanggal Lahir</label>
								<input type="text" class="form-control" name="tgl_lahir" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask>
							</div>
							
							<div class="row">
								<div class="form-group col-md-6">
									<label>Class</label>
									<select class="form-control select2" name="class">
										<option value="">Select Class</option>
										<?php foreach ($class as $cls): ?>
											<option value="<?=$cls->id?>"><?=$cls->name?></option>
										<?php endforeach ?>
									</select>
								</div>

								<div class="form-group col-md-6">
									<label>Periode</label>
									<select class="form-control select2" name="period">
										<option value="">Select Period</option>
										<?php foreach ($year as $period): ?>
											<option value="<?=$period->id?>"><?=$period->year?></option>
										<?php endforeach ?>
									</select>
								</div>
							</div>
							
							<div class="form-group">
								<label>Ijazah</label><br>
								<small class="text-info">* Please select file on PDF format max size 1 MB</small>
								<input type="file" name="ijasah">
								<input type="hidden" name="last-pdf">
							</div><br>

							<div class="pull-right">

								<div class="btn-group ">
									<button type="submit" class="btn btn-primary btn-sm pull-right"><i class="fa fa-floppy-o"></i> Save</button>
								</div>

								<div class="btn-group ">
									<a href="<?=base_url('student')?>">
										<button type="button" class="btn btn-danger btn-sm pull-right" data-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
									</a>
								</div>

							</div>
						</form>
					</div>

					<div class="col-md-6">
						<h3 class="text-center"><b>Import</b></h3>
						<small>Download import form here!</small><br>
						<a  href="<?=base_url('student/get_form')?>" target="_blank">
							<button class="btn btn-sm btn-info"><i class="fa fa-cloud-download"></i> Dowenload</button>
						</a>
						<br><br><br>
						<form action="<?=base_url('student/inport')?>" method="post" enctype="multipart/form-data">

							<div class="form-group">
								<label>Import File</label>
								<input type="file" name="excel">
							</div>
							<div class="row">
								<div class="form-group col-md-6">
									<label>Class</label>
									<select class="form-control select2" name="class" required>
										<option value="">Select Class</option>
										<?php foreach ($class as $cls): ?>
											<option value="<?=$cls->id?>"><?=$cls->name?></option>
										<?php endforeach ?>
									</select>
								</div>

								<div class="form-group col-md-6">
									<label>Periode</label>
									<select class="form-control select2" name="period" required>
										<option value="">Select Period</option>
										<?php foreach ($year as $period): ?>
											<option value="<?=$period->id?>"><?=$period->year?></option>
										<?php endforeach ?>
									</select>
								</div>
							</div>


							<div class="form-group">
								<button type="submit" name="submit" class="btn btn-sm btn-primary"><i class="fa fa-upload"></i> Import</button>
							</div>
						</form>
					</div>

				</div>
			</div>
		</div>
	</section>
	<!-- /.content -->
</div>
<!-- /.content-wrapper -->