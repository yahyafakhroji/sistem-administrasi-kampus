<?php 

	require_once '../conn.php';
	error_reporting(E_ALL & ~E_NOTICE);
	if(isset($_GET['rec']))
	{
		$rec=$_GET['rec'];
	}
	else
	{
		$rec="";
	}

	if(isset($_POST['submit']))
	{
		
		if(is_uploaded_file($_FILES['file-csv']['tmp_name']))
		{
			readfile($_FILES['file-csv']['tmp_name']);
		}

		//import file upload to database
		$handle = fopen($_FILES['file-csv']['tmp_name'],"r");

		while(($data = fgetcsv($handle, 1000,",")) !== FALSE)
		{
			$key = array(
				"nama"			=> mysql_real_escape_string($data[0]),
				"id_jurusan"	=> mysql_real_escape_string($data[1]),	
				"nim"			=> mysql_real_escape_string($data[2]),
				"tempat_lahir"	=> mysql_real_escape_string($data[3]),
				"tanggal_lahir"	=> mysql_real_escape_string($data[4]),
				"jenis_kelamin"	=> mysql_real_escape_string($data[5]),
				"agama"			=> mysql_real_escape_string($data[6]),					
				"asal_sma"		=> mysql_real_escape_string($data[7]),					
				"jurusan"		=> mysql_real_escape_string($data[8]),					
				"tahun_lulus"	=> mysql_real_escape_string($data[9]),					
				"alamat"		=> mysql_real_escape_string($data[10]),
				"kota"			=> mysql_real_escape_string($data[11]),
				"id_kelas"		=> mysql_real_escape_string($data[12]),
				"id_angkatan"	=> substr(mysql_real_escape_string($data[2]),2,2),					
				"gelombang"		=> mysql_real_escape_string($data[13]),
			);
			$import 	= 'INSERT INTO data_mahasiswa (`'.implode('`, `',array_keys($key)).'`) '
					.'VALUES ("' . implode('", "', $key) . '") ' or die(mysql_error());

			/*$import = "INSERT into data_mahasiswa "
					."VALUES('".mysql_real_escape_string($data[0])."','".$data[1]."','".$data[2]."','".$data[3]."','".$data[4]."','".$data[5]."','".$data[6]."','".$data[7]."','".$data[8]."','".$data[9]."','".$data[10]."','".$data[11]."','".$data[12]."','".$data[13]."','".$data[14]."')";*/
			mysql_query($import) or die(mysql_error());
		}
		fclose($handle);
		//echo "Import Success";
		header("location:../dash.php?rec=mahasiswa&alert=tambah&msg=1");
		
	}

