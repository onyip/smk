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
      <form action="<?=base_url('user/edit')?>" method="post">
        <div class="box-body">
          <div class="col-md-6">
            <input type="hidden" name="id" value="<?=$user->id?>">

            <div class="form-group">
              <label>Name</label>
              <input type="text" class="form-control" name="name" value="<?=$user->name?>">
            </div>

            <div class="form-group" >
              <label>Username</label>
              <input type="text" class="form-control" name="username" value="<?=$user->username?>"<?php if ($this->session->userdata('id_group') == 3){echo "readonly";}?>>
            </div>
            <?php if ($this->session->userdata('id_group') != 3): ?>
              <div class="form-group">
                <label>Group</label><br>
                <select class="form-control" name="id_group">
                  <option value="">--select--</option>
                  <?php foreach ($group as $option): ?>
                    <option value="<?=$option->id?>"
                      <?php if ($user->id_group == $option->id){echo "selected";}?>>
                      <?=$option->name?></option>
                    <?php endforeach ?>
                  </select>
                </div>

                <div class="form-group">
                  <?php if ($user->is_active == 1): ?>
                    <input type="checkbox" name="is_active" value="<?=$user->is_active?>" checked> Enable
                    <?php else: ?>
                      <input type="checkbox" name="is_active" value="1"> Enable 
                    <?php endif ?>
                  </div>
                <?php endif ?>
              </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
              <div class="pull-right">
                <div class="btn-group">
                  <button type="button" class="btn btn-warning btn-sm pull-right" data-toggle="modal" data-target="#add"><i class="fa fa-pencil-square-o"></i> Change Password</button>
                </div>
                <div class="btn-group">
                  <button type="submit" class="btn btn-primary btn-sm pull-right"><i class="fa fa-floppy-o"></i> Save</button>
                </div>

                <?php if ($this->session->userdata('id_group') != 3): ?>
                  <div class="btn-group ">
                    <a href="<?=base_url('user')?>"><button type="button" class="btn btn-danger btn-sm pull-right"><i class="fa fa-times"></i> Cancel</button></a>
                  </div>
                <?php endif ?>

              </div>
            </div>
          </form>
        </div>
      </section>
    </div>
    <!-- /.content -->
    <!-- /.content-wrapper -->

    <!-- Modal -->
    <div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="col-md-2"></div>
        <div class="col-md-8">
          <div class="modal-content">
            <div class="modal-header">
              <h2 class="modal-title" id="exampleModalLongTitle">Change New Password</h2>
            </div>
            <div class="modal-body">
              <form action="<?=base_url('user/chang_pwd')?>" method="post">

                <input type="hidden" name="id" value="<?=$user->id?>">
                <div class="form-group has-feedback">
                  <input type="password" class="form-control" placeholder="Password" name="password">
                  <span class="fa fa-lock form-control-feedback"></span>
                </div>

                <div class="form-group has-feedback">
                  <input type="password" class="form-control" placeholder="Repassword" name="repassword">
                  <span class="form-control-feedback"></span>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-floppy-o"></i> Save</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>


