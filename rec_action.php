<?php
	
	if(isset($_GET['action']))
	{
		$action=$_GET['action'];
	}
	else
	{
		$action="";
	}

	if($rec == 'mahasiswa')
	{
		if($action == 'insert')
		{
			$data = array(
				"nama"			=> $_POST['nama'],
				"id_jurusan"	=> substr($_POST['nim'], 0, 2),	
				"nim"			=> $_POST['nim'],
				"tempat_lahir"	=> $_POST['tempat_lahir'],
				"tanggal_lahir"	=> date("Y-m-d", strtotime($_POST['tanggal_lahir'])),
				"jenis_kelamin"	=> $_POST['jenis_kelamin'],
				"agama"			=> $_POST['agama'],					
				"asal_sma"		=> $_POST['asal_sma'],					
				"jurusan"		=> $_POST['jurusan'],					
				"tahun_lulus"	=> $_POST['tahun_lulus'],					
				"alamat"		=> $_POST['alamat'],
				"kota"			=> $_POST['kota'],
				"id_kelas"		=> $_POST['kelas'],
				"id_angkatan"	=> substr($_POST['nim'], 2, 2),					
				"gelombang"		=> $_POST['gelombang'],
			);
			//mysql_query("insert into jenis_batik set nama='$nama'");
			$sql 	= 'INSERT INTO data_mahasiswa (`'.implode('`, `',array_keys($data)).'`) '
					.'VALUES ("' . implode('", "', $data) . '") ' or die(mysql_error());

			$query 	= mysql_query($sql);
			
			if($query)
			{
				header("location:dash.php?rec=mahasiswa&alert=tambah&msg=1");
			}
			else
			{
				header("location:dash.php?rec=mahasiswa&msg=0");	
			}
		}
		else if($action == "update")
		{
			$nim		= $_GET['data'];

			$data = array(
				"nama"			=> $_POST['nama'],
				"id_jurusan"	=> substr($_POST['nim'], 0, 2),	
				"nim"			=> $_POST['nim'],
				"tempat_lahir"	=> $_POST['tempat_lahir'],
				"tanggal_lahir"	=> date("Y-m-d", strtotime($_POST['tanggal_lahir'])),
				"jenis_kelamin"	=> $_POST['jenis_kelamin'],
				"agama"			=> $_POST['agama'],					
				"asal_sma"		=> $_POST['asal_sma'],					
				"jurusan"		=> $_POST['jurusan'],					
				"tahun_lulus"	=> $_POST['tahun_lulus'],					
				"alamat"		=> $_POST['alamat'],
				"kota"			=> $_POST['kota'],
				"id_kelas"		=> $_POST['kelas'],
				"id_angkatan"	=> substr($_POST['nim'], 2, 2),					
				"gelombang"		=> $_POST['gelombang'],
			);

			$args = array();
			foreach($data as $field=>$value){
					// Seperate each column out with it's corresponding value
				$args[]=$field.'="'.$value.'"';
			}
			

			$sql=mysql_query('UPDATE data_mahasiswa SET '.implode(',',$args).' WHERE nim ='.$nim) or die(mysql_error());

			header("location:dash.php?rec=mahasiswa&alert=update&msg=1");
		}
		else if($action == "hapus" )
		{
				$nim = $_GET['data'];
				/*$sql = mysql_query("SELECT foto FROM data_mahasiswa WHERE nim = '$nim'")or die(mysql_error());
				$data = mysql_fetch_array($sql);
				unlink("image/upload/foto/".$data['foto']);*/

				mysql_query("delete from data_mahasiswa where nim = '$nim'");
				header("location:dash.php?rec=mahasiswa&alert=hapus&msg=1");
		}
		else if($action == "hapusSemua")
		{
			$id_data = $_GET['data'];

			/*$array=explode(",", $id_data);
			foreach($array as $nim)
			{
				$sql = mysql_query("SELECT foto FROM data_mahasiswa WHERE nim = '$nim'")or die(mysql_error());
				$data = mysql_fetch_array($sql);
				unlink("image/upload/foto/".$data['foto']);
			}*/

			$query = mysql_query('delete from data_mahasiswa where nim in ('.$id_data.')') or die(mysql_error());
			if($query){
	    		header("location:dash.php?rec=mahasiswa&alert=hapus&msg=1");
	    	}
	    	else{
	    		header("location:dash.php?rec=mahasiswa&msg=0");
	    	}
		}
	}
	else if($rec == 'dosen')
	{
		if($action == 'insert')
		{
			$data = array(
				"nid"			=> $_POST['nid'],
				"nama_dosen"	=> mysql_real_escape_string($_POST['nama']),
			);

			$sql = 'INSERT INTO data_dosen (`'.implode('`, `',array_keys($data)).'`) '
				.'VALUES ("' . implode('", "', $data) . '") ' or die(mysql_error());

			$query 	= mysql_query($sql);

			if($query)
			{
				header("location:dash.php?rec=dosen&alert=tambah&msg=1");
			}
			else
			{
				header("location:dash.php?rec=dosen&msg=0");	
			}

		}
		else if($action == "hapus" )
		{
				$nid = $_GET['data'];
				mysql_query("delete from data_dosen where nid='$nid'");
				header("location:dash.php?rec=dosen&alert=hapus&msg=1");
		}
		else if($action == "update")
		{
			$nid	= $_GET['data'];

			$data = array(
				"nid"			=> $_POST['nid'],
				"nama_dosen"	=> mysql_real_escape_string($_POST['nama']),
			);

			$args = array();
			foreach($data as $field=>$value){
					// Seperate each column out with it's corresponding value
				$args[]=$field.'="'.$value.'"';
			}
			

			$sql=mysql_query('UPDATE data_dosen SET '.implode(',',$args).' WHERE nid ='.$nid) or die(mysql_error());

			header("location:dash.php?rec=dosen&alert=update&msg=1");
		}
		else if($action == "hapusSemua")
		{
			$data = $_GET['data'];
			$id_data = '"'.str_replace(",", '","', $data).'"';

			$query = mysql_query('delete from data_dosen where nid in ('.$id_data.')') or die(mysql_error());
			if($query){
	    		header("location:dash.php?rec=dosen&alert=hapus&msg=1");
	    	}
	    	else{
	    		header("location:dash.php?rec=dosen&msg=0");
	    	}
		}

	}
	else if($rec == 'detailDosen')
	{
		if($action == 'insert')
		{
			$kode_matkul 	= $_POST['kode_matkul'];
			$tahun_ajaran 	= $_POST['tahun_ajaran'];
			$nid 		= $_GET['data'];

			
			$data = array(
				"nid"				=> $nid,
				"kode_matkul"		=> $kode_matkul,
				"id_thn_ajaran"		=> $tahun_ajaran,
			);

				$sql = 'INSERT INTO dosen_matkul (`'.implode('`, `',array_keys($data)).'`) '
					.'VALUES ("' . implode('", "', $data) . '") ';
			

			$query 	= mysql_query($sql) or die(mysql_error());

			if($query)
			{
				header("location:dash.php?rec=detailDosen&alert=tambah&msg=1&data=$nid");
			}
			else
			{
				header("location:dash.php?rec=detailDosen&msg=0&data=$nid");	
			}

		}
		else if($action == "hapus" )
		{
				$data 		= explode(",", $_GET['data']);
				$id_dosen_matkul 	= $data[0];
				$nid = $data[1];

				
				$sql = "DELETE from dosen_matkul where id_dosen_matkul ='$id_dosen_matkul' ";
				

				mysql_query($sql);
				header("location:dash.php?rec=detailDosen&data=$nid&alert=hapus&msg=1");
		}

	}
	else if($rec == 'jurusan')
	{
		if($action == 'insert')
		{
			$data = array(
				"id_jurusan"	=> $_POST['kode_jurusan'],
				"jurusan"		=> $_POST['jurusan']
			);

			$sql = 'INSERT INTO data_jurusan (`'.implode('`, `',array_keys($data)).'`) '
				.'VALUES ("' . implode('", "', $data) . '") ' or die(mysql_error());

			$query 	= mysql_query($sql);

			if($query)
			{
				header("location:dash.php?rec=jurusan&alert=tambah&msg=1");
			}
			else
			{
				header("location:dash.php?rec=jurusan&msg=0");	
			}

		}
		else if($action == "hapus" )
		{
				$id_jurusan = $_GET['data'];
				mysql_query("delete from data_jurusan where id_jurusan='$id_jurusan'");
				header("location:dash.php?rec=jurusan&alert=hapus&msg=1");
		}
		else if($action == "update")
		{
			$id_jurusan	= $_GET['data'];

			$data = array(
				"id_jurusan"	=> $_POST['kode_jurusan'],
				"jurusan"		=> $_POST['jurusan']
			);

			$args = array();
			foreach($data as $field=>$value){
					// Seperate each column out with it's corresponding value
				$args[]=$field.'="'.$value.'"';
			}
			

			$sql=mysql_query('UPDATE data_jurusan SET '.implode(',',$args).' WHERE id_jurusan ='.$id_jurusan) or die(mysql_error());

			header("location:dash.php?rec=jurusan&alert=update&msg=1");
		}
		else if($action == "hapusSemua")
		{
			$id_data = $_GET['data'];
			$query = mysql_query('delete from data_jurusan where id_jurusan in ('.$id_data.')') or die(mysql_error());
			if($query){
	    		header("location:dash.php?rec=jurusan&alert=hapus&msg=1");
	    	}
	    	else{
	    		header("location:dash.php?rec=jurusan&msg=0");
	    	}
		}

	}
	else if($rec == 'tahun_ajaran')
	{
		if($action == 'insert')
		{
			$data = array(
				"thn_ajaran"	=> $_POST['tahun_ajaran'],
				"keterangan"	=> $_POST['keterangan']
			);

			$sql = 'INSERT INTO data_thn_ajaran (`'.implode('`, `',array_keys($data)).'`) '
				.'VALUES ("' . implode('", "', $data) . '") ' or die(mysql_error());

			$query 	= mysql_query($sql);

			if($query)
			{
				header("location:dash.php?rec=tahun_ajaran&alert=tambah&msg=1");
			}
			else
			{
				header("location:dash.php?rec=tahun_ajaran&msg=0");	
			}

		}
		else if($action == "hapus" )
		{
				$id_thn_ajaran = $_GET['data'];
				mysql_query("delete from data_thn_ajaran where id_thn_ajaran='$id_thn_ajaran'");
				header("location:dash.php?rec=tahun_ajaran&alert=hapus&msg=1");
		}
		else if($action == "update")
		{
			$id_thn_ajaran	= $_GET['data'];

			$data = array(
				"thn_ajaran"	=> $_POST['tahun_ajaran'],
				"keterangan"	=> $_POST['keterangan']
			);

			$args = array();
			foreach($data as $field=>$value){
					// Seperate each column out with it's corresponding value
				$args[]=$field.'="'.$value.'"';
			}
			

			$sql=mysql_query('UPDATE data_thn_ajaran SET '.implode(',',$args).' WHERE id_thn_ajaran ='.$id_thn_ajaran) or die(mysql_error());

			header("location:dash.php?rec=tahun_ajaran&alert=update&msg=1");
		}
		else if($action == "hapusSemua")
		{
			$id_data = $_GET['data'];
			$query = mysql_query('delete from data_thn_ajaran where id_thn_ajaran in ('.$id_data.')') or die(mysql_error());
			if($query){
	    		header("location:dash.php?rec=tahun_ajaran&alert=hapus&msg=1");
	    	}
	    	else{
	    		header("location:dash.php?rec=tahun_ajaran&msg=0");
	    	}
		}

	}
	else if($rec == 'matkul')
	{
		if($action == 'insert')
		{
			$data = array(
				"kode_matkul"	=> $_POST['kode_matkul'],
				"mata_kuliah"	=> $_POST['matkul'],
				"sks"			=> $_POST['sks'],
			);

			$sql = 'INSERT INTO data_matakuliah (`'.implode('`, `',array_keys($data)).'`) '
				.'VALUES ("' . implode('", "', $data) . '") ' or die(mysql_error());

			$query 	= mysql_query($sql);

			if($query)
			{
				header("location:dash.php?rec=matkul&alert=tambah&msg=1");
			}
			else
			{
				header("location:dash.php?rec=matkul&msg=0");	
			}

		}
		else if($action == "hapus" )
		{
				$kode_matkul = $_GET['data'];
				mysql_query("delete from data_matakuliah where kode_matkul='$kode_matkul'");
				header("location:dash.php?rec=matkul&alert=hapus&msg=1");
		}
		else if($action == "update")
		{
			$kode_matkul	= $_GET['data'];

			$data = array(
				"kode_matkul"	=> $_POST['kode_matkul'],
				"mata_kuliah"	=> $_POST['matkul'],
				"sks"			=> $_POST['sks'],
			);

			$args = array();
			foreach($data as $field=>$value){
					// Seperate each column out with it's corresponding value
				$args[]=$field.'="'.$value.'"';
			}
			

			$sql=mysql_query('UPDATE data_matakuliah SET '.implode(',',$args).' WHERE kode_matkul ="'.$kode_matkul.'"') or die(mysql_error());

			header("location:dash.php?rec=matkul&alert=update&msg=1");
		}
		else if($action == "hapusSemua")
		{
			$data = $_GET['data'];
			$id_data = '"'.str_replace(",", '","', $data).'"';
			$query = mysql_query('delete from data_matakuliah where kode_matkul in ('.$id_data.')') or die(mysql_error());
			if($query){
	    		header("location:dash.php?rec=matkul&alert=hapus&msg=1");
	    	}
	    	else{
	    		header("location:dash.php?rec=matkul&msg=0");
	    	}
		}

	}
	else if($rec == 'kelas')
	{
		if($action == 'insert')
		{
			$data = array(
				"id_kelas"	=> $_POST['kode_kelas'],
				"kelas"		=> $_POST['kelas']
			);

			$sql = 'INSERT INTO data_kelas (`'.implode('`, `',array_keys($data)).'`) '
				.'VALUES ("' . implode('", "', $data) . '") ' or die(mysql_error());

			$query 	= mysql_query($sql);

			if($query)
			{
				header("location:dash.php?rec=kelas&alert=tambah&msg=1");
			}
			else
			{
				header("location:dash.php?rec=kelas&msg=0");	
			}

		}
		else if($action == "hapus" )
		{
				$id_kelas = $_GET['data'];
				mysql_query("delete from data_kelas where id_kelas ='$id_kelas'");
				header("location:dash.php?rec=kelas&alert=hapus&msg=1");
		}
		else if($action == "update")
		{
			$id_kelas	= $_GET['data'];

			$data = array(
				"id_kelas"		=> $_POST['kode_kelas'],
				"kelas"			=> $_POST['kelas']
			);

			$args = array();
			foreach($data as $field=>$value){
					// Seperate each column out with it's corresponding value
				$args[]=$field.'="'.$value.'"';
			}
			

			$sql=mysql_query('UPDATE data_kelas SET '.implode(',',$args).' WHERE id_kelas ='.$id_kelas) or die(mysql_error());

			header("location:dash.php?rec=kelas&alert=update&msg=1");
		}
		else if($action == "hapusSemua")
		{
			$id_data = $_GET['data'];
			$query = mysql_query('delete from data_kelas where id_kelas in ('.$id_data.')') or die(mysql_error());
			if($query){
	    		header("location:dash.php?rec=kelas&alert=hapus&msg=1");
	    	}
	    	else{
	    		header("location:dash.php?rec=kelas&msg=0");
	    	}
		}

	}
	else if($rec == 'detailKelas')
	{
		if($action == 'insert')
		{
			$nim = $_POST['nim'];
			$id_kelas = $_GET['data'];

			//Check Kelas
			
			$get = mysql_query("SELECT id_kelas FROM data_mahasiswa WHERE nim = '$nim'");
			$cols = mysql_fetch_array($get);
			if($cols['id_kelas'] == '0')
			{
				$sql = "UPDATE data_mahasiswa SET id_kelas = '$id_kelas' WHERE nim = '$nim' ";
			}
			else
			{
				$data = array(
					"nim"				=> $nim,
					"kelas_asal"		=> $cols['id_kelas'],
					"kelas_tambahan"	=> $id_kelas,
				);

				$sql = 'INSERT INTO kelas_tambahan (`'.implode('`, `',array_keys($data)).'`) '
					.'VALUES ("' . implode('", "', $data) . '") ';
			}

			$query 	= mysql_query($sql) or die(mysql_error());

			if($query)
			{
				header("location:dash.php?rec=detailKelas&alert=tambah&msg=1&data=$id_kelas");
			}
			else
			{
				header("location:dash.php?rec=detailKelas&msg=0&data=$id_kelas");	
			}

		}
		else if($action == "hapus" )
		{
				$data 		= explode(",", $_GET['data']);
				$nim 		= $data[0];
				$kelas_asal = $data[1];
				$kelas 		= $data[2];

				if($kelas == $kelas_asal)
				{
					$sql = "UPDATE data_mahasiswa SET id_kelas = '0' WHERE nim = '$nim' ";		
				}
				else 
				{
					$sql = "DELETE from kelas_tambahan where kelas_tambahan ='$kelas' AND nim = '$nim' ";
				}

				mysql_query($sql);
				header("location:dash.php?rec=detailKelas&data=$kelas&alert=hapus&msg=1");
		}

	}
	else if($rec == 'absen')
	{
		if($action == 'insert')
		{
			if($_POST['simpan'])
			{
				foreach ($_POST['aksi'] as $key => $value) {
					$val = explode(",", $value);

					$data = array(
						"nim"			=> $key,
						"id_kelas"		=> $val[1],
						"nid"			=> $_POST['nid'],
						"kode_matkul"	=> $_POST['matkul'],
						"id_thn_ajaran"	=> $_POST['tahun_ajaran'],
						"pertemuan"		=> $_POST['pertemuan'],
						"tanggal"		=> date("Y-m-d", strtotime($_POST['tanggal_kuliah'])),
						"jam_mulai"		=> $_POST['jam_mulai'].":00",
						"jam_akhir"		=> $_POST['jam_akhir'].":00",
						"kehadiran"		=> $val[0],
					);
						$sql = 'INSERT INTO data_absen (`'.implode('`, `',array_keys($data)).'`) '
								.'VALUES ("' . implode('", "', $data) . '") ' or die(mysql_error());

						$query 	= mysql_query($sql);

						if($query)
						{
							header("location:dash.php?rec=absen&alert=tambah&msg=1");
						}
						else
						{
							header("location:dash.php?rec=absen&msg=0");	
						}
				}
			}

		}
		else if($action == 'updateData')
		{
			if($_POST['submit'])
			{
				foreach ($_POST['update'] as $key => $value) {
			
					
					$data = array(
						"kehadiran"	=> $value,
					);

					$args = array();
					foreach($data as $field=>$value){
							// Seperate each column out with it's corresponding value
						$args[]=$field.'="'.$value.'"';
					}
					

					$sql=mysql_query('UPDATE data_absen SET '.implode(',',$args).' WHERE id_absen ='.$key) or die(mysql_error());

					if($sql)
					{
						header("location:dash.php?rec=absen&alert=update&msg=1");
					}
					else
					{
						header("location:dash.php?rec=absen&msg=0");	
					}

				}
			}
		}
		else if($action == "hapus")
		{
			//$var = $result['id_kelas'].",".$result['nid'].",".$result['kode_matkul'].",".$result['tanggal'].",".$result['jam_mulai'].",".$result['jam_akhir'];
			$var = explode(",",$_GET['data']);
			$data = array(
				"id_kelas"		=> $var[0],
				"nid"			=> $var[1],
				"kode_matkul"	=> $var[2],
				"tanggal"		=> $var[3],
				"jam_mulai"		=> $var[4],
				"jam_akhir"		=> $var[5],
			);

			$args = array();
			foreach($data as $field=>$value){
					// Seperate each column out with it's corresponding value
				$args[]=$field.'="'.$value.'"';
			}
			mysql_query("delete from data_absen where ".implode(' AND ',$args));
			
			header("location:dash.php?rec=absen&alert=hapus&msg=1");
		}
		else if($action == "update")
		{
			//$var = $result['id_kelas'].",".$result['nid'].",".$result['kode_matkul'].",".$result['tanggal'].",".$result['jam_mulai'].",".$result['jam_akhir'];
			$var = explode(",",$_GET['data']);
			$data = array(
				"id_kelas"		=> $var[0],
				"nid"			=> $var[1],
				"kode_matkul"	=> $var[2],
				"tanggal"		=> $var[3],
				"jam_mulai"		=> $var[4],
				"jam_akhir"		=> $var[5],
			);

			$data2 = array(
				"id_kelas"		=> $_POST['kelas'],
				"nid"			=> $_POST['nid'],
				"kode_matkul"	=> $_POST['matkul'],
				"id_thn_ajaran"	=> $_POST['tahun_ajaran'],
				"pertemuan"		=> $_POST['pertemuan'],
				"tanggal"		=> date("Y-m-d", strtotime($_POST['tanggal_kuliah'])),
				"jam_mulai"		=> $_POST['jam_mulai'],
				"jam_akhir"		=> $_POST['jam_akhir'],
			);

			$args = array();
			$args2 = array();
			foreach($data as $field=>$value){
					// Seperate each column out with it's corresponding value
				$args[]=$field.'="'.$value.'"';
			}

			foreach($data2 as $field2=>$value2){
					// Seperate each column out with it's corresponding value
				$args2[]=$field2.'="'.$value2.'"';
			}
			
			$sql = mysql_query("UPDATE data_absen SET ".implode(',',$args2)." where ".implode(' AND ',$args)) or die(mysql_error());
			//echo "UPDATE data_absen SET ".implode(',',$args2)." where ".implode(' AND ',$args);
			header("location:dash.php?rec=absen&alert=update&msg=1");
		}
		else if($action == "hapusData" )
		{
				$id_data = $_GET['data'];
				mysql_query("delete from data_absen where id_absen='$id_data'");
				header("location:dash.php?rec=absen&alert=hapus&msg=1");
		}

	}
	else if($rec == 'spp')
	{
		if($action == 'insert')
		{
			$data = array(
				"id_angkatan"	=> substr($_POST['angkatan'], 2, 2),
				"jumlah_aal"	=> $_POST['jumlah_aal'],
				"jumlah_spp"	=> $_POST['jumlah_spp'],
			);

			$sql = 'INSERT INTO data_spp_aal (`'.implode('`, `',array_keys($data)).'`) '
				.'VALUES ("' . implode('", "', $data) . '") ' or die(mysql_error());

			$query 	= mysql_query($sql);

			if($query)
			{
				header("location:dash.php?rec=spp&alert=tambah&msg=1");
			}
			else
			{
				header("location:dash.php?rec=spp&msg=0");	
			}

		}
		else if($action == "hapus" )
		{
				$id_spp = $_GET['data'];
				mysql_query("delete from data_spp_aal where id_spp='$id_spp'");
				header("location:dash.php?rec=spp&alert=hapus&msg=1");
		}
		else if($action == "update")
		{
			$id_spp	= $_GET['data'];

			$data = array(
				"id_angkatan"	=> substr($_POST['angkatan'], 2, 2),
				"jumlah_aal"	=> $_POST['jumlah_aal'],
				"jumlah_spp"	=> $_POST['jumlah_spp'],
			);

			$args = array();
			foreach($data as $field=>$value){
					// Seperate each column out with it's corresponding value
				$args[]=$field.'="'.$value.'"';
			}
			

			$sql=mysql_query('UPDATE data_spp_aal SET '.implode(',',$args).' WHERE id_spp ='.$id_spp) or die(mysql_error());

			header("location:dash.php?rec=spp&alert=update&msg=1");
		}
		else if($action == "hapusSemua")
		{
			$id_data = $_GET['data'];
			$query = mysql_query('delete from data_spp_aal where id_spp in ('.$id_data.')') or die(mysql_error());
			if($query){
	    		header("location:dash.php?rec=spp&alert=hapus&msg=1");
	    	}
	    	else{
	    		header("location:dash.php?rec=spp&msg=0");
	    	}
		}

	}
	else if($rec == 'dpp')
	{
		if($action == 'insert')
		{
			$data = array(
				"id_angkatan"	=> substr($_POST['angkatan'], 2, 2),
				"gelombang"		=> $_POST['gelombang'],
				"jumlah_dpp"	=> $_POST['jumlah_dpp'],
			);

			$sql = 'INSERT INTO data_dpp (`'.implode('`, `',array_keys($data)).'`) '
				.'VALUES ("' . implode('", "', $data) . '") ' or die(mysql_error());

			$query 	= mysql_query($sql);

			if($query)
			{
				header("location:dash.php?rec=dpp&alert=tambah&msg=1");
			}
			else
			{
				header("location:dash.php?rec=dpp&msg=0");	
			}

		}
		else if($action == "hapus" )
		{
				$id_dpp = $_GET['data'];
				mysql_query("delete from data_dpp where id_dpp='$id_dpp'");
				header("location:dash.php?rec=dpp&alert=hapus&msg=1");
		}
		else if($action == "update")
		{
			$id_dpp	= $_GET['data'];

			$data = array(
				"id_angkatan"	=> substr($_POST['angkatan'], 2, 2),
				"gelombang"		=> $_POST['gelombang'],
				"jumlah_dpp"	=> $_POST['jumlah_dpp'],
			);

			$args = array();
			foreach($data as $field=>$value){
					// Seperate each column out with it's corresponding value
				$args[]=$field.'="'.$value.'"';
			}
			

			$sql=mysql_query('UPDATE data_dpp SET '.implode(',',$args).' WHERE id_dpp ='.$id_dpp) or die(mysql_error());

			header("location:dash.php?rec=dpp&alert=update&msg=1");
		}
		else if($action == "hapusSemua")
		{
			$id_data = $_GET['data'];
			$query = mysql_query('delete from data_dpp where id_dpp in ('.$id_data.')') or die(mysql_error());

			if($query){
	    		header("location:dash.php?rec=dpp&alert=hapus&msg=1");
	    	}
	    	else{
	    		header("location:dash.php?rec=dpp&msg=0");
	    	}
		}

	}
	else if($rec == 'administrator')
	{
		if($action == 'insert')
		{
			
			$ext = explode(".", $_FILES['foto']['name']);

			$fotofolder 	= "image/upload/foto/";
			$fotofolder 	= $fotofolder . basename($_POST['nip']."_".$_POST['nama'].".".$ext[1]);

			$upload_foto = move_uploaded_file($_FILES["foto"]["tmp_name"], $fotofolder);

			if($upload_foto)
			{
				$data = array(
					"nip"			=> $_POST['nip'],
					"nama"			=> $_POST['nama'],
					"jenis_kelamin"	=> $_POST['jenis_kelamin'],
					"alamat"		=> $_POST['alamat'],
					"email"			=> $_POST['email'],
					"password"		=> md5($_POST['password']),
					"status_bagian"	=> $_POST['status_bagian'],
					"foto"			=> $_POST['nip']."_".$_POST['nama'].".".$ext[1],//File Cover PDF --> Image
				);
				//mysql_query("insert into jenis_batik set nama='$nama'");
				$sql 	= 'INSERT INTO data_admin (`'.implode('`, `',array_keys($data)).'`) '
						.'VALUES ("' . implode('", "', $data) . '") ' or die(mysql_error());

				$query 	= mysql_query($sql);
				
				if($query)
				{
					header("location:dash.php?rec=administrator&alert=tambah&msg=1");
				}
				else
				{
					header("location:dash.php?rec=administrator&msg=0");	
				}
			} else {
				header("location:dash.php?rec=administrator&msg=0");	
			}
			
		}
		else if($action == "update")
		{
			$nip		= $_GET['data'];
			$sql 		= mysql_query("SELECT foto, password FROM data_admin WHERE nip = '$nip'");
			$dataFoto 	= mysql_fetch_array($sql);

			$ext = explode(".", $_FILES['foto']['name']);

			if($_FILES['foto']['size'] == 0)
			{
				$file_foto = $_POST['last_foto'];
			}
			else
			{	
				unlink("image/upload/foto/".$dataFoto['foto']);


				$fotofolder 	= "image/upload/foto/";
				$fotofolder 	= $fotofolder . basename($_POST['nip']."_".$_POST['nama'].".".$ext[1]);

				$upload_foto 	= move_uploaded_file($_FILES["foto"]["tmp_name"], $fotofolder);

				$file_foto = $_POST['nip']."_".$_POST['nama'].".".$ext[1];
			}

			if($_POST['password'] == "")
			{
				$password = $dataFoto['password'];
			}
			else
			{
				$password = md5($_POST['password']);
			}


			$data = array(
					"nip"			=> $_POST['nip'],
					"nama"			=> $_POST['nama'],
					"alamat"		=> $_POST['alamat'],
					"jenis_kelamin"	=> $_POST['jenis_kelamin'],
					"email"			=> $_POST['email'],
					"status_bagian"	=> $_POST['status_bagian'],
					"foto"			=> $file_foto,//File Cover PDF --> Image
					"password"		=> $password,
				);

			$args = array();
			foreach($data as $field=>$value){
					// Seperate each column out with it's corresponding value
				$args[]=$field.'="'.$value.'"';
			}
			

			$sql=mysql_query('UPDATE data_admin SET '.implode(',',$args).' WHERE nip ='.$nip) or die(mysql_error());

			header("location:dash.php?rec=administrator&alert=update&msg=1");
		}
		else if($action == "hapus" )
		{
				$nip = $_GET['data'];
				$sql = mysql_query("SELECT foto FROM data_admin WHERE nip = '$nip'")or die(mysql_error());
				$data = mysql_fetch_array($sql);
				unlink("image/upload/foto/".$data['foto']);

				mysql_query("delete from data_admin where nip = '$nip'");
				header("location:dash.php?rec=administrator&alert=hapus&msg=1");
		}
		else if($action == "hapusSemua")
		{
			$id_data = $_GET['data'];

			$array=explode(",", $id_data);
			foreach($array as $nim)
			{
				$sql = mysql_query("SELECT foto FROM data_admin WHERE nip = '$nip'")or die(mysql_error());
				$data = mysql_fetch_array($sql);
				unlink("image/upload/foto/".$data['foto']);
			}

			$query = mysql_query('delete from data_admin where nip in ('.$id_data.')') or die(mysql_error());
			if($query){
	    		header("location:dash.php?rec=administrator&alert=hapus&msg=1");
	    	}
	    	else{
	    		header("location:dash.php?rec=administrator&msg=0");
	    	}
		}
	}
	else if($rec == 'bayar')
	{
		if($action == 'insert')
		{

			if ($_POST['jenis_transaksi'] == 'Lain') {
				$jenis_transaksi = 	$_POST['lain'];
			}
			else
			{
				$jenis_transaksi = 	$_POST['jenis_transaksi'];	
			}

			$data = array(
				"no_transaksi"		=> $_POST['no_transaksi'],
				"tgl_transaksi"		=> date('Y-m-d',strtotime(now)),
				"nim"				=> $_POST['nim'],
				"jenis_transaksi"	=> $jenis_transaksi,
				"cicilan_ke"		=> $_POST['cicilan_ke'],
				"jumlah_pembayaran"	=> $_POST['pembayaran'],
				"status"			=> $_POST['status'],
				"id_admin"			=> $_SESSION['nip'],
			);

			$sql = 'INSERT INTO data_pembayaran (`'.implode('`, `',array_keys($data)).'`) '
				.'VALUES ("' . implode('", "', $data) . '") ' or die(mysql_error());

			$query 	= mysql_query($sql);

			if($query)
			{
				header("location:dash.php?rec=bayar&alert=tambah&msg=1");
			}
			else
			{
				//header("location:dash.php?rec=dpp&msg=0");	
			}

		}
		else if($action == "hapus" )
		{
				$no_transaksi = $_GET['data'];
				mysql_query("delete from data_pembayaran where no_transaksi='$no_transaksi'");
				header("location:dash.php?rec=bayar&alert=hapus&msg=1");
		}
		else if($action == "update")
		{
			$no_transaksi	= $_GET['data'];
			$sql = "SELECT data_pembayaran.*, data_mahasiswa.nama, data_spp_aal.*, data_dpp.jumlah_dpp FROM data_pembayaran, data_mahasiswa"
		        		." JOIN data_spp_aal ON data_mahasiswa.id_angkatan = data_spp_aal.id_angkatan" 
		        		." JOIN data_dpp ON data_mahasiswa.gelombang = data_dpp.gelombang AND data_mahasiswa.id_angkatan = data_dpp.id_angkatan"
		        		." WHERE no_transaksi = $no_transaksi LIMIT 1";
		    $result = mysql_query($sql);
		    $r = mysql_fetch_array($result);

		    if($r['status'] == 'Belum')
		    {
		    	$jumlah = $_POST['last_bayar'] + $_POST['pembayaran'];
		    }
		    else
		    {
		    	$jumlah = $_POST['pembayaran'];
		    }

			$data = array(
				"cicilan_ke"		=> $_POST['cicilan_ke'],
				"jumlah_pembayaran"	=> $jumlah,
				"status_pembayaran"	=> $_POST['status_pembayaran'],
				"status"			=> $_POST['status'],
			);

			$args = array();
			foreach($data as $field=>$value){
					// Seperate each column out with it's corresponding value
				$args[]=$field.'="'.$value.'"';
			}
			

			$sql=mysql_query('UPDATE data_pembayaran SET '.implode(',',$args).' WHERE no_transaksi ='.$no_transaksi) or die(mysql_error());

			header("location:dash.php?rec=bayar&alert=update&msg=1");
		}
	}