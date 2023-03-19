<?php

include 'configdb-login.php';

error_reporting(0);

session_start();

if (isset($_SESSION['usernametog'])) {
    header("Location: /tog/index.php");
}

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = md5($_POST['password']);

    $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
    $result = mysqli_query($conn, $sql);
    if ($result->num_rows > 0) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['usernametog'] = $row['username'];
        $_SESSION['userroletog'] = $row['userrole'];
        header("Location: /tog/index.php");
    } else {
        echo "<script>alert('Email atau password Anda salah. Silahkan coba lagi!')</script>";
    }
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

    <title>Login | Token of Gratitude</title>

    <!-- Custom fonts for this template-->
    <link href="/bspaste/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.min.css" rel="stylesheet">
    </link>

    <!-- Custom styles for this template-->
    <link href="/bspaste/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <!-- <div class="alert alert-warning" role="alert"> -->
    <!-- <?php echo $_SESSION['error'] ?> -->
    <!-- </div> -->

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Selamat Datang!</h1>
                                    </div>
                                    <form action="" method="POST" class="user">
                                        <div class="form-group">
                                            <input type="email" name="email" class="form-control form-control-user"
                                                id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Email"
                                                value="<?php echo $email; ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password"
                                                class="form-control form-control-user" id="exampleInputPassword"
                                                placeholder="Kata Sandi" value="<?php echo $_POST['password']; ?>"
                                                required>
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                                <label class="custom-control-label" for="customCheck">Ingat Saya</label>
                                            </div>
                                        </div>
                                        <!-- <a href="index.html" class="btn btn-primary btn-user btn-block">Login</a> -->
                                        <button name="submit" class="btn btn-primary btn-user btn-block">Login</button>
                                        <hr>
                                        <!-- <a href="index.html" class="btn btn-google btn-user btn-block"> -->
                                        <!-- <i class="fab fa-google fa-fw"></i> Login with Google -->
                                        <!-- </a> -->
                                        <!-- <a href="index.html" class="btn btn-facebook btn-user btn-block"> -->
                                        <!-- <i class="fab fa-facebook-f fa-fw"></i> Login with Facebook -->
                                        <!-- </a> -->
                                    </form>
                                    <!-- <hr> -->
                                    <div class="text-center">
                                        <a class="small" href="forgot-password.php">Lupa Kata Sandi?</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="register.php">Buat akun!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="/bspaste/vendor/jquery/jquery.min.js"></script>
    <script src="/bspaste/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="/bspaste/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="/bspaste/js/sb-admin-2.min.js"></script>

    <!-- Sweet Alert CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.min.js"></script>

    <!-- Memanggil Sweet Alert Registrasi Akun Berhasil -->
    <?php if (@$_SESSION['registersukses']) { ?>
        <script>
            swal("Berhasil!", "<?php echo $_SESSION['registersukses']; ?>", "success");
        </script>
        <!-- jangan lupa untuk menambahkan unset agar sweet alert tidak muncul lagi saat di refresh -->
        <?php unset($_SESSION['registersukses']);
    } ?>

</body>

</html>