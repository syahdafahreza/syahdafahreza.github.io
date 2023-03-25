<?php

include 'configdb-main.php';
session_start();

if (!isset($_SESSION['usernametog'])) {
    header("Location: auth/index.php");
} else {
    $namauser = '\'' . $_SESSION['usernametog'] . "'";
}

if (!isset($_SESSION['userroletog'])) {
    $userrole = 0;
} else {
    $userrole = $_SESSION['userroletog'];
}

// Cek apakah user administrator. Klo bukan ya error lah bgsd :v
if ($userrole != 1) {
    // echo "<script>alert('Maaf, anda bukan administrator!');window.location = '404.php';</script>";
    header("Location: 404.php");
} else {

}

// List all tokens
$listalltoken = mysqli_query($mysqli, "SELECT @count:=@count+1, t. * FROM (SELECT * FROM `tokens`) t, (SELECT @count:=0) z ORDER BY `makedate` DESC");
if (!$listalltoken) {
    trigger_error(mysqli_error($mysqli), E_USER_ERROR);
}
// List all tokens 2
$listalltoken2 = mysqli_query($mysqli, "SELECT @count:=@count+1, t. * FROM (SELECT * FROM `tokens`) t, (SELECT @count:=0) z ORDER BY `makedate` DESC");
if (!$listalltoken2) {
    trigger_error(mysqli_error($mysqli), E_USER_ERROR);
}


