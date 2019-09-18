  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- search form (Optional) -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
            <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
            </button>
          </span>
        </div>
      </form>
      <!-- /.search form -->

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu" data-widget="tree">
        <?php foreach ($sidenav as $lvl1): ?>
          <?php if($lvl1['type'] == 2): ?>
            <li class="header"><i class="<?=$lvl1['icon']?>"></i> <?=$lvl1['name']?></li>
            <?php else:?>
              <li class="
              <?php 
              if(count($lvl1['child']) > 0){
                echo 'treeview ';
                foreach ($lvl1['child'] as $lvl2) {
                  echo active_menu($lvl2['controller']);
                  if($lvl2['child'] > 0){
                    foreach ($lvl2['child'] as $lvl3) {
                      echo active_menu($lvl3['']);
                    }
                  }
                };
                }else{
                  echo active_menu($lvl1['controller']);
                }
                ?>
                ">
                <a href="<?php echo base_url();if(count($lvl1['child']) > 0){echo '#';}else{echo $lvl1['url'];}?>">
                  <i class="<?=$lvl1['icon']?>"></i> <span><?=$lvl1['name']?></span>
                  <?php if(count($lvl1['child']) > 0):?>
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  <?php endif;?>
                </a>
                <?php if(count($lvl1['child']) > 0):?>
                  <ul class="treeview-menu">
                    <?php foreach ($lvl1['child'] as $lvl2): ?>  
                      <li class="<?php if(count($lvl2['child']) > 0){echo 'treeview ';foreach ($lvl2['child'] as $lvl3) {echo active_menu($lvl3['controller']);};}else{echo active_menu($lvl2['controller']);}?>">
                        <a href="<?php echo base_url();if(count($lvl2['child']) > 0){echo '#';}else{echo $lvl2['url'];}?>">
                          <i class="<?=$lvl2['icon']?>"></i> <span><?=$lvl2['name']?></span>
                          <?php if(count($lvl2['child']) > 0):?>
                            <span class="pull-right-container">
                              <i class="fa fa-angle-left pull-right"></i>
                            </span>
                          <?php endif;?>
                        </a>
                        <?php if(count($lvl2['child']) > 0):?>
                          <ul class="treeview-menu">
                            <?php foreach ($lvl2['child'] as $lvl3): ?>
                              <li class="<?php if(count($lvl3['child']) > 0){echo 'treeview ';foreach ($lvl3['child'] as $lvl4) {echo active_menu($lvl4['controller']);};}else{echo active_menu($lvl3['controller']);}?>">
                                <a href="<?php echo base_url();if(count($lvl3['child']) > 0){echo '#';}else{echo $lvl3['controller'].'/'.$lvl3['url'];}?>"><i class="fa fa-circle-o"></i> <?=$lvl3['name']?></a>
                              </li>
                            <?php endforeach;?>
                          </ul>
                        <?php endif;?>
                      </li>
                    <?php endforeach;?>
                  </ul>
                <?php endif;?>
              </li>
            <?php endif;?>
          <?php endforeach;?>
        </ul>
        <!-- /.sidebar-menu -->
      </section>
      <!-- /.sidebar -->
    </aside>