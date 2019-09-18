
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      <?=$title?>
    </h1>
  </section>
  <section class="content container-fluid">
    <div class="row">

      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-aqua">
          <div class="inner">
            <h3><?=$user?></h3>
            <p><?=$usertitle?></p>
          </div>
          <div class="icon">
            <i class="ion ion-ios-person"></i>
          </div>
          <a href="<?=base_url('user')?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-green">
          <div class="inner">
            <h3><?=$student?></h3>
            <p><?=$studenttitle?></p>
          </div>
          <div class="icon">
            <i class="ion ion-ios-contact"></i>
          </div>
          <a href="<?=base_url('student')?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-yellow">
          <div class="inner">
            <h3><?=$class?></h3>
            <p><?=$classtitle?></p>
          </div>
          <div class="icon">
            <i class="ion ion-ios-people"></i>
          </div>
          <a href="<?=base_url('classs')?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      
      <!-- ./col -->
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-red">
          <div class="inner">
            <h3><?=$year?></h3>
            <p><?=$yeartitle?></p>
          </div>
          <div class="icon">
            <i class="ion ion-ios-clock"></i>
          </div>
          <a href="<?=base_url('year')?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
    </div>
  </section>
</div>


