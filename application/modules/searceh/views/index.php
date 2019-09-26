<!DOCTYPE html>
<html lang="en">
<head>

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
                         <li><a href="<?=base_url('auth')?>">Login <i class="fa fa-sign-in"></i></a></li>
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
                         <input type="text" name="" class="form-control search" placeholder="Masukan NIS atau Nama Siswa" style="border-color:#dbdbe1;">
                    </form><br>
               </div>
               <div id="isi">

               </div>

          </div>
     </section>

     <!-- FOOTER -->
     <footer id="footer  ">

          <div class="col-md-12 col-sm-12 " style="padding-top: 25px">
               <div >
                    <p>Copyright &copy; <?= date("Y") ?> <?=$about->copyright?> - Created_by: Alif N R</p>
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

                    $('#feature').show();
                    document.getElementById('.search').focus();
               });

               $('.search').on('keyup', function() {
                    $('#isi').load('<?=base_url("searceh/livesrc?keyword=")?>' + $('.search').val());
               });


          });    

     </script>

</body>
</html>