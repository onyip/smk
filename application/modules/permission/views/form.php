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
				<h3 class="box-title"><?=$title?></h3>
			</div>

			<!-- box body -->
			<form id="form" class="form-horizontal" action="<?=base_url().$access->controller?>/<?=$action?>" method="post" autocomplete="off">
				<div class="panel-body">
					<input type="hidden" name="id_group" value="<?=$group->id?>">
					<table class="table table-striped table-bordered table-condensed">
						<thead>
							<tr>
								<th class="text-center" width="65">ID</th>
								<th class="text-center">Name Menu</th>
								<th class="text-center" width="80">Access</th>
								<th class="text-center" width="80">Add</th>
								<th class="text-center" width="80">Update</th>
								<th class="text-center" width="80">Delet</th>
							</tr>
						</thead>
						<tbody>
							<?php if ($main != null): ?>
								<?php $i=1;foreach ($main as $row): ?>
								<tr>
									<td class="text-center"><?=$row->id?></td>
									<td>
										<?php 
										for ($j=1; $j < strlen($row->id)-2; $j++) { 
											echo '-';
										};
										?>
										<?=$row->name?>
									</td>
									<td class="text-center">
										<input class="iCheckbox read-<?=$i?>" onclick="check_all_row('<?=$i?>')" type="checkbox" name="_read[]" value="<?=$row->id?>" <?php if($row->_read == 1){echo 'checked';}?>>
									</td>
									<td class="text-center">
										<input class="iCheckbox create-<?=$i?>" type="checkbox" name="_create[]" value="<?=$row->id?>" <?php if($row->_create == 1){echo 'checked';}?>>
									</td>
									<td class="text-center">
										<input class="iCheckbox update-<?=$i?>" type="checkbox" name="_update[]" value="<?=$row->id?>" <?php if($row->_update == 1){echo 'checked';}?>>
									</td>
									<td class="text-center">
										<input class="iCheckbox delete-<?=$i?>" type="checkbox" name="_delet[]" value="<?=$row->id?>" <?php if($row->_delet == 1){echo 'checked';}?>>
									</td>
								</tr>
								<?php $i++;endforeach; ?>
								<?php else: ?>
									<tr>
										<td class="text-center" colspan="99">Data not found</td>
									</tr>
								<?php endif; ?>
							</table>
						</div>

						<div class="box-footer">
							<button type="submit" class="btn btn-sm btn-primary">
								<i class="fa fa-floppy-o"></i> Save
							</button>
							<a href="<?=base_url('permission')?>">
								<button type="button" class="btn btn-sm btn-danger">
									<i class="fa fa-times"></i> Cancel
								</button>
							</a>
						</div>
					</form>

				</div>
			</section>
			<!-- /.content -->
		</div>
		<!-- /.content-wrapper -->



