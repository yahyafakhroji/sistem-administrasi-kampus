<?php
	require_once '../conn.php';
	// error_reporting(E_ALL & ~E_NOTICE);
	if(isset($_GET['rec']))
	{
		$rec=$_GET['rec'];
	}
	else
	{
		$rec="";
	}

	if($rec == 'mahasiswa')
	{
		$filename = "Data_Mahasiswa.csv";
		$id_data = $_GET['data'];
		//Pengambilan Data
		$sql = mysql_query("SELECT nama, data_jurusan.jurusan as konsentrasi, nim, tempat_lahir, tanggal_lahir, jenis_kelamin, agama, asal_sma, data_mahasiswa.jurusan, tahun_lulus, alamat, kota, data_kelas.kelas FROM data_mahasiswa "
				."JOIN data_jurusan on data_mahasiswa.id_jurusan = data_jurusan.id_jurusan "
				."JOIN data_kelas on data_mahasiswa.id_kelas = data_kelas.id_kelas "
				."WHERE data_mahasiswa.nim in (".$id_data.")") or die(mysql_error());
	}

	// Fetch Record from Database
	$output = "";
	$table = ""; // Enter Your Table Name 
	//$sql = mysql_query("select * from data_mahasiswa");
	$columns_total = mysql_num_fields($sql);

	// Get The Field Name

	for ($i = 0; $i < $columns_total; $i++) 
	{
		$heading = mysql_field_name($sql, $i);
		$header = ucwords(str_replace('_', ' ', $heading));
		$output .= '"'.$header.'",';
	}
		$output .="\n";

	// Get Records from the table

	while ($row = mysql_fetch_array($sql)) 
	{
		for ($i = 0; $i < $columns_total; $i++) 
		{
			$output .='"'.$row["$i"].'",';
		}
		$output .="\n";
	}

	// Download the file

	header('Content-type: application/csv');
	header('Content-Disposition: attachment; filename='.$filename);

	echo $output;