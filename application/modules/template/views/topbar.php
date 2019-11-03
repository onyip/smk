<header class="main-header">

  <!-- Logo -->
  <a href="<?=base_url()?>" class="logo">
    <!-- mini logo for sidebar mini 50x50 pixels -->
    <span class="logo-mini"><b><?=$about->abbreviation?></b></span>
    <!-- logo for regular state and mobile devices -->
    <span class="logo-lg"><b><?=$about->application?></b></span>
  </a>

  <!-- Header Navbar -->
  <nav class="navbar navbar-static-top" role="navigation">
    <!-- Sidebar toggle button-->
    <a href="<?=base_url()?>" class="sidebar-toggle" data-toggle="push-menu" role="button">
      <span class="sr-only">Toggle navigation</span>
    </a>
    <!-- Navbar Right Menu -->
    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">   
        <!-- User Account Menu -->
        <li class="dropdown user user-menu">
          <!-- Menu Toggle Button -->
          <a class="dropdown-toggle" data-toggle="dropdown">
            <span class="logo-mini disable"><b><?=$this->session->userdata('name')?></b></i></span>
            <!-- The user image in the navbar-->
          </a>
        </li>
        <li>
          <a href="<?=base_url('auth/logout')?>" title="Sign out"><i class="fa fa-sign-out"></i></a>
        </li>
      </ul>
    </div>
  </nav>
</header>