?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Token Manager | Token of Gratitude</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" rel="stylesheet"
        type="text/css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.min.css" rel="stylesheet">
    </link>
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top" class="sidebar-toggled">

    <!-- <a href="#" class="act-btn"><i class="fas fa-plus fa-sm text-white"></i></a> -->
    <div class="zoom" style="/*display: inline;*/">
        <a class="zoom-fab zoom-btn-large" id="zoomBtn"><i class="fa fa-bars"></i></a>
        <ul class="zoom-menu">
            <!-- <li><a class="zoom-fab-create zoom-btn-sm zoom-btn-success scale-transition scale-out" data-toggle="modal"data-target="#newnoteModal"><i class="fa fa-plus"></i></a></li> -->
            <li><a class="zoom-fab zoom-btn-sm zoom-btn-danger scale-transition scale-out" data-toggle="modal"
                                data-target="#delalltokenModal"><i
                        class="fa fa-trash"></i></a></li>
        </ul>
    </div>

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion toggled" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon">
                    <!-- <i class="fas fa-laugh-wink"></i> -->
                    <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 100 300" id="mainlogo">
                        <defs></defs>
                        <g id="Layer_2" data-name="Layer 2">
                            <g id="Layer_1-2" data-name="Layer 1">
                                <path class="cls-1"
                                    d="M91.66,138.71,41.31,116.25C19.73,106.66,5.36,93.86,1.25,78.51A34.31,34.31,0,0,0,0,87.17c.27,19.24,15.78,35.08,41.31,46.42l50.35,22.46c21.58,9.57,35.94,22.39,40.06,37.73a34.76,34.76,0,0,0,1.24-8.66C132.7,165.89,117.19,150.05,91.66,138.71Z" />
                                <path class="cls-1"
                                    d="M42.51,40.16c-19.4,9.82-27,21.17-26.82,29.67a18.1,18.1,0,0,0,2.23,8.65c3.92-7.61,13.2-16.1,29.75-23.45L132.9,17,133,0S66.77,29.41,42.51,40.16Z" />
                                <path class="cls-1"
                                    d="M83.45,90.52c-10.08,5.1-13.41,10.59-13.2,13.6-.15,2,1.32,5.23,5.44,8.65a44.87,44.87,0,0,1,10.67-6.32L133,85.66v-17Z" />
                                <path class="cls-1"
                                    d="M90.46,232.14c19.4-9.82,27-21.18,26.82-29.68a18.28,18.28,0,0,0-2.23-8.66c-3.92,7.62-13.21,16.11-29.76,23.47-2.58,1.13-85.22,38-85.22,38l-.07,17S66.21,242.87,90.46,232.14Z" />
                                <path class="cls-1"
                                    d="M49.52,181.77c10.08-5.09,13.42-10.59,13.2-13.59.14-2-1.32-5.24-5.44-8.66a44.73,44.73,0,0,1-10.67,6.33L0,186.62v17Z" />
                            </g>
                        </g>
                    </svg>
                </div>
                <div class="sidebar-brand-text mx-3">Token of Gratitude</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item -->
            <li class="nav-item">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <?php
            // Check apakah user administrator. Kalau tidak makamenu "Token Manager" tdk akan tampil
            if ($userrole == 1) {
                echo '<li class="nav-item active"><a class="nav-link" href="token-manager.php"><i class="fas fa-fw fa-tags"></i><span>Token Manager</span></a></li>';
            } else if ($userrole == 3) {
                echo '<li class="nav-item"><a class="nav-link" href="redeem.php"><i class="fas fa-fw fa-tags"></i><span>Redeem Token</span></a></li>';
            } else {

            }

            ?>

            <!-- Nav Item -->
            <li class="nav-item">
                <a class="nav-link" href="/faq.php">
                    <i class="fas fa-fw fa-question"></i>
                    <span>FaQ</span></a>
            </li>

            <!-- Nav Item -->
            <li class="nav-item">
                <a class="nav-link" href="/tog/tos.php">
                    <i class="fas fa-fw fa-exclamation"></i>
                    <span>Syarat & Ketentuan</span></a>
            </li>

            <!-- Nav Item -->
            <li class="nav-item">
                <a class="nav-link" href="/">
                    <i class="fas fa-fw fa-home"></i>
                    <span>Beranda</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

            <!-- Sidebar Message -->
            <!-- <div class="sidebar-card d-none d-lg-flex"> -->
            <!-- <img class="sidebar-card-illustration mb-2" src="img/undraw_rocket.svg" alt="..."> -->
            <!-- <p class="text-center mb-2"><strong>SB Admin Pro</strong> is packed with premium features, components, and more!</p> -->
            <!-- <a class="btn btn-success btn-sm" href="https://startbootstrap.com/theme/sb-admin-pro">Upgrade to Pro!</a> -->
            <!-- </div> -->

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <!-- <form -->
                    <!-- class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search"> -->
                    <!-- <div class="input-group"> -->
                    <!-- <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." -->
                    <!-- aria-label="Search" aria-describedby="basic-addon2"> -->
                    <!-- <div class="input-group-append"> -->
                    <!-- <button class="btn btn-primary" type="button"> -->
                    <!-- <i class="fas fa-search fa-sm"></i> -->
                    <!-- </button> -->
                    <!-- </div> -->
                    <!-- </div> -->
                    <!-- </form> -->

                    <h1 class="h3 mb-0 text-gray-800">Token Manager</h1>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <!-- <li class="nav-item dropdown no-arrow d-sm-none"> -->
                        <!-- <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" -->
                        <!-- data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> -->
                        <!-- <i class="fas fa-search fa-fw"></i> -->
                        <!-- </a> -->
                        <!-- Dropdown - Messages -->
                        <!-- <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" -->
                        <!-- aria-labelledby="searchDropdown"> -->
                        <!-- <form class="form-inline mr-auto w-100 navbar-search"> -->
                        <!-- <div class="input-group"> -->
                        <!-- <input type="text" class="form-control bg-light border-0 small" -->
                        <!-- placeholder="Search for..." aria-label="Search" -->
                        <!-- aria-describedby="basic-addon2"> -->
                        <!-- <div class="input-group-append"> -->
                        <!-- <button class="btn btn-primary" type="button"> -->
                        <!-- <i class="fas fa-search fa-sm"></i> -->
                        <!-- </button> -->
                        <!-- </div> -->
                        <!-- </div> -->
                        <!-- </form> -->
                        <!-- </div> -->
                        <!-- </li> -->

                        <!-- Nav Item - Alerts -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-bell fa-fw"></i>
                                <!-- Counter - Alerts -->
                                <span class="badge badge-danger badge-counter">3+</span>
                            </a>
                            <!-- Dropdown - Alerts -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="alertsDropdown">
                                <h6 class="dropdown-header">
                                    Alerts Center
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-primary">
                                            <i class="fas fa-file-alt text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 12, 2019</div>
                                        <span class="font-weight-bold">A new monthly report is ready to download!</span>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-success">
                                            <i class="fas fa-donate text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 7, 2019</div>
                                        $290.29 has been deposited into your account!
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-warning">
                                            <i class="fas fa-exclamation-triangle text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 2, 2019</div>
                                        Spending Alert: We've noticed unusually high spending for your account.
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
                            </div>
                        </li>

                        <!-- Nav Item - Messages -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-envelope fa-fw"></i>
                                <!-- Counter - Messages -->
                                <span class="badge badge-danger badge-counter">7</span>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="messagesDropdown">
                                <h6 class="dropdown-header">
                                    Message Center
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="img/undraw_profile_1.svg" alt="...">
                                        <div class="status-indicator bg-success"></div>
                                    </div>
                                    <div class="font-weight-bold">
                                        <div class="text-truncate">Hi there! I am wondering if you can help me with a
                                            problem I've been having.</div>
                                        <div class="small text-gray-500">Emily Fowler · 58m</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="img/undraw_profile_2.svg" alt="...">
                                        <div class="status-indicator"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">I have the photos that you ordered last month, how
                                            would you like them sent to you?</div>
                                        <div class="small text-gray-500">Jae Chun · 1d</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="img/undraw_profile_3.svg" alt="...">
                                        <div class="status-indicator bg-warning"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">Last month's report looks great, I am very happy with
                                            the progress so far, keep up the good work!</div>
                                        <div class="small text-gray-500">Morgan Alvarez · 2d</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="https://source.unsplash.com/Mv9hjnEUHR4/60x60"
                                            alt="...">
                                        <div class="status-indicator bg-success"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">Am I a good boy? The reason I ask is because someone
                                            told me that people say this to all dogs, even if they aren't good...</div>
                                        <div class="small text-gray-500">Chicken the Dog · 2w</div>
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>
                            </div>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                                    <?php
                                    // Check apakah user login. Kalau tidak maka akan tampil "Sign in"
                                    if (!isset($_SESSION['usernametog'])) {
                                        echo 'Sign in';
                                    } else {
                                        echo $_SESSION['usernametog'];
                                    }

                                    ?>
                                </span>

                                <?php
                                // Check apakah user login. Kalau tidak maka akan tampil "Sign in"
                                if (!isset($_SESSION['usernametog'])) {
                                    echo '<img class="img-profile rounded-circle" src="/images/nouser.svg">';
                                } else {
                                    echo '<img class="img-profile rounded-circle" src="img/undraw_profile.svg">';
                                }

                                ?>
                            </a>
                            <?php

                            if (!isset($_SESSION['usernametog'])) {
                                echo '<!-- Dropdown - User Information -->';
                                echo '<div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">';
                                echo '<a class="dropdown-item" href="/tog/auth/"><i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>Login</a>';
                                echo '</div>';
                            } else {
                                echo '<!-- Dropdown - User Information -->';
                                echo '<div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">';
                                echo '<a class="dropdown-item" href="#"><i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>Profil</a>';
                                echo '<div class="dropdown-divider"></div>';
                                echo '<a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal"><i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>Keluar</a>';
                                echo '</div>';
                            }

                            ?>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#"><i
                                        class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>Profil</a>
                                <a class="dropdown-item" href="#"><i
                                        class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>Pengaturan</a>
                                <a class="dropdown-item" href="#"><i
                                        class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>Log Aktivitas</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal"><i
                                        class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>Keluar</a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Buat Token Baru</h1>
                        <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i -->
                        <!-- class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
                    </div>

                    <!-- Content Row -->
                    <div class="row">
                        <div class="col-lg mb-4">
                            <!-- Earnings (Monthly) Card Example -->
                            <div class="mb-4">
                                <div class="card border-bottom-success shadow h-100 py-2">
                                    <div class="card-body">
                                        <form role="form" action="createtoken.php?act=tambahtoken" method="POST">
                                            <div class="row no-gutters align-items-center">

                                                <div class="col mr-2">

                                                    <input type="text" name="inputtoken" class="form-control"
                                                        placeholder="Kode Token..." required>
                                                </div>
                                                <div class="col-auto">
                                                    <button class="btn btn-success" name="submit">Buat Token</button>

                                                </div>

                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between">
                        <div>
                            <h1 class="h3 mb-2 text-gray-800">Token Terdaftar</h1>
                            <p class="mb-4">Di bawah ini adalah daftar token yang telah dibuat</p>
                        </div>

                        <!-- <form method="POST" action="delalltoken.php"> -->
                        <button class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm" data-toggle="modal"
                                data-target="#delalltokenModal"><i
                                class="fas fa-trash fa-sm text-white" ></i> Hapus Semua Token</button>
                        <!-- </form> -->
                    </div>


                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">List Token</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Token</th>
                                            <th>Response Token</th>
                                            <th>Diklaim Oleh</th>
                                            <th>Valid Sampai</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>#</th>
                                            <th>Token</th>
                                            <th>Response Token</th>
                                            <th>Diklaim Oleh</th>
                                            <th>Valid Sampai</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php

                                        while ($listalltokenR = mysqli_fetch_array($listalltoken)) {
                                            echo '<tr>';
                                            echo '<td>' . $listalltokenR['@count:=@count+1'] . '</td>';
                                            echo '<td>' . $listalltokenR['tokens'] . '</td>';
                                            echo '<td>' . $listalltokenR['responsetokens'] . '</td>';
                                            echo '<td>' . $listalltokenR['claimby'] . '</td>';
                                            echo '<td>' . $listalltokenR['validuntil'] . '</td>';
                                            echo '<td><button class="btn btn-warning mr-2 mb-2" name="" data-toggle="modal" data-target="#edittokenModal' . $listalltokenR['id'] . '"><i class="fa-solid fa-pen-to-square"></i></button><button class="btn btn-danger mr-2 mb-2" name="" data-toggle="modal" data-target="#deletetokenModal' . $listalltokenR['id'] . '"><i class="fa-solid fa-trash"></i></button></td>';
                                            echo '</tr>';
                                        } ?>

                                        <!-- <tr> -->
                                        <!-- <td>01</td> -->
                                        <!-- <td>2N8GZVL07A</td> -->
                                        <!-- <td>01-01-2018</td> -->
                                        <!-- </tr> -->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy;
                            <script
                                type="text/javascript">var creditsyear = new Date(); document.write(creditsyear.getFullYear());</script>
                        </span>
                        <a href="javascript:window.location.href=window.location.href">Syahda Fahreza</a>.
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded-circle" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <?php

    while ($listalltokenR2 = mysqli_fetch_array($listalltoken2)) {

        ?>

        <!-- Edit Token Modal -->
        <div class="modal fade" id="edittokenModal<?php echo $listalltokenR2['id'] ?>" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Token</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <form role="form" action="edittoken.php" method="get">
                            <input type="hidden" name="id_token" value="<?php echo $listalltokenR2['id']; ?>">
                            <div class="form-group">
                                <label for="token-input-box" class="col-form-label">Token</label>
                                <input type="text" name="input_token" class="form-control" id="token-input-box"
                                    value="<?php echo $listalltokenR2['tokens'] ?>" required>
                            </div>
                            <div class="form-group mb-4">
                                <label for="response-token-input-box" class="col-form-label">Response Token</label>
                                <input type="text" name="input_response_token" class="form-control"
                                    id="response-token-input-box" value="<?php echo $listalltokenR2['responsetokens'] ?>">
                            </div>
                            <div class="form-group">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <input type="checkbox" id="checkboxCB<?php echo $listalltokenR2['id']; ?>"
                                                aria-label="Checkbox for following text input"
                                                onclick="myFunctionCB<?php echo $listalltokenR2['id']; ?>()">
                                        </div>
                                    </div>
                                    <input name="input_claimby" type="text" class="form-control"
                                        id="inpCB<?php echo $listalltokenR2['id']; ?>" aria-label="Text input with checkbox"
                                        value="<?php echo $listalltokenR2['claimby'] ?>" placeholder="Nama User...">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <input type="checkbox" id="checkboxVU<?php echo $listalltokenR2['id']; ?>"
                                                aria-label="Checkbox for following text input"
                                                onclick="myFunctionVU<?php echo $listalltokenR2['id']; ?>()">
                                        </div>
                                    </div>
                                    <input name="input_validuntil" type="date" class="form-control"
                                        id="inpVU<?php echo $listalltokenR2['id']; ?>" aria-label="Text input with checkbox"
                                        value="<?php echo $listalltokenR2['validuntil'] ?>">
                                </div>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Token Input Disabler -->
        <script>
            function myFunctionCB<?php echo $listalltokenR2['id']; ?>() {
                // Get the checkbox
                var checkBoxCB<?php echo $listalltokenR2['id']; ?> = document.getElementById("checkboxCB<?php echo $listalltokenR2['id']; ?>");
                // Get the output text
                var textinpCB<?php echo $listalltokenR2['id']; ?> = document.getElementById("inpCB<?php echo $listalltokenR2['id']; ?>");

                // If the checkbox is checked, display the output text
                if (checkBoxCB<?php echo $listalltokenR2['id']; ?>.checked == true) {
                    // alert('Checked!');
                    textinpCB<?php echo $listalltokenR2['id']; ?>.disabled = true;
                    textinpCB<?php echo $listalltokenR2['id']; ?>.placeholder = "NULL";
                    textinpCB<?php echo $listalltokenR2['id']; ?>.value = NULL;
                } else {
                    textinpCB<?php echo $listalltokenR2['id']; ?>.disabled = false;
                    textinpCB<?php echo $listalltokenR2['id']; ?>.placeholder = "Nama User...";
                }
            }
        </script>

        <!-- Date Input Disabler -->
        <script>
            function myFunctionVU<?php echo $listalltokenR2['id']; ?>() {
                // Get the checkbox
                var checkBoxVU<?php echo $listalltokenR2['id']; ?> = document.getElementById("checkboxVU<?php echo $listalltokenR2['id']; ?>");
                // Get the output text
                var textinpVU<?php echo $listalltokenR2['id']; ?> = document.getElementById("inpVU<?php echo $listalltokenR2['id']; ?>");

                // If the checkbox is checked, display the output text
                if (checkBoxVU<?php echo $listalltokenR2['id']; ?>.checked == true) {
                    textinpVU<?php echo $listalltokenR2['id']; ?>.disabled = true;
                    textinpVU<?php echo $listalltokenR2['id']; ?>.placeholder = "NULL";
                    textinpVU<?php echo $listalltokenR2['id']; ?>.value = null;

                } else {
                    textinpVU<?php echo $listalltokenR2['id']; ?>.disabled = false;
                }
            }
        </script>

        <!-- Delete Confirmation Modal -->
        <div class="modal fade" id="deletetokenModal<?php echo $listalltokenR2['id'] ?>" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Hapus Token</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Token ini akan hilang selama-lamanya, sama seperti kenangan indah sang mantan.
                        Ingin tetap menghapus token ini?
                    </div>
                    <form role="form" action="deletetoken.php" method="get">
                        <input type="hidden" name="id_token" value="<?php echo $listalltokenR2['id']; ?>">
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <?php } ?>

    <!-- Delete All Token Confirmation Modal -->
    <div class="modal fade" id="delalltokenModal" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Hapus Semua Token</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Semua token akan hilang selama-lamanya, sama seperti kenangan indah sang mantan.
                    Ingin tetap menghapus token ini?
                </div>
                <form action="delalltoken.php" method="POST">
                    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Yakin ingin Logout?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Pilih "Logout" di bawah jika Anda siap untuk mengakhiri sesi Anda saat ini.
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                    <form action="" method="POST">
                        <a class="btn btn-primary" href="/tog/auth/logout.php">Logout</a>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>

    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/b2e4954604.js" crossorigin="anonymous"></script>

    <!-- Sweet Alert CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.min.js"></script>

    <!-- Zoom FAB Button Scripts -->
    <script>
        $('#zoomBtn').click(function () {
            $('.zoom-btn-sm').toggleClass('scale-out');
            if (!$('.zoom-card').hasClass('scale-out')) {
                $('.zoom-card').toggleClass('scale-out');
            }
        });
    </script>

    <!-- Memanggil Sweet Alert Input Token -->
    <?php if (@$_SESSION['inptokensukses']) { ?>
        <script>
            swal("Berhasil!", "<?php echo $_SESSION['inptokensukses']; ?>", "success");
        </script>
        <!-- jangan lupa untuk menambahkan unset agar sweet alert tidak muncul lagi saat di refresh -->
        <?php unset($_SESSION['inptokensukses']);
    } ?>

    <!-- Memanggil Sweet Alert Delete Token -->
    <?php if (@$_SESSION['deltokensukses']) { ?>
        <script>
            swal("Berhasil!", "<?php echo $_SESSION['deltokensukses']; ?>", "success");
        </script>
        <!-- jangan lupa untuk menambahkan unset agar sweet alert tidak muncul lagi saat di refresh -->
        <?php unset($_SESSION['deltokensukses']);
    } ?>

    <!-- Memanggil Sweet Alert Delete Token -->
    <?php if (@$_SESSION['delalltokensukses']) { ?>
        <script>
            swal("Berhasil!", "<?php echo $_SESSION['delalltokensukses']; ?>", "success");
        </script>
        <!-- jangan lupa untuk menambahkan unset agar sweet alert tidak muncul lagi saat di refresh -->
        <?php unset($_SESSION['delalltokensukses']);
    } ?>

    <!-- Memanggil Sweet Alert Edit Token -->
    <?php if (@$_SESSION['edittokensukses']) { ?>
        <script>
            swal("Berhasil!", "<?php echo $_SESSION['edittokensukses']; ?>", "success");
        </script>
        <!-- jangan lupa untuk menambahkan unset agar sweet alert tidak muncul lagi saat di refresh -->
        <?php unset($_SESSION['edittokensukses']);
    } ?>

</body>

</html>