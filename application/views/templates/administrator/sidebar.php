	
  <!-- partial -->
      <div class="container-fluid page-body-wrapper">
	<!-- partial:partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">
            <li class="nav-item nav-profile">
              <a href="#" class="nav-link">
                <div class="nav-profile-image">
                  <img src="<?= base_url('assets/image/users/'.$user['image']);?>" alt="profile" style="border-radius:50%;">
                  <span class="login-status online"></span>
                  <!--change to offline or busy as needed-->
                </div>
                <div class="nav-profile-text d-flex flex-column">
                  <span class="font-weight-bold mb-2"><?= ucwords($user['firstname']);?></span>
                  <?php foreach($role as $r):?>
                    <span class="text-secondary text-small"><?= $r['role'];?></span>
                  <?php endforeach; ?>
                </div>
                <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
              </a>
            </li>


            <!-- QUERY MENU -->
              <?php 
                $role_id = $this->session->userdata('role_id');
                $queryMenu = "SELECT `user_menu`.`id`, `menu`
                              FROM `user_menu` JOIN `user_access_menu`
                              ON `user_menu`.`id` = `user_access_menu`.`menu_id`
                              WHERE `user_access_menu`.`role_id` = $role_id
                              ORDER BY `user_access_menu`.`menu_id` ASC
                ";

                $menu = $this->db->query($queryMenu)->result_array();
              ?>
            <!-- END QUERY MENU -->


            <!-- LOOPING MENU -->
              <?php   foreach($menu as $m): ?>
                <div class="divider">
                  <li class="nav-item">
                      
                  </li>
                </div>
                
            <!-- END LOOPING MENU -->


            <!-- QUERY SUB MENU -->
              <?php    
                $menuId = $m['id'];
                $querySubMenu = "SELECT * FROM `user_sub_menu`
                                 WHERE `menu_id` = $menuId
                                 AND `is_active` = 1
                                  ";
                $subMenu = $this->db->query($querySubMenu)->result_array();
              ?>
                <?php   foreach($subMenu as $sm): ?>
                    <li class="nav-item">
                      <a class="nav-link"href="<?= base_url('').$sm['url'];?>">
                        <span class="menu-title title"><?= $sm['title'];?></span>
                        
                        <i class="<?= $sm['icon'];?>"></i>
                      </a>
                    </li>
                       

                <?php endforeach;?>
                <div class="dropdown-divider"><hr></div>    
              <?php endforeach;?>
            <!-- END SUBMENU -->
            
                  <div class="nav-item" id="general-pages">
                  <a class="nav-link"  aria-expanded="false" href="<?= base_url('auth/logout');?>" aria-controls="general-pages">
                  <span class="menu-title">Log out</span>
                  <i class="mdi mdi-logout mr-2 text-primary  menu-icon"></i>
                </a>
              </div>
            
          </ul> 
        </nav>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="row">
              <div class="col-lg-12 col-md-6">