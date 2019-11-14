<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="icon" type="image/png" href="<?=base_url('assets/img/logo/')?><?=$about->logo?>">
  <title><?=$about->abbreviation?> | <?=$about->application?></title>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=Edge">
  <meta name="description" content="">
  <meta name="keywords" content="">
  <meta name="team" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

  <link rel="stylesheet" href="<?=base_url('a_public/')?>css/bootstrap.min.css">
  <link rel="stylesheet" href="<?=base_url('a_public/')?>css/owl.carousel.css">
  <link rel="stylesheet" href="<?=base_url('a_public/')?>css/owl.theme.default.min.css">
  <link rel="stylesheet" href="<?=base_url('a_public/')?>css/font-awesome.min.css">

  <!-- MAIN CSS -->
  <link rel="stylesheet" href="<?=base_url('a_public/')?>css/tooplate-style.css">
  <style type="text/css">
    footer {
      position: fixed;
      bottom: 0;
      height: 0px;
      width: 100%;
      padding-bottom: 30px;
      padding-top: 10px;
    }

    .ann{
      position: absolute;
      top: 9px;
      right: 7px;
      text-align: center;
      font-size: 9px;
      padding: 2px 3px;
      line-height: .9;
      /*color: yellow;*/
    }
  </style>

</head>
<body>

 <!-- PRE LOADER -->
 <section class="preloader">
  <div class="spinner">
   <span class="spinner-rotate"></span>
 </div>
</section>

<!-- MENU -->
<section class="navbar custom-navbar navbar-fixed-top" role="navigation">
  <div class="container">
   <div class="navbar-header">
    <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
     <span class="icon icon-bar"></span>
     <span class="icon icon-bar"></span>
     <span class="icon icon-bar"></span>
   </button>

   <!-- lOGO TEXT HERE -->
   <a href="" class="navbar-brand"><?=$about->abbreviation?></a>
 </div>
 <div class="collapse navbar-collapse">
  <ul class="nav navbar-nav navbar-right">
    <li id="nat">
    <a href="<?=base_url('searceh/')?>#ann">
      <i title="pengumuman" class="fa fa-bell-o"></i>
      <?php if ($ann_tot >= 1): ?>
        <span class="label label-warning ann"><?=$ann_tot?></span>
      <?php endif ?>
    </a>
  </li>
  <?php if ($this->session->userdata('status') != 'logined'): ?>
   <li><a class="nav-item" href="<?=base_url('auth')?>">Login <i class="fa fa-sign-in"></i></a></li>
   
   <?php else: ?>

     <li><a class="nav-item" href="<?=base_url('auth')?>"><?=$this->session->userdata('name')?></a></li>
     <li><a class="nav-item" href="<?=base_url('auth/logout')?>">Logout <i class="fa fa-sign-out"></i></a></li>
   <?php endif ?>
 </ul>
</div>
</div>
</section>


<!-- FEATURE -->
<section id="home" data-stellar-background-ratio="0.5">
  <div class="overlay"></div>
  <div class="container">

   <div class="col-md-offset-3 col-md-6 col-sm-12" >
    <div class="home-info" >
     <h3>Welcome to</h3>
     <h1><?=$about->application?></h1>
     <form action="" method="get" class="online-form">
      <input type="text" href="#feature" id="keyword" name="" class="form-control" placeholder="Masukan NIS atau Nama Siswa">
    </form>
  </div>
</div>

</div>
</section>


<!-- FEATURE -->
<section id="feature" data-stellar-background-ratio="0.5" class="active">
  <div class="container">

   <div class="col-md-offset-3 col-md-6 col-sm-12" >
    <form action="" method="get" class="online-form">
     <input type="text" name="search" class="form-control search" placeholder="Masukan NIS atau Nama Siswa" style="border-color:#dbdbe1;">
   </form><br><br><br>
 </div>
 <div id="isi" class=" col-md-12 col-sm-12">

 </div>

</div>
</section>

<!-- FEATURE -->
<?php if ($ann_tot >= 1): ?>

  <section id="ann" data-stellar-background-ratio="0.5" class="active">
    <div class="container">
      <div class="col-md-offset-3 col-md-6 col-sm-12" >
        <h1 class="text-center">PENGUMUMAN !</h1>
      </div>
      <div class="col-md-12 col-sm-12">
        <?php foreach ($ann as $k): ?>
          <?php if ($k->is_active == 1): ?>
            <h3 class="text-center"><b><?=$k->title?></b></h3>
            <p><?=$k->announcement?></p>
            <br>
          <?php endif ?>
        <?php endforeach ?>

      </div>

    </div>
  </section>
<?php endif ?>

<!-- FOOTER -->
<footer id="footer  ">

  <div class="col-md-12 col-sm-12 ">
   <div >
    <p>Copyright &copy; <?= date("Y") ?> <?=$about->copyright?> - Created_by: A N R</p>
  </div>
</div>

</footer>


<!-- SCRIPTS -->
<script src="<?=base_url('a_public/')?>js/jquery.js"></script>
<script src="<?=base_url('a_public/')?>js/bootstrap.min.js"></script>
<script src="<?=base_url('a_public/')?>js/jquery.stellar.min.js"></script>
<script src="<?=base_url('a_public/')?>js/owl.carousel.min.js"></script>
<script src="<?=base_url('a_public/')?>js/smoothscroll.js"></script>
<script src="<?=base_url('a_public/')?>js/custom.js"></script>
     <!-- <script type="text/javascript">
          default();
          function default() {
               $('#feature').hide();
          }
        </script> -->

        <script type="text/javascript">

          $(document).ready(function() {
           $('#keyword').click(function() {
            window.location = '#feature';
            $('#home').hide();
            $('#ann').hide();
            $('#nat').hide();

            $('#feature').show();
            $(".search").focus();
          });

           $('.search').on('keyup', function() {
            $('#isi').load('<?=base_url("searceh/livesrc?keyword=")?>' + $('.search').val());
          });


         });    

       </script>

     </body>
     </html>