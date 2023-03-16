	<header class="main-header">
        <!-- Logo -->
        <a href="<?php echo HOME_URL; ?>home" class="logo">
            <span class="logo-mini"><img src="custom/img/mini.logo.png" alt="Logo" width="50"></span>
            <span class="logo-lg"><img src="https://learncodeweb.com/wp-content/uploads/2019/01/logo.png" alt="Logo" width="200"></span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
		  <div class="navbar-custom-menu">
			<ul class="nav navbar-nav">
            	<li class="dropdown user user-menu">
                   <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="hidden-xs"><?php echo strtoupper($_SESSION['user']); ?></span></a>
            		<ul class="dropdown-menu">
                      <li class="user-footer">
                        <div class="pull-left">
                          <button type="button" data-toggle="modal" data-target="#changePass" class="btn btn-danger btn-sm btn-flat"><i class="fa fa-fw fa-lock"></i> Change Password</button>
                        </div>
                        <div class="pull-right">
                          <a href="<?php echo HOME_URL; ?>logout" class="btn btn-default btn-sm btn-flat"><i class="fa fa-fw fa-power-off"></i> Sign out</a>
                        </div>
                      </li>
					</ul>
              	</li>
			</ul>
          </div>
    	</nav>
</header>