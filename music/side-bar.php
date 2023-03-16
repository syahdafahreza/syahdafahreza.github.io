<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      	<!-- sidebar menu: : style can be found in sidebar.less -->
      	<ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li class="treeview <?php if(basename($_SERVER['PHP_SELF'])=='home.php'){echo 'active';} ?>">
                <a href="#">
                    <i class="fa fa-play"></i> <span>Audio Tracker</span>
                    <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
            	<ul class="treeview-menu">
            		<li class="<?php if(basename($_SERVER['PHP_SELF'])=='home.php'){echo 'active';} ?>"><a href="<?php echo HOME_URL; ?>home"><i class="fa fa-circle-o"></i> User Data</a></li>
            	</ul>
            </li>
      	</ul>
    </section>
    <!-- /.sidebar -->
</aside>