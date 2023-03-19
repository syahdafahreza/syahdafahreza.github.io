<?php

include 'configdb-login.php';

error_reporting(0);

session_start();

if (isset($_SESSION['usernametog'])) {
    header("Location: index.php");
}

if (isset($_POST['submit'])) {
    $username = $_POST['usernametog'];
    $userrole = $_POST['userroletog'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $cpassword = md5($_POST['cpassword']);

    if ($password == $cpassword) {
        $sql = "SELECT * FROM users WHERE email='$email'";
        $result = mysqli_query($conn, $sql);
        if (!$result->num_rows > 0) {
            $sql = "INSERT INTO users (userrole, username, email, password)
                    VALUES ('$userrole', '$username', '$email', '$password')";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                // echo "<script>alert('Selamat, registrasi berhasil!');window.location = '/tog/auth/';</script>";
                $userrole = "";
                $username = "";
                $email = "";
                $_POST['password'] = "";
                $_POST['cpassword'] = "";
                $_SESSION['registersukses']= 'Selamat!. Registrasi akun Anda berhasil. Silahkan login';
                header("Location: index.php");
            } else {
                $_SESSION['registergagal']= 'Terjadi Kesalahan';
                // echo "<script>alert('Woops! Terjadi kesalahan.')</script>";
            }
        } else {
            $_SESSION['registergagal']= 'Email Sudah Terdaftar';
            // echo "<script>alert('Woops! Email Sudah Terdaftar.')</script>";
        }

    } else {
        $_SESSION['registergagal']= 'Password Tidak Sesuai';
        // echo "<script>alert('Password Tidak Sesuai')</script>";
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

    <title>Register | Token of Gratitude</title>

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

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Buat akun sekarang!</h1>
                            </div>
                            <form action="" method="POST" class="user">
                                <div class="form-group">
                                    <input type="hidden" name="userroletog" value="3">
                                    <input type="text" name="usernametog" class="form-control form-control-user"
                                        id="exampleFirstName" placeholder="Nama User" value="<?php echo $username; ?>"
                                        required>

                                    <!-- <div class="col-sm-6"> -->
                                    <!-- <input type="text" class="form-control form-control-user" id="exampleLastName" -->
                                    <!-- placeholder="Last Name"> -->
                                    <!-- </div> -->
                                </div>
                                <div class="form-group">
                                    <input type="email" name="email" class="form-control form-control-user"
                                        id="exampleInputEmail" placeholder="Alamat Email" value="<?php echo $email; ?>"
                                        required>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" name="password" class="form-control form-control-user"
                                            id="exampleInputPassword" placeholder="Kata Sandi"
                                            value="<?php echo $_POST['password']; ?>" required>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" name="cpassword" class="form-control form-control-user"
                                            id="exampleRepeatPassword" placeholder="Ulangi Kata Sandi"
                                            value="<?php echo $_POST['cpassword']; ?>" required>
                                    </div>
                                </div>
                                <!-- <a href="login.html" class="btn btn-primary btn-user btn-block">Register Account</a> -->
                                <button name="submit" class="btn btn-primary btn-user btn-block">Daftar</button>
                                <hr>
                                <!-- <a href="index.html" class="btn btn-google btn-user btn-block"> -->
                                <!-- <i class="fab fa-google fa-fw"></i> Register with Google -->
                                <!-- </a> -->
                                <!-- <a href="index.html" class="btn btn-facebook btn-user btn-block"> -->
                                <!-- <i class="fab fa-facebook-f fa-fw"></i> Register with Facebook -->
                                <!-- </a> -->
                            </form>
                            <!-- <hr> -->
                            <div class="text-center">
                                <a class="small" href="forgot-password.php">Lupa Kata Sandi?</a>
                            </div>
                            <div class="text-center">
                                <a class="small" href="index.php">Sudah punya akun? Login sekarang!</a>
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

    <!-- Memanggil Sweet Alert Registrasi Akun Gagal -->
    <?php if (@$_SESSION['registergagal']) { ?>
        <script>
            swal("Woops!", "<?php echo $_SESSION['registergagal']; ?>", "error");
        </script>
        <!-- jangan lupa untuk menambahkan unset agar sweet alert tidak muncul lagi saat di refresh -->
        <?php unset($_SESSION['registergagal']);
    } ?>

</body>

</html>