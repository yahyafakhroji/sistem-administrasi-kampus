<?php error_reporting (E_ALL ^ E_NOTICE); ?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Sistem Administrasi</title>

<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/styles.css" rel="stylesheet">

<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->

</head>

<body>
	
	<div class="row">
		<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
		<?php if($_GET['msg'] == 'error') { ?>
			<div class="alert bg-danger alert-dismissible alert-login" role="alert">
			  <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
			  <strong>Kesalahan !</strong> Username atau Password Salah.
			</div>
		<?php } else if($_GET['msg'] == 'success') { ?>
			<div class="alert bg-success alert-dismissible alert-login" role="alert">
			  <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
			  <strong>Terima Kasih !</strong> Telah Menggunakan.
			</div>
		<?php } ?>
			<div class="alert alert-success" role="alert">
				For Test
				<p>NIP : 1</p>
				<p>Password : 18011995</p>
			</div>
			<div class="login-panel panel panel-default">
				<div class="panel-heading" style="font-size: 3.2vmin;">
				<!-- <img src="image/logo_sttar.jpg" class="logo_login"/> -->
				Sistem Administrasi</div>
				<div class="panel-body">
					<form role="form" action="rec.php" method="POST">
						<fieldset>
							<div class="form-group">
								<input class="form-control username_form" placeholder="NIP" name="nip" type="number" autofocus="">
							</div>
							<div class="form-group">
								<input class="form-control password_form" placeholder="Password" name="password" type="password" value="">
							</div>
							<input type="submit" name="login" 
									class="btn btn-primary btn-block btn-login" value="Masuk"/>
						</fieldset>
					</form>
				</div>
			</div>
		</div><!-- /.col-->
	</div><!-- /.row -->	
	
		

	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>

</html>
<?php
session_start();
  
    if ($_SESSION['signin'] == TRUE)
    {
        header("location:dash.php?rec=beranda");
    }

?>