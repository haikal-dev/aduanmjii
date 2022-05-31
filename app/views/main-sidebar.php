<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?=$url?>" class="brand-link">
      <img src="<?=$url?>/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">AduanMJII <?=$short_version?></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <!--
		  <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
		  -->
        </div>
        <div class="info">
          <a href="#" class="d-block">Current Version: <span class="badge badge-primary"><?=$version?></span></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="<?=$url?>" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Reports
                <i class="fas fa-angle-left right"></i>
                <!-- <span class="badge badge-info right">6</span> -->
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?=$url?>/report/create" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Create Report / Issues</p>
                </a>
              </li>
			  <li class="nav-item">
            <a href="<?=$url?>/report/whatsapp" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Contact Technical Team</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?=$url?>/issue/show/all" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Issues</p>
            </a>
          </li>
        </ul>
      </li>
		  <li class="nav-item">
			<a href="<?=$url?>/admin" class="nav-link">
				<i class="nav-icon fas fa-sign-in-alt"></i>
				<p>
					Admin
				</p>
			</a>
		  </li>
      <li class="nav-item">
			<a href="<?=$url?>/changelog" class="nav-link">
				<i class="nav-icon fas fa-archive"></i>
				<p>
					Version Update
				</p>
			</a>
		  </li>
		  <li class="nav-item">
			<a href="https://node.my" target="_blank" class="nav-link">
				<i class="nav-icon fas fa-atom"></i>
				<p>
					About NODE
				</p>
			</a>
		  </li>
      <li class="nav-item">
			<a href="https://node.my/donate" target="_blank" class="nav-link">
				<p>
					Donate<br/>
          <small>For Maintenance / System Upgrade</small>
				</p>
			</a>
		  </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>