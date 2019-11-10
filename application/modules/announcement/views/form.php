<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<?=$this->session->flashdata('pesan') ?>
	<section class="content-header">
		<h1>
			<?=$title?>
		</h1>
	</section>

	<!-- Main content -->
	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="box">
					<div class="box-header">
						<h3 class="box-title"><?=$sub?></h3>
					</div>
					<!-- /.box-header -->
					<form action="<?=base_url("announcement/$action")?>" method="post" >
						<div class="box-body pad">
							<div class="form-group">
								<input type="text" name="title" id="title" placeholder="Enter a title" class="form-control" value="<?php if ($main != NULL) {echo $main->title;} ?>">
								<?php if ($main != NULL): ?>
									<input type="hidden" name="id" value="<?=$main->id?>">
								<?php endif ?>
							</div>
							<textarea id="editor1" name="announcement" rows="10" cols="80" style="margin-top: 20px">
								<?php if ($main != NULL) {echo $main->announcement;} ?>
							</textarea>
						</div>
						<!-- .box contain -->
						<div class="box-footer">
							<div class="pull-right">
								<button type="submit" class="btn btn-sm btn-primary">
									<i class="fa fa-floppy-o"></i> Save
								</button>
								<a href="<?=base_url('announcement')?>">
									<button type="button" class="btn btn-sm btn-danger">
										<i class="fa fa-times" ></i>Cancel
									</button>
								</a>
							</div>
						</div>
					</form>
					<!-- /.box -->
				</div>
				<!-- /.col-->
			</div>
			<!-- ./row -->
		</section>
		<!-- /.content -->
	</div>
	<!-- /.content-wrapper -->
	<script >
		setInterval(function(){ 
			$("#pesan").fadeOut();
		}, 5000);

	</script>
	<script type="text/javascript">
		$(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('editor1')
    //bootstrap WYSIHTML5 - text editor
    $('.textarea').wysihtml5()
})
</script>


