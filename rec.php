<?php 
	require_once 'conn.php';

	error_reporting(E_ALL & ~E_NOTICE);

	//Login 
	if(isset($_POST['login']))
	{
		$nip = $_POST['nip'];
	    $password = md5($_POST['password']);

	    $result   = mysql_query("SELECT * FROM data_admin "
	                        . "WHERE nip = '$nip' and password = '$password'") 
	                        or die(mysql_error());
	                
	    $user_data = mysql_fetch_array($result);
	    $no_rows = mysql_num_rows($result);
	    
	    if($no_rows == 1)
	    {
	        $_SESSION['signin']     			= TRUE;
	        $_SESSION['nip']		        	= $user_data['nip'];
	        $_SESSION['nama']       			= $user_data['nama'];
			$_SESSION['bagian']					= $user_data['status_bagian'];
			$_SESSION['foto']					= $user_data['foto'];
	        $_SESSION['message']    			= '';
	        
			header('location:dash.php?rec=beranda');
	    }
	    else
	    {
	        header('location:index.php?msg=error');
	    }  
	}
	else if(isset($_POST['ubah']))
	{
		$nip = $_SESSION['nip'];
		$last_password = md5($_POST['password_lama']);
		$new_password = md5($_POST['password_baru']);

		$sql = mysql_query("SELECT password FROM data_admin WHERE password = '$last_password' AND nip = '$nip' LIMIT 1");

		if(mysql_num_rows($sql) == 1)
		{
			$sql = mysql_query("UPDATE data_admin SET password = '$new_password' WHERE nip = '$nip'");

			header("location:logout.php");
		}
		else
		{
			header("location:dash.php?rec=beranda&alert=gagalUbah&msg=1");	
		}
	}
	//End Login

	if(isset($_GET['rec']))
	{
		$rec=$_GET['rec'];
	}
	else
	{
		$rec="";
	}

	$base_url = $_SERVER['SERVER_NAME']."/project/sppcek/";

	if($rec == "beranda")
	{
	?>
		<div class="jumbotron">
	  		<h1>"Hello, world!"</h1>
	  		<p>SIATAR Administrator</p>
		</div>
	<?php
	}
	else if($rec == "mahasiswa")
	{
	?>
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">Data Mahasiswa</div>
				<div class="panel-body">

				<div class="button-control pull-left" style="margin-top: 10px;">
		          <div class="btn-group" role="group" aria-label="...">
					<a  type="button" data-toggle="tooltip" data-id="" 
		          		class="btn btn-primary tip btn-modal" title="Tambah Data" data-toggle="modal" >
	          			<span class="fa fa-plus"></span>
	          		</a>
					<a type="button" data-toggle="tooltip" class="btn btn-danger tip btn-hapus" 
		          		title="Hapus Semua" data-href="dash.php?rec=mahasiswa&action=hapusSemua">
		          		<span class="fa fa-trash-o"></span>
		          	</a>
		          	<a type="button" data-toggle="tooltip" class="btn btn-success tip btn-import" 
		          		title="Upload CSV" data-href="pdf/upload_csv.php?rec=mahasiswa">
		          		<span class="fa fa-upload"></span>
		          	</a>

					  <div class="btn-group" role="group">
					    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
					      Export
					      <span class="caret"></span>
					    </button>
					    <ul class="dropdown-menu" role="menu">
					      <li><a title="PDF" data-href="pdf/create_pdf.php?rec=mahasiswa&action=allPdf" class="btn-export">
					          <span class="fa fa-file-pdf-o"></span>&nbsp;PDF</a>
					      </li>
					      <li><a title="Excel" data-href="pdf/create_excel.php?rec=mahasiswa&action=allExcel" class="btn-export">
					          <span class="fa fa-file-excel-o"></span>&nbsp;Excel</a>
					      </li>
					    </ul>
					  </div>
					</div>
		      	</div>      

					<table data-toggle="table" data-url="json.php?rec=mahasiswa&action=get" data-show-refresh="true" 
							data-show-toggle="true" data-search="true" data-select-item-name="toolbar1" 
							data-pagination="true" data-sort-name="name" data-sort-order="asc" 
							data-click-to-select="true" class="table-data">
					    <thead>
					    <tr>
					        <th data-field="nim1" data-checkbox="true">NIM</th>
					        <th data-field="nim" data-sortable="true">NIM</th>
					        <th data-field="nama" data-sortable="true">Nama</th>
					        <th data-field="alamat" data-sortable="true" style='width: 20px !important;'>Alamat</th>
					        <th data-field="jenis_kelamin" data-sortable="true">Jenis Kelamin</th>
					        <th data-field="angkatan" data-sortable="true">Angkatan</th>
					        <th data-field="aksi"  data-sortable="true">Aksi</th>
					    </tr>
					    </thead>
					</table>
				</div>
			</div>
		</div>
	<?php
	}
		else if($rec == "dosen")
	{
	?>
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">Data Dosen</div>
				<div class="panel-body">

				<div class="button-control pull-left" style="margin-top: 10px;">
		          <a  type="button" data-toggle="tooltip" data-id="" 
		          	class="btn btn-primary tip btn-modal" title="Tambah Data" data-toggle="modal" >
		          <span class="fa fa-plus"></span>&nbsp;Tambah</a>
		          &nbsp;
		          <a type="button" data-toggle="tooltip" class="btn btn-danger tip btn-hapus" 
		          title="Hapus Semua" data-href="dash.php?rec=dosen&action=hapusSemua">
		          <span class="fa fa-trash-o"></span>&nbsp;Hapus Semua</a>
		      	</div>      

					<table data-toggle="table" data-url="json.php?rec=dosen&action=get" data-show-refresh="true" 
							data-show-toggle="true" data-search="true" data-select-item-name="toolbar1" 
							data-pagination="true" data-sort-name="name" data-sort-order="asc" 
							data-click-to-select="true" class="table-data">
					    <thead>
					    <tr>
					        <th data-field="nid1" data-checkbox="true">NID</th>
					        <th data-field="nid" data-sortable="true">NID</th>
					        <th data-field="nama"  data-sortable="true">Nama</th>
					        <th data-field="aksi"  data-sortable="true">Aksi</th>
					    </tr>
					    </thead>
					</table>
				</div>
			</div>
		</div>
	<?php
	}
		else if($rec == "detailDosen")
	{
	?>
		<div class="col-lg-12">
			<div class="panel panel-default">
			<?php 
				$nid = $_GET['data'];
				$sql = mysql_query("SELECT nama_dosen FROM data_dosen WHERE nid = '$nid' ");
				$row = mysql_fetch_array($sql);
			?>
				<div class="panel-heading">Dosen <?=$row['nama_dosen']?></div>
				<div class="panel-body">

				<div class="button-control pull-left" style="margin-top: 10px;">
		          <a  type="button" data-toggle="tooltip" data-id="" 
		          		class="btn btn-primary tip btn-modal" title="Tambah Data" 
		          		data-toggle="modal">
		          <span class="fa fa-plus"></span>&nbsp;Tambah Mata Kuliah</a>
		      	</div>      

					<table data-toggle="table" data-url="json.php?rec=detailDosen&action=get&data=<?=$_GET['data']?>" data-show-refresh="true" 
							data-show-toggle="true" data-search="true" data-select-item-name="toolbar1" 
							data-pagination="true" data-sort-name="name" data-sort-order="asc" 
							data-click-to-select="true" class="table-data">
					    <thead>
					    <tr>
					        <th data-field="kode_matkul"  data-sortable="true">Kode Mata Kuliah</th>
					        <th data-field="matkul"  data-sortable="true">Mata Kuliah</th>
					        <th data-field="sks"  data-sortable="true">SKS</th>
					        <th data-field="tahun_ajaran"  data-sortable="true">Tahun Ajaran</th>
					        <th data-field="aksi"  data-sortable="true">Aksi</th>
					    </tr>
					    </thead>
					</table>
				</div>
			</div>
		</div>
	<?php
	}
		else if($rec == "jurusan")
	{
	?>
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">Data Jurusan</div>
				<div class="panel-body">

				<div class="button-control pull-left" style="margin-top: 10px;">
		          <a  type="button" data-toggle="tooltip" data-id="" 
		          		class="btn btn-primary tip btn-modal" title="Tambah Data" data-toggle="modal" 
		          		>
		          <span class="fa fa-plus"></span>&nbsp;Tambah</a>
		          &nbsp;
		          <a type="button" data-toggle="tooltip" class="btn btn-danger tip btn-hapus" 
		          title="Hapus Semua" data-href="dash.php?rec=jurusan&action=hapusSemua">
		          <span class="fa fa-trash-o"></span>&nbsp;Hapus Semua</a>
		      	</div>      

					<table data-toggle="table" data-url="json.php?rec=jurusan&action=get" data-show-refresh="true" 
							data-show-toggle="true" data-search="true" data-select-item-name="toolbar1" 
							data-pagination="true" data-sort-name="name" data-sort-order="asc" 
							data-click-to-select="true" class="table-data">
					    <thead>
					    <tr>
					        <th data-field="kode_jurusan1" data-checkbox="true">Kode Jurusan</th>
					        <th data-field="kode_jurusan" data-sortable="true">Kode Jurusan</th>
					        <th data-field="jurusan"  data-sortable="true">Jurusan</th>
					        <th data-field="aksi"  data-sortable="true">Aksi</th>
					    </tr>
					    </thead>
					</table>
				</div>
			</div>
		</div>
	<?php
	}
		else if($rec == "tahun_ajaran")
	{
	?>
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">Tahun Ajaran</div>
				<div class="panel-body">

				<div class="button-control pull-left" style="margin-top: 10px;">
		          <a  type="button" data-toggle="tooltip" data-id="" 
		          		class="btn btn-primary tip btn-modal" title="Tambah Data" data-toggle="modal" 
		          		>
		          <span class="fa fa-plus"></span>&nbsp;Tambah</a>
		          &nbsp;
		          <a type="button" data-toggle="tooltip" class="btn btn-danger tip btn-hapus" 
		          title="Hapus Semua" data-href="dash.php?rec=tahun_ajaran&action=hapusSemua">
		          <span class="fa fa-trash-o"></span>&nbsp;Hapus Semua</a>
		      	</div>      

					<table data-toggle="table" data-url="json.php?rec=tahun_ajaran&action=get" data-show-refresh="true" 
							data-show-toggle="true" data-search="true" data-select-item-name="toolbar1" 
							data-pagination="true" data-sort-name="name" data-sort-order="asc" 
							data-click-to-select="true" class="table-data">
					    <thead>
					    <tr>
					        <th data-field="tahun_ajaran1" data-checkbox="true">Tahun Ajaran</th>
					        <th data-field="tahun_ajaran" data-sortable="true">Tahun Ajaran</th>
					        <th data-field="keterangan"  data-sortable="true">Keterangan</th>
					        <th data-field="aksi"  data-sortable="true">Aksi</th>
					    </tr>
					    </thead>
					</table>
				</div>
			</div>
		</div>
	<?php
	}
		else if($rec == "matkul")
	{
	?>
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">Data Mata Kuliah</div>
				<div class="panel-body">

				<div class="button-control pull-left" style="margin-top: 10px;">
		          <a  type="button" data-toggle="tooltip" data-id="" 
		          	class="btn btn-primary tip btn-modal" title="Tambah Data" data-toggle="modal" >
		          <span class="fa fa-plus"></span>&nbsp;Tambah</a>
		          &nbsp;
		          <a type="button" data-toggle="tooltip" class="btn btn-danger tip btn-hapus" 
		          title="Hapus Semua" data-href="dash.php?rec=matkul&action=hapusSemua">
		          <span class="fa fa-trash-o"></span>&nbsp;Hapus Semua</a>
		      	</div>      

					<table data-toggle="table" data-url="json.php?rec=matkul&action=get" data-show-refresh="true" 
							data-show-toggle="true" data-search="true" data-select-item-name="toolbar1" 
							data-pagination="true" data-sort-name="name" data-sort-order="asc" 
							data-click-to-select="true" class="table-data">
					    <thead>
					    <tr>
					        <th data-field="kode_matkul1" data-checkbox="true">Kode Mata Kuliah</th>
					        <th data-field="kode_matkul" data-sortable="true">Kode Mata Kuliah</th>
					        <th data-field="matkul"  data-sortable="true">Mata Kuliah</th>
					        <th data-field="sks"  data-sortable="true">SKS</th>
					        <th data-field="aksi"  data-sortable="true">Aksi</th>
					    </tr>
					    </thead>
					</table>
				</div>
			</div>
		</div>
	<?php
	}
		else if($rec == "kelas")
	{
	?>
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">Data Kelas</div>
				<div class="panel-body">

				<div class="button-control pull-left" style="margin-top: 10px;">
		          <a  type="button" data-toggle="tooltip" data-id="" 
		          		class="btn btn-primary tip btn-modal" title="Tambah Data" data-toggle="modal" 
		          		>
		          <span class="fa fa-plus"></span>&nbsp;Tambah</a>
		          &nbsp;
		          <a type="button" data-toggle="tooltip" class="btn btn-danger tip btn-hapus" 
		          title="Hapus Semua" data-href="dash.php?rec=kelas&action=hapusSemua">
		          <span class="fa fa-trash-o"></span>&nbsp;Hapus Semua</a>
		      	</div>      

					<table data-toggle="table" data-url="json.php?rec=kelas&action=get" data-show-refresh="true" 
							data-show-toggle="true" data-search="true" data-select-item-name="toolbar1" 
							data-pagination="true" data-sort-name="name" data-sort-order="asc" 
							data-click-to-select="true" class="table-data">
					    <thead>
					    <tr>
					        <th data-field="kode_kelas1" data-checkbox="true">Kode Kelas</th>
					        <th data-field="kode_kelas" data-sortable="true">Kode Kelas</th>
					        <th data-field="kelas"  data-sortable="true">Kelas</th>
					        <th data-field="aksi"  data-sortable="true">Aksi</th>
					    </tr>
					    </thead>
					</table>
				</div>
			</div>
		</div>
	<?php
	}
		else if($rec == "detailKelas")
	{
	?>
		<div class="col-lg-12">
			<div class="panel panel-default">
			<?php 
				$id_kelas = $_GET['data'];
				$sql = mysql_query("SELECT kelas FROM data_kelas WHERE id_kelas = '$id_kelas' ");
				$row = mysql_fetch_array($sql);
			?>
				<div class="panel-heading">Data Kelas <?=$row['kelas']?></div>
				<div class="panel-body">

				<div class="button-control pull-left" style="margin-top: 10px;">
		          <a  type="button" data-toggle="tooltip" data-id="" 
		          		class="btn btn-primary tip btn-modal" title="Tambah Data" 
		          		data-toggle="modal">
		          <span class="fa fa-plus"></span>&nbsp;Tambah Mahasiswa</a>
		      	</div>      

					<table data-toggle="table" data-url="json.php?rec=detailKelas&action=get&data=<?=$_GET['data']?>" data-show-refresh="true" 
							data-show-toggle="true" data-search="true" data-select-item-name="toolbar1" 
							data-pagination="true" data-sort-name="name" data-sort-order="asc" 
							data-click-to-select="true" class="table-data">
					    <thead>
					    <tr>
					        <th data-field="nim" data-sortable="true">NIM</th>
					        <th data-field="nama"  data-sortable="true">Nama</th>
					        <th data-field="kelas_asal"  data-sortable="true">Kelas Asal</th>
					        <th data-field="aksi"  data-sortable="true">Aksi</th>
					    </tr>
					    </thead>
					</table>
				</div>
			</div>
		</div>
	<?php
	}	
	else if($rec == "spp")
	{
	?>
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">Data SPP Mahasiswa</div>
				<div class="panel-body">

				<div class="button-control pull-left" style="margin-top: 10px;">
		          <a  type="button" data-toggle="tooltip" data-id="" 
		          		class="btn btn-primary tip btn-modal" title="Tambah Data" 
		          		data-toggle="modal" >
		          <span class="fa fa-plus"></span>&nbsp;Tambah</a>
		          &nbsp;
		          <a type="button" data-toggle="tooltip" class="btn btn-danger tip btn-hapus" 
		          title="Hapus Semua" data-href="dash.php?rec=spp&action=hapusSemua">
		          <span class="fa fa-trash-o"></span>&nbsp;Hapus Semua</a>
		      	</div>      

					<table data-toggle="table" data-url="json.php?rec=spp&action=get" data-show-refresh="true" 
							data-show-toggle="true" data-search="true" data-select-item-name="toolbar1" 
							data-pagination="true" data-sort-name="name" data-sort-order="asc" 
							data-click-to-select="true" class="table-data">
					    <thead>
					    <tr>
					        <th data-field="kode_spp1" data-checkbox="true">ID</th>
					        <th data-field="kode_spp" data-sortable="true">ID</th>
					        <th data-field="angkatan"  data-sortable="true">Angkatan</th>
					        <th data-field="jumlah_aal"  data-sortable="true">Biaya AAL</th>
					        <th data-field="jumlah_spp"  data-sortable="true">Biaya SPP</th>
					        <th data-field="aksi"  data-sortable="true">Aksi</th>
					    </tr>
					    </thead>
					</table>
				</div>
			</div>
		</div>
	<?php
	}
	else if($rec == "dpp")
	{
	?>
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">Data DPP Mahasiswa</div>
				<div class="panel-body">

				<div class="button-control pull-left" style="margin-top: 10px;">
		          <a  type="button" data-toggle="tooltip" data-id="" 
		          		class="btn btn-primary tip btn-modal" title="Tambah Data" 
		          		data-toggle="modal" >
		          <span class="fa fa-plus"></span>&nbsp;Tambah</a>
		          &nbsp;
		          <a type="button" data-toggle="tooltip" class="btn btn-danger tip btn-hapus" 
		          title="Hapus Semua" data-href="dash.php?rec=dpp&action=hapusSemua">
		          <span class="fa fa-trash-o"></span>&nbsp;Hapus Semua</a>
		      	</div>      

					<table data-toggle="table" data-url="json.php?rec=dpp&action=get" data-show-refresh="true" 
							data-show-toggle="true" data-search="true" data-select-item-name="toolbar1" 
							data-pagination="true" data-sort-name="name" data-sort-order="asc" 
							data-click-to-select="true" class="table-data">
					    <thead>
					    <tr>
					        <th data-field="kode_dpp1" data-checkbox="true">ID</th>
					        <th data-field="kode_dpp" data-sortable="true">ID</th>
					        <th data-field="angkatan"  data-sortable="true">Angkatan</th>
					        <th data-field="gelombang"  data-sortable="true">Gelombang</th>
					        <th data-field="jumlah_dpp"  data-sortable="true">Biaya DPP</th>
					        <th data-field="aksi"  data-sortable="true">Aksi</th>
					    </tr>
					    </thead>
					</table>
				</div>
			</div>
		</div>
	<?php
	}
	else if($rec == "administrator")
	{
	?>
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">Data Administrator</div>
				<div class="panel-body">

				<div class="button-control pull-left" style="margin-top: 10px;">
		          <a  type="button" data-toggle="tooltip" data-id="" 
		          		class="btn btn-primary tip btn-modal" title="Tambah Data" data-toggle="modal" >
		          <span class="fa fa-plus"></span>&nbsp;Tambah</a>
		          &nbsp;
		          <a type="button" data-toggle="tooltip" class="btn btn-danger tip btn-hapus" 
		          title="Hapus Semua" data-href="dash.php?rec=administrator&action=hapusSemua">
		          <span class="fa fa-trash-o"></span>&nbsp;Hapus Semua</a>
		      	</div>      

					<table data-toggle="table" data-url="json.php?rec=administrator&action=get" data-show-refresh="true" 
							data-show-toggle="true" data-search="true" data-select-item-name="toolbar1" 
							data-pagination="true" data-sort-name="name" data-sort-order="asc" 
							data-click-to-select="true" class="table-data">
					    <thead>
					    <tr>
					        <th data-field="nip1" data-checkbox="true">NIP</th>
					        <th data-field="nip" data-sortable="true">NIP</th>
					        <th data-field="nama" data-sortable="true">Nama</th>
					        <th data-field="alamat" data-sortable="true" style='width: 20px !important;'>Alamat</th>
					        <th data-field="jenis_kelamin" data-sortable="true">Jenis Kelamin</th>
					        <th data-field="status_bagian"  data-sortable="true">Bagian</th>
					        <th data-field="aksi"  data-sortable="true">Aksi</th>
					    </tr>
					    </thead>
					</table>
				</div>
			</div>
		</div>
	<?php
	}
	else if($rec == "bayar")
	{
	?>
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">Data Pembayaran</div>
				<div class="panel-body">

				<div class="button-control pull-left" style="margin-top: 10px;">
		          <a  type="button" data-toggle="tooltip" data-id="" 
		          		class="btn btn-primary tip btn-modal" title="Tambah Data" data-toggle="modal" >
		          <span class="fa fa-plus"></span>&nbsp;Tambah</a>
		          &nbsp;
		          <?php if($_SESSION['bagian'] == 'admin') {?>
		          <a type="button" data-toggle="tooltip" class="btn btn-danger tip btn-hapus" 
		          title="Hapus Semua" data-href="dash.php?rec=bayar&action=hapusSemua">
		          <span class="fa fa-trash-o"></span>&nbsp;Hapus Semua</a>
		          <?php } ?>
		      	</div>      

					<table data-toggle="table" data-url="json.php?rec=bayar&action=get" data-show-refresh="true" 
							data-show-toggle="true" data-search="true" data-select-item-name="toolbar1" 
							data-pagination="true" data-sort-name="name" data-sort-order="asc" 
							data-click-to-select="true" class="table-data">
					    <thead>
					    <tr>
					        <th data-field="no_transaksi" data-sortable="true">No Transaksi</th>
					        <th data-field="tgl_transaksi" data-sortable="true">Tgl Transaksi</th>
					        <th data-field="nim" data-sortable="true">NIM</th>
					        <th data-field="jenis_transaksi" data-sortable="true">Jenis</th>
					        <th data-field="cicilan_ke" data-sortable="true">Bayar Ke</th>
					        <th data-field="jumlah_pembayaran" data-sortable="true">Jumlah</th>
					        <th data-field="status"  data-sortable="true">Status</th>
					        <th data-field="admin"  data-sortable="true">Admin</th>
					        <th data-field="aksi"  data-sortable="true">Aksi</th>
					    </tr>
					    </thead>
					</table>
				</div>
			</div>
		</div>
	<?php
	}
		else if($rec == "absen")
	{
	?>
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">Absensi Mahasiswa</div>
				<div class="panel-body tabs">
					<ul class="nav nav-pills">
						<li class="active"><a href="#pilltab1" data-toggle="tab">Data Absensi</a></li>
						<li><a href="#pilltab2" data-toggle="tab">Absensi Baru</a></li>
						<li><a href="#pilltab3" data-toggle="tab">Cari Absensi</a></li>
					</ul>
					<div class="tab-content">
						<div class="tab-pane fade in active" id="pilltab1">
							<div class="col-lg-12">
								
										<table data-toggle="table" data-url="json.php?rec=absen&action=get" data-show-refresh="true" 
												data-show-toggle="true" data-search="true" data-select-item-name="toolbar1" 
												data-pagination="true" data-sort-name="name" data-sort-order="asc" 
												class="table-data">
										    <thead>
										    <tr>
										        <th data-field="kelas" data-sortable="true">Kelas</th>
										        <th data-field="dosen" data-sortable="true">Dosen Pengajar</th>
										        <th data-field="matkul" data-sortable="true">Mata Kuliah</th>
										        <th data-field="tahun_ajaran" data-sortable="true">Tahun Ajaran</th>
										        <th data-field="tanggal" data-sortable="true">Tanggal Kuliah</th>
										        <th data-field="jam_mulai" data-sortable="true">Jam Mulai</th>
										        <th data-field="jam_akhir" data-sortable="true">Jam Akhir</th>
										        <th data-field="aksi"  data-sortable="true">Aksi</th>
										    </tr>
										    </thead>
										</table>
								
							</div>					
						</div>
						<div class="tab-pane fade" id="pilltab2">
							<form  method="POST" action="dash.php?rec=absen&action=insert" class="form-horizontal form">
								<div class="input_data">
									
									<div class="form-group" >
										<label class="col-md-2 control-label" for="kode_jurusan">Kelas</label>
										<div class="col-md-3">
										<select name="kelas" class="form-control kelasSingle">
												<option>Kelas</option>
													<?php
														$sql = mysql_query("SELECT * FROM data_kelas") or die(mysql_error());
														while($row = mysql_fetch_array($sql))
														{
															echo "<option value='".$row['id_kelas']."'>".$row['kelas']."</option>";
														}
													?>
												</select>
										</div>
									</div>
									<div class="form-group" >
										<label class="col-md-2 control-label" for="kode_jurusan">Dosen Pengajar</label>
										<div class="col-md-3">
										<select name="nid" class="nidSingle" style="width: 100%;">
												<option>Dosen</option>
													<?php
														$sql = mysql_query("SELECT * FROM data_dosen") or die(mysql_error());
														while($row = mysql_fetch_array($sql))
														{
															echo "<option value='".$row['nid']."'>".$row['nama_dosen']."</option>";
														}
													?>
												</select>
										</div>
									</div>

									<div class="form-group" >
										<label class="col-md-2 control-label" for="kode_jurusan">Tahun Ajaran</label>
										<div class="col-md-2">
											<select name="tahun_ajaran" class="form-control thn_ajaranSearch">
												<option value="">Tahun Ajaran</option>
												<?php 
													$sql = mysql_query("SELECT * FROM data_thn_ajaran ORDER BY thn_ajaran DESC");

													while($data = mysql_fetch_array($sql))
													{
														echo "<option value='".$data['id_thn_ajaran']."'>".$data['thn_ajaran']."</option>";
													}
												?>
											</select>
										</div>
									</div>

									<div class="form-group" >
										<label class="col-md-2 control-label" for="kode_jurusan">Mata Kuliah</label>
										<div class="col-md-4">
											<select name="matkul" class="matkulSingle form-control" style="width: 80%; float: left;">	
											</select>
											<img src='image/loading.gif' style='width: 18px; height:18px; float: left; margin-left: 5px; margin-top: 2px;' class='loading-image'/>
										</div>
									</div>

									<div class="form-group" >
										<label class="col-md-2 control-label" for="kode_jurusan">Pertemuan</label>
										<div class="col-md-2">
											<select name="pertemuan" class="form-control thn_ajaranSearch">
												<option value="">Pertemuan</option>
												<?php 
													for($i = 1; $i<=16; $i++)
													{
														echo "<option value='".$i."'>".$i."</option>";
													}
												?>
											</select>
										</div>
									</div>

									<div class="form-group date" id='calender'>
										<label class="col-md-2 control-label" for="alamat">Tanggal Kuliah</label>
										<div class="col-md-3">
											<div class='input-group date' id='kalender'>
											    <input id="nama" name="tanggal_kuliah" type="text" 
														placeholder="Tanggal Kuliah" class="form-control" 
														data-date-format="DD-MM-YYYY" required>
											    <span class="input-group-addon">
											      <span class="glyphicon glyphicon-calendar"></span>
											    </span>
											</div>
										</div>
									</div>

									<div class="form-group date" id='calender'>
										<label class="col-md-2 control-label" for="alamat">Jam Mulai</label>
										<div class="col-md-2">
											<div class='input-group date' id='jam_mulai'>
											    <input id="nama" name="jam_mulai" type="text" 
														placeholder="Jam Mulai" class="form-control" required>
											    <span class="input-group-addon">
											      <span class="glyphicon glyphicon-time"></span>
											    </span>
											</div>
										</div>
									</div>

									<div class="form-group date" id='calender'>
										<label class="col-md-2 control-label" for="alamat">Jam Akhir</label>
										<div class="col-md-2">
											<div class='input-group date' id='jam_akhir'>
											    <input id="nama" name="jam_akhir" type="text" 
														placeholder="Jam Akhir" class="form-control" required>
											    <span class="input-group-addon">
											      <span class="glyphicon glyphicon-time"></span>
											    </span>
											</div>
										</div>
									</div>
								</div>
								</br>

								<table data-toggle="table" class="table-data table-absensi" >
								    <thead> 
								    <tr>
								        <th class="bs-checkbox">#</th>
								        <th>NIM</th>
								        <th>Nama</th>
								        <th>Kelas Asal</th>
								        <th>Masuk &nbsp; <input type="checkbox" class="checkAllM"></th>
								        <th>Sakit &nbsp; <input type="checkbox" class="checkAllS"></th>
								        <th>Ijin &nbsp; <input type="checkbox" class="checkAllI"></th>
								        <th>TK &nbsp; <input type="checkbox" class="checkAllT"></th>
								    </tr>
								    </thead>
									<tbody>
									</tbody>
								</table>
								
								</br>
								
									<div class="form-group">
										<div class="col-md-4 pull-right">
											<input type="submit" class="btn btn-info form-control btn-block " name="simpan" value="SIMPAN ABSENSI"/>
										</div>
									</div>
								
							</form>

						</div>
						<div class="tab-pane fade" id="pilltab3">
							<form  method="POST" action="dash.php?rec=absen&action=updateData" class="form-horizontal form">
								<div class="cari_data">
									
									<div class="form-group">
										<label class="col-md-2 control-label" for="nama"></label>
										<div class="col-md-3">
											<input type="radio" name="cariBy" value="siswa"/> Siswa
											&nbsp;
											<input type="radio" name="cariBy" value="kelas"/> Kelas
											&nbsp;
										</div>
									</div>

									<div class="form-group cariBynim">
										<label class="col-md-2 control-label" for="nama">NIM</label>
										<div class="col-md-3">
											<input id="e1" class="nimAuto" name="nim" type="hidden" 
											placeholder="NIM" required style="width: 200px;">
										</div>
									</div>

									<div class="form-group cariBykelas">
										<label class="col-md-2 control-label" for="kode_jurusan">Kelas</label>
										<div class="col-md-3">
										<select name="kelas" class="form-control kelasSingle">
												<option value="0">Kelas</option>
													<?php
														$sql = mysql_query("SELECT * FROM data_kelas") or die(mysql_error());
														while($row = mysql_fetch_array($sql))
														{
															echo "<option value='".$row['id_kelas']."'>".$row['kelas']."</option>";
														}
													?>
												</select>
										</div>
									</div>

									<div class="form-group cariBykelas">
										<label class="col-md-2 control-label" for="kode_jurusan">Dosen Pengajar</label>
										<div class="col-md-3">
										<select name="nid" class="nidSingle" style="width: 100%;">
												<option>Dosen</option>
													<?php
														$sql = mysql_query("SELECT * FROM data_dosen") or die(mysql_error());
														while($row = mysql_fetch_array($sql))
														{
															echo "<option value='".$row['nid']."'>".$row['nama_dosen']."</option>";
														}
													?>
												</select>
										</div>
									</div>

									<div class="form-group cariBykelas" >
										<label class="col-md-2 control-label" for="kode_jurusan">Tahun Ajaran</label>
										<div class="col-md-2">
											<select name="tahun_ajaran" class="form-control thn_ajaranSearch">
												<option value="">Tahun Ajaran</option>
												<?php 
													$sql = mysql_query("SELECT * FROM data_thn_ajaran ORDER BY thn_ajaran DESC");

													while($data = mysql_fetch_array($sql))
													{
														echo "<option value='".$data['id_thn_ajaran']."'>".$data['thn_ajaran']."</option>";
													}
												?>
											</select>
										</div>
									</div>

									<div class="form-group cariBykelas">
										<label class="col-md-2 control-label" for="kode_jurusan">Mata Kuliah</label>
										<div class="col-md-4">
											<select name="matkul" class="matkulSingle form-control" style="width: 80%; float: left;">	
											</select>
											<img src='image/loading.gif' style='width: 18px; height:18px; float: left; margin-left: 5px; margin-top: 2px;' class='loading-image'/>
										</div>
									</div>
									
									<div class="form-group date" id='calender'>
										<label class="col-md-2 control-label" for="alamat">Tanggal Kuliah</label>
										<div class="col-md-3">
											<div class='input-group date' id='kalender1'>
											    <input id="nama" name="tanggal_kuliah" type="text" 
														placeholder="Tanggal Kuliah" class="form-control" 
														data-date-format="DD-MM-YYYY" required>
											    <span class="input-group-addon">
											      <span class="glyphicon glyphicon-calendar"></span>
											    </span>
											</div>
										</div>
									</div>

									<div class="form-group">
										<label class="col-md-2 control-label" for="alamat"></label>
										<div class="col-md-3">
											<button type="button" class="btn btn-info form-control btncari-absen" style="float:left; width: 80%;">CARI ABSENSI</button>
											<img src='image/loading.gif' style='width: 18px; height:18px; float: left; margin-left: 5px; margin-top: 5px;' class='loading-image'/>
										</div>
									</div>
								</div>
								</br>

								<table data-toggle="table" class="table-cari" >
								    <thead> 
								    <tr>
								        <th class="bs-checkbox">#</th>
								        <th>NIM</th>
								        <th>Nama</th>
								        <th>Kelas Asal</th>
								        <th>Dosen Pengajar</th>
								        <th>Mata Kuliah</th>
								        <th>Masuk</th>
								        <th>Sakit</th>
								        <th>Ijin</th>
								        <th>TK</th>
								        <th>Aksi</th>
								    </tr>
								    </thead>
									<tbody>
									</tbody>
								</table>
								
								</br>
								
									<div class="form-group">
										<div class="col-md-4 pull-right">
											<input type="submit" class="btn btn-info form-control btn-block " name="submit" value="SIMPAN ABSENSI"/>
										</div>
									</div>
								
							</form>							
						</div>
					</div>
				
				</div>
			</div>
		</div>
	<?php
	} else if($rec == "detailAbsen") {
	?>
		<div class="col-lg-12">
			<div class="panel panel-default">
			<?php 
				$var = explode(",",$_GET['data']);
				$data = array(
					"data_absen.id_kelas"		=> $var[0],
					"data_absen.nid"			=> $var[1],
					"data_absen.kode_matkul"	=> $var[2],
					"tanggal"					=> $var[3],
					"jam_mulai"					=> $var[4],
					"jam_akhir"					=> $var[5],
				);

				$args = array();
				foreach($data as $field=>$value){
						// Seperate each column out with it's corresponding value
					$args[]=$field.'="'.$value.'"';
				}
				$sql = mysql_query("SELECT *, DATE_FORMAT(data_absen.tanggal,'%d-%m-%Y') as tanggal_kuliah, data_kelas.kelas, data_dosen.nama_dosen, data_matakuliah.mata_kuliah , data_thn_ajaran.thn_ajaran FROM data_absen "
									." JOIN data_kelas on data_absen.id_kelas = data_kelas.id_kelas"
									." JOIN data_dosen on data_absen.nid = data_dosen.nid"
									." JOIN data_matakuliah on data_absen.kode_matkul = data_matakuliah.kode_matkul"
									." JOIN data_thn_ajaran on data_absen.id_thn_ajaran = data_thn_ajaran.id_thn_ajaran"
									." WHERE ".implode(' AND ',$args)." LIMIT 1");
				$row = mysql_fetch_array($sql);
			?>
				<div class="panel-heading">Detail Absen</div>
				<div class="panel-body">
					<form class="form-horizontal form" action="dash.php?rec=absen&action=updateData" method="POST">
						<div class="input_data">
										
							<div class="form-group" >
								<label class="col-md-2 control-label" for="kode_jurusan">Kelas</label>
								<div class="col-md-3">
									<?=$row['kelas']?>
								</div>
							</div>
							<div class="form-group" >
								<label class="col-md-2 control-label" for="kode_jurusan">Dosen Pengajar</label>
								<div class="col-md-3">
									<?=$row['nama_dosen']?>
								</div>
							</div>

							<div class="form-group" >
								<label class="col-md-2 control-label" for="kode_jurusan">Mata Kuliah</label>
								<div class="col-md-4">
									<?=$row['mata_kuliah']?>
								</div>
							</div>

							<div class="form-group" >
								<label class="col-md-2 control-label" for="kode_jurusan">Tahun Ajaran</label>
								<div class="col-md-2">
									<?=$row['thn_ajaran']?>
								</div>
							</div>

							<div class="form-group" >
								<label class="col-md-2 control-label" for="kode_jurusan">Pertemuan</label>
								<div class="col-md-2">
									<?=$row['pertemuan']?>
								</div>
							</div>

							<div class="form-group date" id='calender'>
								<label class="col-md-2 control-label" for="alamat">Tanggal Kuliah</label>
								<div class="col-md-3">
									<?=date("d-M-Y", strtotime($row['tanggal_kuliah']))?>
								</div>
							</div>

							<div class="form-group date" id='calender'>
								<label class="col-md-2 control-label" for="alamat">Jam Mulai</label>
								<div class="col-md-2">
									<?=$row['jam_mulai']?>
								</div>
							</div>

							<div class="form-group date" id='calender'>
								<label class="col-md-2 control-label" for="alamat">Jam Akhir</label>
								<div class="col-md-2">
									<?=$row['jam_akhir']?>
								</div>
							</div>
						</div>

					<table data-toggle="table" data-search="true" data-select-item-name="toolbar1" 
							data-pagination="true" class="table-data"
							data-sort-name="nim" data-sort-order="asc" >
						
					    <thead> 
					    <tr>
					        <th class="bs-checkbox">#</th>
					        <th>NIM</th>
					        <th>Nama</th>
					        <th>Masuk</th>
					        <th>Sakit</th>
					        <th>Ijin</th>
					        <th>TK</th>
					        <th>Aksi</th>
					    </tr>
					    </thead>
						<tbody>
							<?php 
								$query = mysql_query("SELECT *, DATE_FORMAT(data_absen.tanggal,'%d-%m-%Y') as tanggal_kuliah, data_kelas.kelas, data_dosen.nama_dosen, data_matakuliah.mata_kuliah , data_mahasiswa.nama FROM data_absen "
													." JOIN data_kelas on data_absen.id_kelas = data_kelas.id_kelas"
													." JOIN data_dosen on data_absen.nid = data_dosen.nid"
													." JOIN data_matakuliah on data_absen.kode_matkul = data_matakuliah.kode_matkul"
													." JOIN data_mahasiswa on data_absen.nim = data_mahasiswa.nim"
													." WHERE ".implode(' AND ',$args)." ");
								$i= 1;
								while($cols = mysql_fetch_array($query))
								{

							?>
							<tr>
                                <td class='bs-checkbox'><?=$i?></td>
                                <td><?=$cols['nim']?></td>
                                <td><?=$cols['nama']?></td>
                                <td><input class='aksiAbsensiM' type='checkbox' <?=($cols['kehadiran'] == '1' ? "checked=checked" : "")?> name='update[<?=$cols['id_absen']?>]' value='1'></td>
                                <td><input class='aksiAbsensiS' type='checkbox' <?=($cols['kehadiran'] == '2' ? "checked=checked" : "")?> name='update[<?=$cols['id_absen']?>]' value='2'></td>
                                <td><input class='aksiAbsensiS' type='checkbox' <?=($cols['kehadiran'] == '3' ? "checked=checked" : "")?> name='update[<?=$cols['id_absen']?>]' value='3'></td>
                                <td><input class='aksiAbsensiS' type='checkbox' <?=($cols['kehadiran'] == '4' ? "checked=checked" : "")?> name='update[<?=$cols['id_absen']?>]' value='4'></td>
                                <td><a type='button' class='btn btn-danger tip' data-href='dash.php?rec=absen&action=hapusData&data=<?=$cols['id_absen']?>' data-toggle='modal' data-target='#confirm-delete'>
                                <span class='glyphicon glyphicon-remove'></span>
                                </a></td>
                            </tr>
							<?php $i++;}?>			
						</tbody>
					</table>
								
					</br>
							
					<div class="form-group">
						<div class="col-md-4 pull-right">
							<input type="submit" class="btn btn-info form-control btn-block" name="submit" value="SIMPAN ABSENSI"/>
						</div>
					</div>
				</form>	
				</div>
			</div>
		</div>
	<?php } ?>



<?php include 'rec_modal.php' ?>
<?php include 'rec_action.php' ?>