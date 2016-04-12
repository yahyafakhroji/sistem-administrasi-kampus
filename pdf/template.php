<?php 
	if(isset($_GET['rec']))
	{
		$rec=$_GET['rec'];
	}
	else
	{
		$rec="";
	}

	if(isset($_GET['action']))
	{
		$action=$_GET['action'];
	}
	else
	{
		$action="";
	}
?>

<html>
<head>
	<title></title>

</head>
<body>
	<!-- <div class="header" style="margin-bottom: 5px;">
		<table border="0">
			<tr>
				<td rowspan="3" style="padding-right: 20px;"><img src="../image/logo_sttar.jpg" width="80px" ></td>
				<td><h2 style="margin-bottom: 0px; margin-top: 0px;"> S T T A R</h2></td>
			</tr>
			<tr>
				<td><h3 style="margin-bottom: 0px; margin-top: 0px;">SEKOLAH TINGGI TEKNIK ATLAS NUSANTARA</h3></td>
			</tr>
			<tr>
				<td><font style="font-size: 17px;">Jl. TELUK PACITAN No.50 Lt.1 MALANG, TELP. (0343) 475898</font></td>
			</tr>
		</table>
	</div> -->
	<?php 
	if ($rec == 'mahasiswa') 
	{ 
	?>
		<div class="kartu_judul" style="width: 100%; border-top: solid 1px #000; border-bottom: solid 1px #000;  ">
			<center><h2 style="margin-bottom: 10px; margin-top: 10px;">RINCIAN DATA MAHASISWA</h2></center>
		</div>
	<?php
		if($action == 'singlePdf')
		{
			$data = $_GET['data'];
			$sql = mysql_query("SELECT data_mahasiswa.*, data_kelas.kelas , data_jurusan.jurusan as konsentrasi FROM data_mahasiswa "
								."JOIN data_jurusan on data_mahasiswa.id_jurusan = data_jurusan.id_jurusan "
								."JOIN data_kelas on data_mahasiswa.id_kelas = data_kelas.id_kelas "
								."WHERE data_mahasiswa.nim = '$data' LIMIT 1") or die(mysql_error());
			$result = mysql_fetch_array($sql);


	?>
	
	<div class="data_kartu" style="width: 90%; position: relative; left: 40px;">
		<table border="0" cellpadding="2" cellspacing="2" width="100%" style="line-height: 25px;margin-top: 10px;font-size: 17px;">
			<tr>
				<td>Nama</td>
				<td style="text-align: center;">:</td>
				<td><?=$result['nama']?></td>
			</tr>
			<tr>
				<td>Konsentrasi</td>
				<td style="text-align: center;">:</td>
				<td><?=$result['konsentrasi']?></td>
			</tr>
			<tr>
				<td>NIM</td>
				<td style="text-align: center;">:</td>
				<td><?=$result['nim']?></td>
			</tr>
			<tr>
				<td>Tempat Lahir</td>
				<td style="text-align: center;">:</td>
				<td><?=$result['tempat_lahir']?></td>
			</tr>
			<tr>
				<td>Tanggal Lahir</td>
				<td style="text-align: center;">:</td>
				<td><?=date('d-m-Y', strtotime($result['tanggal_lahir']))?></td>
			</tr>
			<tr>
				<td>Jenis Kelamin</td>
				<td style="text-align: center;">:</td>
				<td><?=($result['jenis_kelamin'] == 'L')? 'Laki-Laki': 'Perempuan'?></td>
			</tr>
			<tr>
				<td>Agama</td>
				<td style="text-align: center;">:</td>
				<td><?=$result['agama']?></td>
			</tr>
			<tr>
				<td>Asal Sekolah</td>
				<td style="text-align: center;">:</td>
				<td><?=$result['asal_sma']?></td>
			</tr>
			<tr>
				<td>Jurusan</td>
				<td style="text-align: center;">:</td>
				<td><?=$result['jurusan']?></td>
			</tr>
			<tr>
				<td>Tahun Lulus</td>
				<td style="text-align: center;">:</td>
				<td><?=$result['tahun_lulus']?></td>
			</tr>
			<tr>
				<td>Alamat</td>
				<td style="text-align: center;">:</td>
				<td><?=$result['alamat']?></td>
			</tr>
			<tr>
				<td>Kota</td>
				<td style="text-align: center;">:</td>
				<td><?=$result['kota']?></td>
			</tr>
			<tr>
				<td>Angkatan / Kelas</td>
				<td style="text-align: center;">:</td>
				<td><?="20".$result['id_angkatan']?> / <?=$result['kelas']?></td>
			</tr>
		</table>
	</div>
	<?php 
			$name = $data;
		}
		else if($action == 'allPdf')
		{
	?>
	<div class="data_kartu">
		<table border="1" cellspacing="0" cellpadding="2" width="100%" style="margin-top: 10px;font-size: 13px;">
			<thead>
				<tr>
				    <th>No</th>
				    <th>Nama</th>
				    <th>Konsentrasi</th>
				    <th>Tempat Lahir</th>
				    <th>Tanggal Lahir</th>
				    <th>Jenis Kelamin</th>
				    <th>Agama</th>
				    <th>Asal SMA</th>
				    <th>Jurusan</th>
					<th>Tahun Lulus</th>
				    <th>Alamat</th>
				    <th>Kota</th>
				    <th>Angkatan / Kelas</th>
				</tr>
			 </thead>
			<tbody>
				<?php 
					$data = $_GET['data'];
					$i = 1;
					$sql = mysql_query("SELECT data_mahasiswa.*, data_kelas.kelas , data_jurusan.jurusan as konsentrasi FROM data_mahasiswa "
										."JOIN data_jurusan on data_mahasiswa.id_jurusan = data_jurusan.id_jurusan "
										."JOIN data_kelas on data_mahasiswa.id_kelas = data_kelas.id_kelas "
										."WHERE data_mahasiswa.nim in (".$data.")" ) or die(mysql_error());
					while($result = mysql_fetch_array($sql))
					{
				?>
					<tr>
						<td><?=$i?></td>
					    <td><?=$result['nama']?></td>
					    <td><?=$result['konsentrasi']?></td>
					    <td><?=$result['tempat_lahir']?></td>
					    <td><?=date('d-m-Y',strtotime($result['tanggal_lahir']))?></td>
					    <td><?=$result['jenis_kelamin']?></td>
					    <td><?=$result['agama']?></td>
					    <td><?=$result['asal_sma']?></td>
					    <td><?=$result['jurusan']?></td>
						<td><?=$result['tahun_lulus']?></td>
					    <td><?=$result['alamat']?></td>
					    <td><?=$result['kota']?></td>
					    <td><?="20".$result['id_angkatan']?> / <?=$result['kelas']?></td>
					</tr>
				<?php 
					$i++;
					}
				?>
			</tbody>
		</table>
	</div>	
	<?php
			$name = "Data-Mahasiswa";
		}
	}
	?>
</body>

</html>