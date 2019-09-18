<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Main content -->
	<div class="col-md-2"></div>
	<div class="col-md-8">
		<section class="content container-fluid">
			<div class="box">
				<!-- box body -->
				<div class="box-body no-padding">
					<h1 class="text-center"><?=$title?></h1>
					<br>
					<div class="text-center">
						<img class="profile-user-img img-responsive img-circle" src="<?=base_url('assets/img/logo/')?>
						<?php
						if ($app->logo == null) {
							echo "logo.png";
						}
						echo $about->logo; ?>" alt="Photo">
						<br>
						<br>
					</div>
					
					<div class="col-md-12">
						<table class=" table-condensed">

							<tr>
								<td width="150">Name Application</td>
								<td class="text-center" width="20">:</td>
								<td><?=$app->application?></td>
							</tr>
							<tr>
								<td>Singkatan</td>
								<td class="text-center">:</td>
								<td><?=$app->abbreviation?></td>
							</tr>
							<tr>
								<td>Copyright</td>
								<td class="text-center">:</td>
								<td><?=$app->copyright?></td>
							</tr>
							<tr>
								<td>Versi</td>
								<td class="text-center">:</td>
								<td><?=$app->version?></td>
							</tr>
							<tr>
								<td>Information</td>
								<td class="text-center">:</td>
								<td><?=$app->info?></td>
							</tr>

						</table>
						<div class="box-tools">
							<a href="<?=base_url('about/update')?>/<?=$app->id?>">
								<li class="btn btn-primary btn-sm pull-right"><i class="fa fa-pencil" aria-hidden="true"></i> Edit Information</li>
							</a>
							<br>
							<br>
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>
	<!-- /.content -->
</div>
	<!-- /.content-wrapper