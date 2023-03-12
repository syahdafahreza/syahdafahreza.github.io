<?php 
 
include 'configdb-login.php';
 
error_reporting(0);

session_start();

if (isset($_SESSION['username'])) {
    header("Location: index.php");
}
 
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $cpassword = md5($_POST['cpassword']);
 
    if ($password == $cpassword) {
        $sql = "SELECT * FROM users WHERE email='$email'";
        $result = mysqli_query($conn, $sql);
        if (!$result->num_rows > 0) {
            $sql = "INSERT INTO users (username, email, password)
                    VALUES ('$username', '$email', '$password')";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                echo "<script>alert('Selamat, registrasi berhasil!');window.location = '/tog/auth/';</script>";
                $username = "";
                $email = "";
                $_POST['password'] = "";
                $_POST['cpassword'] = "";
                // header("Location: index.php");
            } else {
                echo "<script>alert('Woops! Terjadi kesalahan.')</script>";
            }
        } else {
            echo "<script>alert('Woops! Email Sudah Terdaftar.')</script>";
        }
         
    } else {
        echo "<script>alert('Password Tidak Sesuai')</script>";
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
                                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                            </div>
                            <form action="" method="POST" class="user">
                                <div class="form-group">

                                        <input type="text" name="username" class="form-control form-control-user" id="exampleFirstName"
                                            placeholder="Nama User" value="<?php echo $username; ?>" required>

                                    <!-- <div class="col-sm-6"> -->
                                        <!-- <input type="text" class="form-control form-control-user" id="exampleLastName" -->
                                            <!-- placeholder="Last Name"> -->
                                    <!-- </div> -->
                                </div>
                                <div class="form-group">
                                    <input type="email" name="email" class="form-control form-control-user" id="exampleInputEmail"
                                        placeholder="Alamat Email" value="<?php echo $email; ?>" required>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" name="password" class="form-control form-control-user"
                                            id="exampleInputPassword" placeholder="Kata Sandi" value="<?php echo $_POST['password']; ?>" required>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" name="cpassword" class="form-control form-control-user"
                                            id="exampleRepeatPassword" placeholder="Ulangi Kata Sandi" value="<?php echo $_POST['cpassword']; ?>" required>
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

</body>

</html>