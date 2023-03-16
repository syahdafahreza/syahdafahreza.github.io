<?php include_once('config.php'); ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Login | Panel for LCW web portal</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="<?php echo HOME_URL; ?>bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo HOME_URL; ?>custom/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?php echo HOME_URL; ?>custom/css/dashbordLCW.min.css">
  <link rel="stylesheet" href="<?php echo HOME_URL; ?>custom/css/bootstrap-select.min.css">
  <link rel="stylesheet" href="<?php echo HOME_URL; ?>custom/css/datepicker3.css">
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="<?php echo HOME_URL; ?>index.php"><img src="https://learncodeweb.com/wp-content/uploads/2019/01/logo.png"></a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg"><i class="fa fa-fw fa-play-circle"></i> Player Portal for LCW Admins</p>
	<p id="login-msg"></p>
    <form method="post" id="login-form" onSubmit="return false;">
      	<div class="form-group">
      		<div class="input-group">
                <input type="email" id="login-email" name="email" class="form-control" placeholder="Email">
                <span class="input-group-addon"><i class="fa fa-fw fa-envelope"></i></span>
            </div>
            <i class="text-danger" id="login-email-msg"></i>
		</div>
      	<div class="form-group">
        	<div class="input-group">
        		<input type="password" id="login-password" maxlength="10" name="password" class="form-control" placeholder="Password">
        		<span class="input-group-addon"><i class="fa fa-fw fa-lock"></i></span>
      		</div>
            <i class="text-danger" id="login-password-msg"></i>
        </div>
      	<div class="row form-group">
        <div class="col-xs-12">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
      </div>
    </form>
	
    <div class="text-center"><a href="<?php echo HOME_URL; ?>forgot-password"><i class="fa fa-lock"></i> I forgot my password</a></div><br>

  </div>
  <!-- /.login-box-body -->
</div>

<?php include_once('footer.php'); ?>
<?php if(isset($_SESSION['id']) and $_SESSION['id']!=""){ ?>
	<script>
		$(document).ready(function(e) {
			setTimeout(function(){window.location.href='<?php echo HOME_URL; ?>home'},100);
		});
	</script>
<?php } ?>