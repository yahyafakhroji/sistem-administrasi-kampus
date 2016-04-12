<?php 
  ob_start();
  session_start();

  if($_SESSION['signin'] != TRUE)
  {
    header('location:index.php');
  }
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Sistem Administrator - Beranda</title>

<link href="css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="css/bootstrap-datetimepicker.min.css" />
<link href="css/font-awesome.min.css" rel="stylesheet">
<link href="css/bootstrap-table.css" rel="stylesheet">
<link href="css/select2/select2.css" rel="stylesheet">
<link href="css/styles.css" rel="stylesheet">


<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->


</head>

<body>
	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#"><span>SIATAR</span> - Admin Panel</a>
				<ul class="user-menu">
					<li class="dropdown pull-right">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span> <?=$_SESSION['nama'] ?> <span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							<li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Keluar</a></li>
							<li><a href="#" data-toggle="modal" data-target="#ubahPass">
								<span class="glyphicon glyphicon-pencil"></span> Ubah Password</a>
							</li>
						</ul>
					</li>
				</ul>
			</div>
		</div><!-- /.container-fluid -->
	</nav>
		
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<form role="search">
				<img src="image/upload/foto/<?=$_SESSION['foto'] ?>" class="foto_profil">
				<h4 class="name_profil"> <?=$_SESSION['nama'] ?> </h4>
			</form>
			<?php if($_SESSION['bagian'] == 'Admin') {?>
		<ul class="nav menu">
			<li <?php if($_GET['rec'] == 'beranda') echo"class='active'";?>><a href="dash.php?rec=beranda"><span class="glyphicon glyphicon-dashboard"></span> Beranda</a></li>			
			<li class="parent ">
				<a data-toggle="collapse" href="#sub-item-1">
					<span class="glyphicon glyphicon-list"></span> BAAK 
					<span data-toggle="collapse" href="#sub-item-1" class="icon pull-right"><em class="glyphicon glyphicon-s glyphicon-plus"></em></span> 
				</a>
				<ul class="children collapse" id="sub-item-1">
					<li <?php if($_GET['rec'] == 'mahasiswa') echo"class='active'";?>><a href="dash.php?rec=mahasiswa">
						<span class="glyphicon glyphicon-user"></span> Data Mahasiswa</a>
					</li>
					<li <?php if($_GET['rec'] == 'dosen') echo"class='active'";?>><a href="dash.php?rec=dosen">
						<span class="glyphicon glyphicon-tasks"></span> Data Dosen</a>
					</li>
					<li <?php if($_GET['rec'] == 'matkul') echo"class='active'";?>><a href="dash.php?rec=matkul">
						<span class="glyphicon glyphicon-tasks"></span> Data Mata Kuliah</a>
					</li>
					<li <?php if($_GET['rec'] == 'jurusan') echo"class='active'";?>><a href="dash.php?rec=jurusan">
						<span class="glyphicon glyphicon-stats"></span> Data Jurusan</a>
					</li>
					<li <?php if($_GET['rec'] == 'kelas') echo"class='active'";?>><a href="dash.php?rec=kelas">
						<span class="glyphicon glyphicon-tasks"></span> Data Kelas</a>
					</li>
					<li <?php if($_GET['rec'] == 'absen') echo"class='active'";?>><a href="dash.php?rec=absen">
						<span class="glyphicon glyphicon-tasks"></span> Absensi</a>
					</li>
					<li <?php if($_GET['rec'] == 'tahun_ajaran') echo"class='active'";?>><a href="dash.php?rec=tahun_ajaran">
						<span class="glyphicon glyphicon-tasks"></span> Tahun Ajaran</a>
					</li>
				</ul>
			</li>
			<li class="parent ">
				<a data-toggle="collapse" href="#sub-item-2">
					<span class="glyphicon glyphicon-list"></span> BAAU 
					<span data-toggle="collapse" href="#sub-item-2" class="icon pull-right"><em class="glyphicon glyphicon-s glyphicon-plus"></em></span> 
				</a>
				<ul class="children collapse" id="sub-item-2">
					<li <?php if($_GET['rec'] == 'spp') echo"class='active'";?>><a href="dash.php?rec=spp">
						<span class="glyphicon glyphicon-usd"></span> Data SPP</a>
					</li>
					<li <?php if($_GET['rec'] == 'dpp') echo"class='active'";?>><a href="dash.php?rec=dpp">
						<span class="glyphicon glyphicon-gbp"></span> Data DPP</a>
					</li>
					<li <?php if($_GET['rec'] == 'bayar') echo"class='active'";?>><a href="dash.php?rec=bayar">
						<span class="glyphicon glyphicon-credit-card"></span> Data Pembayaran</a>
					</li>
				</ul>
			</li>
			<li <?php if($_GET['rec'] == 'administrator') echo"class='active'";?>><a href="dash.php?rec=administrator">
				<span class="glyphicon glyphicon-list-alt"></span>Administrator</a>
			</li>			
			
			<li role="presentation" class="divider"></li>
			<li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Keluar</a></li>
		</ul>
		<?php } else if($_SESSION['bagian']	== 'BAAK') {?>
		<ul class="nav menu">
			<li <?php if($_GET['rec'] == 'beranda') echo"class='active'";?>><a href="dash.php?rec=beranda">
				<span class="glyphicon glyphicon-dashboard"></span> Beranda</a>
			</li>			
			<li <?php if($_GET['rec'] == 'mahasiswa') echo"class='active'";?>><a href="dash.php?rec=mahasiswa">
				<span class="glyphicon glyphicon-user"></span> Data Mahasiswa</a>
			</li>
			<li <?php if($_GET['rec'] == 'dosen') echo"class='active'";?>><a href="dash.php?rec=dosen">
				<span class="glyphicon glyphicon-tasks"></span> Data Dosen</a>
			</li>
			<li <?php if($_GET['rec'] == 'matkul') echo"class='active'";?>><a href="dash.php?rec=matkul">
				<span class="glyphicon glyphicon-tasks"></span> Data Mata Kuliah</a>
			</li>
			<li <?php if($_GET['rec'] == 'jurusan') echo"class='active'";?>><a href="dash.php?rec=jurusan">
				<span class="glyphicon glyphicon-stats"></span> Data Jurusan</a>
			</li>
			<li <?php if($_GET['rec'] == 'kelas') echo"class='active'";?>><a href="dash.php?rec=kelas">
				<span class="glyphicon glyphicon-tasks"></span> Data Kelas</a>
			</li>
			<li <?php if($_GET['rec'] == 'absen') echo"class='active'";?>><a href="dash.php?rec=absen">
				<span class="glyphicon glyphicon-tasks"></span> Absensi</a>
			</li>
			<li <?php if($_GET['rec'] == 'tahun_ajaran') echo"class='active'";?>><a href="dash.php?rec=tahun_ajaran">
				<span class="glyphicon glyphicon-tasks"></span> Tahun Ajaran</a>
			</li>
			<li role="presentation" class="divider"></li>
			<li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Keluar</a></li>
		</ul>
		<?php } else if($_SESSION['bagian']	== 'BAAU') {?>
		<ul class="nav menu">
			<li <?php if($_GET['rec'] == 'beranda') echo"class='active'";?>><a href="dash.php?rec=beranda">
				<span class="glyphicon glyphicon-dashboard"></span> Beranda</a>
			</li>			
			<li <?php if($_GET['rec'] == 'spp') echo"class='active'";?>><a href="dash.php?rec=spp">
				<span class="glyphicon glyphicon-usd"></span> Data SPP</a>
			</li>
			<li <?php if($_GET['rec'] == 'dpp') echo"class='active'";?>><a href="dash.php?rec=dpp">
				<span class="glyphicon glyphicon-gbp"></span> Data DPP</a>
			</li>
			<li <?php if($_GET['rec'] == 'bayar') echo"class='active'";?>><a href="dash.php?rec=bayar">
				<span class="glyphicon glyphicon-credit-card"></span> Data Pembayaran</a>
			</li>
			
			<li role="presentation" class="divider"></li>
			<li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Keluar</a></li>
		</ul>
		<?php } ?>
	</div><!--/.sidebar-->
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 col-xs-12 col-xs-offset-0 main" >			
		<div class="row" style="margin-bottom: 15px;">
			<ol class="breadcrumb">
				<li><a href="<?=$_SERVER['HTTP_REFERER']?>"><span class="glyphicon glyphicon-home"></span></a></li>
				<li class="active"><?= ucfirst($_GET['rec'])?></li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
		<?php
                  if(isset($_GET['msg']) != "")
                  {
                    if(isset($_GET['msg']) == 1)
                    {
                 ?>
                     <div id="message1" class="alert alert-success alert-dismissable flyover flyover-centered">
                        <a href="#" class="close" data-dismiss="alert">&times;</a>
                        <?php 
                          if($_GET['alert'] == "tambah")
                          {
                            echo "<strong>Success!</strong> Data Berhasil Ditambahkan.";
                          }
                          elseif ($_GET['alert'] == "hapus") 
                          {
                            echo "<strong>Success!</strong> Data Berhasil Dihapus.";
                          }
                          elseif ($_GET['alert'] == "update") 
                          {
                            echo "<strong>Success!</strong> Data Berhasil Diperbarui.";
                          }
                          elseif ($_GET['alert'] == "ubah") 
                          {
                            echo "<strong>Success!</strong> Password Berhasil Diperbarui.";
                          }
                          elseif ($_GET['alert'] == "gagalUbah") 
                          {
                            echo "<strong>Error!</strong> Password Tidak Berhasil Diperbarui.";
                          }
                      ?>
                      </div>
                      
                <?php
                    }
                    else
                    {
                ?>
                      <div id="message1" class="alert alert-warning alert-dismissable flyover flyover-centered">
                        <a href="#" class="close" data-dismiss="alert">&times;</a>
                        <strong>Error!</strong> Terjadi Kesalahan di Sistem.
                      </div>
                <?php
                    }                
                  } 
                  ?>

			<?php include 'rec.php'; ?>
		</div><!--/.row-->			
	</div>	<!--/.main-->
	<!-- Modal -->
	<div class="modal fade" id="ubahPass" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title" id="myModalLabel">Ubah Password</h4>
	      </div>
	      <div class="modal-body">
	        <div class="panel panel-default" style="border: none; box-shadow: none !important;">
				<div class="panel-body" style="border-color: #fff;">
					<form class="form-horizontal form" action="rec.php" method="post" id="formAdd">					
						<div class="form-group">
							<label class="col-md-3 control-label" for="jurusan">Password Lama</label>
							<div class="col-md-5">
								<input id="jurusan" name="password_lama" type="password"
								placeholder="Password Lama" class="form-control" required>
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-3 control-label" for="jurusan">Password Baru</label>
							<div class="col-md-5">
								<input id="jurusan" name="password_baru" type="password"
								placeholder="Password Baru" class="form-control" required>
							</div>
						</div>
				</div>
			</div>	
	      </div>
	      <div class="modal-footer">
	        <img src='image/loading.gif' style='width: 15px; height:15px; float:left;' class='loading-image'/>
			        	<button type="button" class="btn btn-default btn-reset" data-dismiss="modal">Tutup</button>
				        <input type="submit" class="btn btn-primary btn-save" name="ubah" value="Ubah"/>
					</form>
	      </div>
	    </div>
	  </div>
	</div>
	

	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/moment.min.js"></script>
	<script src="js/bootstrap-table.js"></script>
	<script src="js/bootstrap-datetimepicker.min.js"></script>
	<script src="js/select2.js"></script>
	<script src="js/main.js"></script>
</body>

</html>
