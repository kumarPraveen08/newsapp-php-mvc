  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?=URLROOT?>" class="brand-link text-center">
      <span class="brand-text font-weight-light"><?=SITENAME?></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?=$data['user']['profile_img']?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="mailto:<?=$data['user']['email']?>" class="d-block"><?=$data['user']['name']?></a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="<?=URLROOT?>" class="nav-link<?=breadcrumb()->page == 'dashboard' ? ' active' : ''?>">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <?php 
          $navList = navList();
          $currentPage = breadcrumb()->page;
          $currentController = breadcrumb()->controller;
          foreach($navList as $item) : 
            if($item->permission === 'allowed' || $data['user']['role'] === 'admin') : ?>
              <li class="nav-item">
                <a href="#" class="nav-link<?= $currentPage === strtolower($item->plural) ? ' active' : '' ?>">
                  <i class="nav-icon fas fa-<?=$item->icon?>"></i>
                  <p>
                    <?=$item->singular?>
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="<?=URLROOT.$item->spath?>" class="nav-link<?=$currentController === 'add' && $currentPage === strtolower($item->plural) ? ' active' : ''?>">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Add New <?=$item->singular?></p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="<?=URLROOT.$item->ppath?>" class="nav-link<?=$currentController !== 'add' && $currentPage === strtolower($item->plural) ? ' active' : ''?>">
                      <i class="far fa-circle nav-icon"></i>
                      <p>All <?=$item->plural?></p>
                    </a>
                  </li>
                </ul>
              </li>
            <?php endif;
          endforeach; ?>
          <li class="nav-item">
            <a href="<?=URLROOT?>/profile" class="nav-link<?=breadcrumb()->page == 'profile' ? ' active' : ''?>">
              <i class="nav-icon fas fa-at"></i>
              <p>
                Profile
                <span class="right badge badge-danger">New</span>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?=URLROOT?>/profile/logout" class="nav-link">
              <i class="nav-icon fas fa-times"></i>
              <p>Logout</p>
            </a>
          </li>
        </ul>
      </nav>
    </div>
  </aside>
