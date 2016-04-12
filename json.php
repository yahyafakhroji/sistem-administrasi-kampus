<?php
	require_once 'conn.php';

	error_reporting(E_ALL & ~E_NOTICE);

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

	if($rec == 'mahasiswa')
	{
		if($action == 'get')
		{
			$sql 	= mysql_query("SELECT data_mahasiswa.*, SUBSTRING(alamat, 1, 30) as alamat_pendek, data_jurusan.jurusan FROM data_mahasiswa "
								."JOIN data_jurusan on data_mahasiswa.id_jurusan = data_jurusan.id_jurusan "
								."ORDER BY data_mahasiswa.nim ASC");
			$data 	= array();

			while($result = mysql_fetch_array($sql))
			{ //href='dash.php?rec=jurusan&action=hapus&data=".$result['id_jurusan']."'
				$data[] = array(
						"nim1"			=> $result['nim'],
						"nim"			=> $result['nim'],
						"nama"			=> $result['nama'],
						"alamat"		=> $result['alamat_pendek'],
						"jenis_kelamin"	=> $result['jenis_kelamin'],
						"angkatan"		=> "20".$result['id_angkatan'],
						"aksi" 			=> "<div class='btn-group btn-aksi' href='#'>"
								              ."<a type='button' class='btn btn-default btn-perbarui' data-function='mahasiswa' data-id='".$result['nim']."' data-toggle='modal' data-target='#updateModal'>"
								                ."<span class='glyphicon glyphicon-edit'></span>"
								              ."</a>"
								              ."<a type='button' class='btn btn-danger tip' data-href='dash.php?rec=mahasiswa&action=hapus&data=".$result['nim']."' data-toggle='modal' data-target='#confirm-delete'>"
								                ."<span class='glyphicon glyphicon-remove'></span>"
								              ."</a>"
								              ."<a type='button' class='btn btn-info tip' title='Export PDF' target='_blank' href='pdf/create_pdf.php?rec=mahasiswa&action=singlePdf&data=".$result['nim']."'>"
								                ."<span class='glyphicon glyphicon-export'></span>"
								              ."</a>"
								            ."</div>"
					);
			}

			echo json_encode($data);
		}
		else if($action == 'perbarui')	
		{
			$nim = $_GET['data'];
			$sql = mysql_query("SELECT *, DATE_FORMAT(data_mahasiswa.tanggal_lahir,'%d-%m-%Y') as tanggal, data_kelas.kelas FROM data_mahasiswa "
				."JOIN data_kelas on data_mahasiswa.id_kelas = data_kelas.id_kelas "
				."WHERE nim = '$nim' LIMIT 1") or die(mysql_error());

	        $r = mysql_fetch_assoc($sql);
	        print json_encode($r);
		}
	}
	else if($rec == 'dosen')
	{
		if($action == 'get')
		{
			$sql = mysql_query("SELECT * FROM data_dosen");

	        $data = array();
	        
			while($result = mysql_fetch_array($sql))
			{ //href='dash.php?rec=jurusan&action=hapus&data=".$result['id_jurusan']."'
				$data[] = array(
						"nid1"			=> $result['nid'],
						"nid"			=> $result['nid'],
						"nama" 			=> $result['nama_dosen'],
						"aksi" 			=> "<div class='btn-group btn-aksi' href='#'>"
											  ."<a type='button' class='btn btn-info' href='dash.php?rec=detailDosen&data=".$result['nid']."'>"
								                ."<span class='glyphicon glyphicon-info-sign'></span>"
								              ."</a>"
								              ."<a type='button' class='btn btn-default btn-perbarui' data-function='dosen' data-id='".$result['nid']."' data-toggle='modal' data-target='#updateModal'>"
								                ."<span class='glyphicon glyphicon-edit'></span>"
								              ."</a>"
								              ."<a type='button' class='btn btn-danger tip' data-href='dash.php?rec=dosen&action=hapus&data=".$result['nid']."' data-toggle='modal' data-target='#confirm-delete'>"
								                ."<span class='glyphicon glyphicon-remove'></span>"
								              ."</a>"
								            ."</div>"
					);
			}

			echo json_encode($data);
		}
		else if($action == 'perbarui')	
		{
			$nid = $_GET['data'];
			$sql = mysql_query("SELECT *  FROM data_dosen WHERE nid = '$nid' LIMIT 1") or  die(mysql_error());

	        $r = mysql_fetch_assoc($sql);
	        print json_encode($r);
		}
	}
	else if($rec == 'jurusan')
	{
		if($action == 'get')
		{
			$sql = mysql_query("SELECT * FROM data_jurusan");

	        $data = array();
	        
			while($result = mysql_fetch_array($sql))
			{ //href='dash.php?rec=jurusan&action=hapus&data=".$result['id_jurusan']."'
				$data[] = array(
						"kode_jurusan1"	=> $result['id_jurusan'],
						"kode_jurusan"	=> $result['id_jurusan'],
						"jurusan" 		=> $result['jurusan'],
						"aksi" 			=> "<div class='btn-group btn-aksi' href='#'>"
								              ."<a type='button' class='btn btn-default btn-perbarui' data-function='jurusan' data-id='".$result['id_jurusan']."' data-toggle='modal' data-target='#updateModal'>"
								                ."<span class='glyphicon glyphicon-edit'></span>"
								              ."</a>"
								              ."<a type='button' class='btn btn-danger tip' data-href='dash.php?rec=jurusan&action=hapus&data=".$result['id_jurusan']."' data-toggle='modal' data-target='#confirm-delete'>"
								                ."<span class='glyphicon glyphicon-remove'></span>"
								              ."</a>"
								            ."</div>"
					);
			}

			echo json_encode($data);
		}
		else if($action == 'perbarui')	
		{
			$id_jurusan = $_GET['data'];
			$sql = mysql_query("SELECT *  FROM data_jurusan WHERE id_jurusan = '$id_jurusan' LIMIT 1") or  die(mysql_error());

	        $r = mysql_fetch_assoc($sql);
	        print json_encode($r);
		}
	}
	else if($rec == 'tahun_ajaran')
	{
		if($action == 'get')
		{
			$sql = mysql_query("SELECT * FROM data_thn_ajaran");

	        $data = array();
	        
			while($result = mysql_fetch_array($sql))
			{ //href='dash.php?rec=jurusan&action=hapus&data=".$result['id_jurusan']."'
				$data[] = array(
						"tahun_ajaran1"	=> $result['thn_ajaran'],
						"tahun_ajaran"	=> $result['thn_ajaran'],
						"keterangan" 	=> $result['keterangan'],
						"aksi" 			=> "<div class='btn-group btn-aksi' href='#'>"
								              ."<a type='button' class='btn btn-default btn-perbarui' data-function='tahun_ajaran' data-id='".$result['id_thn_ajaran']."' data-toggle='modal' data-target='#updateModal'>"
								                ."<span class='glyphicon glyphicon-edit'></span>"
								              ."</a>"
								              ."<a type='button' class='btn btn-danger tip' data-href='dash.php?rec=tahun_ajaran&action=hapus&data=".$result['id_thn_ajaran']."' data-toggle='modal' data-target='#confirm-delete'>"
								                ."<span class='glyphicon glyphicon-remove'></span>"
								              ."</a>"
								            ."</div>"
					);
			}

			echo json_encode($data);
		}
		else if($action == 'perbarui')	
		{
			$id_thn_ajaran = $_GET['data'];
			$sql = mysql_query("SELECT *  FROM data_thn_ajaran WHERE id_thn_ajaran = '$id_thn_ajaran' LIMIT 1") or  die(mysql_error());

	        $r = mysql_fetch_assoc($sql);
	        print json_encode($r);
		}
	}
	else if($rec == 'matkul')
	{
		if($action == 'get')
		{
			$sql = mysql_query("SELECT * FROM data_matakuliah");

	        $data = array();
	        
			while($result = mysql_fetch_array($sql))
			{ //href='dash.php?rec=jurusan&action=hapus&data=".$result['id_jurusan']."'
				$data[] = array(
						"kode_matkul1"	=> $result['kode_matkul'],
						"kode_matkul"	=> $result['kode_matkul'],
						"matkul" 		=> $result['mata_kuliah'],
						"sks" 			=> $result['sks'],
						"aksi" 			=> "<div class='btn-group btn-aksi' href='#'>"
								              ."<a type='button' class='btn btn-default btn-perbarui' data-function='matkul' data-id='".$result['kode_matkul']."' data-toggle='modal' data-target='#updateModal'>"
								                ."<span class='glyphicon glyphicon-edit'></span>"
								              ."</a>"
								              ."<a type='button' class='btn btn-danger tip' data-href='dash.php?rec=matkul&action=hapus&data=".$result['kode_matkul']."' data-toggle='modal' data-target='#confirm-delete'>"
								                ."<span class='glyphicon glyphicon-remove'></span>"
								              ."</a>"
								            ."</div>"
					);
			}

			echo json_encode($data);
		}
		else if($action == 'perbarui')	
		{
			$kode_matkul = $_GET['data'];
			$sql = mysql_query("SELECT *  FROM data_matakuliah WHERE kode_matkul = '$kode_matkul' LIMIT 1") or  die(mysql_error());

	        $r = mysql_fetch_assoc($sql);
	        print json_encode($r);
		}
	}
	else if($rec == 'detailDosen')
	{
		if($action == 'get')
		{
			$id_data = $_GET['data'];
			$sql = mysql_query("SELECT dosen_matkul.*, data_matakuliah.*, data_thn_ajaran.thn_ajaran FROM dosen_matkul "
								."JOIN data_matakuliah ON dosen_matkul.kode_matkul = data_matakuliah.kode_matkul "
								."JOIN data_thn_ajaran ON dosen_matkul.id_thn_ajaran = data_thn_ajaran.id_thn_ajaran "
								."WHERE dosen_matkul.nid = '$id_data' ");

	        $data = array();
	        
			while($result = mysql_fetch_array($sql))
			{ //href='dash.php?rec=jurusan&action=hapus&data=".$result['id_jurusan']."'
				$data[] = array(
						"kode_matkul"	=> $result['kode_matkul'],
						"matkul"		=> $result['mata_kuliah'],
						"sks"			=> $result['sks'],
						"tahun_ajaran"	=> $result['thn_ajaran'],
						"aksi" 			=> "<div class='btn-group btn-aksi' href='#'>"
								              ."<a type='button' class='btn btn-danger tip' data-href='dash.php?rec=detailDosen&action=hapus&data=".$result['id_dosen_matkul'].",".$id_data."' data-toggle='modal' data-target='#confirm-delete'>"
								                ."<span class='glyphicon glyphicon-remove'></span>"
								              ."</a>"
								            ."</div>"
					);
			}

			echo json_encode($data);
		}
		else if($action == 'getMatkul')
		{
			$row = array();
		    $return_arr = array();
		    $row_array = array();

		    if((isset($_GET['term']) && strlen($_GET['term']) > 0) || (isset($_GET['id']) && is_numeric($_GET['id'])))
		    {

		        if(isset($_GET['term']))
		        {
		            $getVar = $_GET['term'];
		            $whereClause =  " kode_matkul LIKE '%" . $getVar ."%' ";
		        }
		        elseif(isset($_GET['id']))
		        {
		            $whereClause =  " kode_matkul = $getVar ";
		        }
		        /* limit with page_limit get */

		        $limit = intval($_GET['page_limit']);

		        $sql = "SELECT * FROM data_matakuliah"
		        		." WHERE $whereClause LIMIT $limit";

		        /** @var $result MySQLi_result */
		        $result = mysql_query($sql);

		            if(mysql_num_rows($result) > 0)
		            {

		                while($row = mysql_fetch_array($result))
		                {
		                    $row_array['id'] = $row['kode_matkul'];
		                    $row_array['text'] = $row['mata_kuliah'];
		                    array_push($return_arr,$row_array);
		                }

		            }
		    }
		    else
		    {
		        $row_array['id'] = 0;
		        $row_array['text'] = utf8_encode('Start Typing....');
		        array_push($return_arr,$row_array);

		    }

		    $ret = array();
		    /* this is the return for a single result needed by select2 for initSelection */
		    if(isset($_GET['id']))
		    {
		        $ret = $row_array;
		    }
		    /* this is the return for a multiple results needed by select2
		    * Your results in select2 options needs to be data.result
		    */
		    else
		    {
		        $ret['results'] = $return_arr;
		    }
		    echo json_encode($ret);

		}
	}
	else if($rec == 'absen')
	{
		if($action == 'get')
		{
			$sql = mysql_query("SELECT data_absen.*, data_thn_ajaran.thn_ajaran ,data_dosen.nama_dosen, data_kelas.kelas, data_matakuliah.mata_kuliah FROM data_absen "
				    . "JOIN data_kelas ON data_absen.id_kelas = data_kelas.id_kelas "
				    . "JOIN data_dosen ON data_absen.nid = data_dosen.nid "
				    . "JOIN data_matakuliah ON data_absen.kode_matkul = data_matakuliah.kode_matkul  "
				    . "JOIN data_thn_ajaran ON data_absen.id_thn_ajaran = data_thn_ajaran.id_thn_ajaran  "
				    . "GROUP BY data_absen.nid, data_absen.kode_matkul, data_absen.id_kelas, tanggal, jam_mulai, jam_akhir "
				    . "ORDER BY tanggal DESC");

	        $data = array();
	        
			while($result = mysql_fetch_array($sql))
			{ //href='dash.php?rec=jurusan&action=hapus&data=".$result['id_jurusan']."'
				$var = mysql_real_escape_string($result['id_kelas'].",".$result['nid'].",".$result['kode_matkul'].",".$result['tanggal'].",".$result['jam_mulai'].",".$result['jam_akhir']);
				$data[] = array(
						"kelas"			=> $result['kelas'],
						"dosen"			=> $result['nama_dosen'],
						"matkul" 		=> $result['mata_kuliah'],
						"tahun_ajaran"	=> $result['thn_ajaran'],
						"tanggal" 		=> date("d-M-Y", strtotime($result['tanggal'])),
						"jam_mulai"		=> $result['jam_mulai'],
						"jam_akhir"		=> $result['jam_akhir'],
						"aksi" 			=> "<div class='btn-group btn-aksi' href='#'>"
											  ."<a type='button' class='btn btn-info' href='dash.php?rec=detailAbsen&data=".$var."'>"
								                ."<span class='glyphicon glyphicon-info-sign'></span>"
								              ."</a>"
								              ."<a type='button' class='btn btn-default btn-perbarui' data-function='absen' data-id='".$var."' data-toggle='modal' data-target='#updateModal'>"
								                ."<span class='glyphicon glyphicon-edit'></span>"
								              ."</a>"
								              ."<a type='button' class='btn btn-danger tip' data-href='dash.php?rec=absen&action=hapus&data=".$var."' data-toggle='modal' data-target='#confirm-delete'>"
								                ."<span class='glyphicon glyphicon-remove'></span>"
								              ."</a>"
								            ."</div>"
					);
			}

			echo json_encode($data);
		}
		else if($action == 'getMatkul')	
		{
			$data = explode(",", $_GET['data']);
			$nid = $data[0];
			$id_thn_ajaran = $data[1];
			$sql = mysql_query("SELECT dosen_matkul.kode_matkul, data_matakuliah.mata_kuliah  FROM dosen_matkul "
								."JOIN data_matakuliah ON dosen_matkul.kode_matkul = data_matakuliah.kode_matkul "
								."WHERE dosen_matkul.nid = '$nid' AND id_thn_ajaran = '$id_thn_ajaran' ") or  die(mysql_error());
			$data = array();

	        while($row = mysql_fetch_array($sql))
	        {
	        	$data[] = array(
	        			"kode_matkul" => $row['kode_matkul'],
	        			"mata_kuliah" => $row['mata_kuliah'],
	        		);
	        }
	        echo json_encode($data);
	        //$r = mysql_fetch_assoc($sql);
	        //print json_encode($r);
		}
		else if($action == 'getSiswa')	
		{
			$id_data = $_GET['data'];
			$sql = mysql_query("SELECT data_mahasiswa.nim, data_mahasiswa.nama, data_kelas.* FROM data_mahasiswa "
								."JOIN data_kelas ON data_mahasiswa.id_kelas = data_kelas.id_kelas "
								."WHERE data_mahasiswa.id_kelas = '$id_data' "
								."UNION "
								."SELECT data_mahasiswa.nim, data_mahasiswa.nama, data_kelas.* FROM kelas_tambahan "
								."JOIN data_mahasiswa ON kelas_tambahan.nim = data_mahasiswa.nim "
								."JOIN data_kelas ON data_mahasiswa.id_kelas = data_kelas.id_kelas "
								."WHERE kelas_tambahan.kelas_tambahan = '$id_data' "
								."ORDER BY nama ASC ");

			$data = array();

	        while($row = mysql_fetch_array($sql))
	        {
	        	$data[] = array(
	        			"nim" 			=> $row['nim'],
	        			"nama" 			=> $row['nama'],
	        			"kelas_asal"	=> $row['kelas'],
	        			"id_kelas"		=> $row['id_kelas'],
	        		);
	        }
	        echo json_encode($data);
		}
		else if($action == 'cariAbsen')	
		{
			$data = explode(",", $_GET['data']);
			$id = $data[0];
			$tanggal_kuliah = date("Y-m-d", strtotime($data[1]));
			$wher = $data[2];
			$whereClause = "";

			if($wher == "siswa")
			{
				$whereClause = "WHERE data_absen.nim = '$id'";
			}
			else if($wher == "kelas")
			{
				$nid 	= $data[3];
				$matkul = $data[4];
				$whereClause = "WHERE data_absen.id_kelas = '$id' AND data_absen.nid ='$nid' AND data_absen.kode_matkul = '$matkul' ";
			}

			$sql = mysql_query("SELECT data_absen.*, data_dosen.nama_dosen, data_matakuliah.mata_kuliah, data_mahasiswa.id_kelas, data_mahasiswa.nama ,data_kelas.kelas  FROM data_absen "
								."JOIN data_matakuliah ON data_absen.kode_matkul = data_matakuliah.kode_matkul "
								."JOIN data_mahasiswa ON data_absen.nim = data_mahasiswa.nim "
								."LEFT JOIN data_kelas ON data_absen.id_kelas = data_kelas.id_kelas "
								."JOIN data_dosen ON data_absen.nid = data_dosen.nid "
								."$whereClause AND data_absen.tanggal='$tanggal_kuliah'");

			$data = array();

	        while($row = mysql_fetch_array($sql))
	        {
	        	$data[] = array(
	        			"id_absen"		=> $row['id_absen'],
	        			"nim" 			=> $row['nim'],
	        			"nama" 			=> $row['nama'],
	        			"kelas_asal"	=> $row['kelas'],
	        			"nama_dosen"	=> $row['nama_dosen'],
	        			"mata_kuliah"	=> $row['mata_kuliah'],
	        			"kehadiran"		=> $row['kehadiran'],
	        		);
	        }
	        echo json_encode($data);
		}
		else if($action == 'perbarui')	
		{
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
			$sql = mysql_query("SELECT *, DATE_FORMAT(data_absen.tanggal,'%d-%m-%Y') as tanggal_kuliah FROM data_absen WHERE ".implode(' AND ',$args));

	        $r = mysql_fetch_assoc($sql);
	        print json_encode($r);
	        //print "SELECT *, DATE_FORMAT(data_absen.tanggal,'%d-%m-%Y') as tanggal_kuliah FROM data_absen WHERE ".implode(' AND ',$args);
		}
	}
	else if($rec == 'kelas')
	{
		if($action == 'get')
		{
			$sql = mysql_query("SELECT * FROM data_kelas");

	        $data = array();
	        
			while($result = mysql_fetch_array($sql))
			{ //href='dash.php?rec=jurusan&action=hapus&data=".$result['id_jurusan']."'
				$data[] = array(
						"kode_kelas1"	=> $result['id_kelas'],
						"kode_kelas"	=> $result['id_kelas'],
						"kelas" 		=> $result['kelas'],
						"aksi" 			=> "<div class='btn-group btn-aksi' href='#'>"
											  ."<a type='button' class='btn btn-info' href='dash.php?rec=detailKelas&data=".$result['id_kelas']."'>"
								                ."<span class='glyphicon glyphicon-info-sign'></span>"
								              ."</a>"
								              ."<a type='button' class='btn btn-default btn-perbarui' data-function='kelas' data-id='".$result['id_kelas']."' data-toggle='modal' data-target='#updateModal'>"
								                ."<span class='glyphicon glyphicon-edit'></span>"
								              ."</a>"
								              ."<a type='button' class='btn btn-danger tip' data-href='dash.php?rec=kelas&action=hapus&data=".$result['id_kelas']."' data-toggle='modal' data-target='#confirm-delete'>"
								                ."<span class='glyphicon glyphicon-remove'></span>"
								              ."</a>"
								            ."</div>"
					);
			}

			echo json_encode($data);
		}
		else if($action == 'perbarui')	
		{
			$id_kelas = $_GET['data'];
			$sql = mysql_query("SELECT *  FROM data_kelas WHERE id_kelas = '$id_kelas' LIMIT 1") or  die(mysql_error());

	        $r = mysql_fetch_assoc($sql);
	        print json_encode($r);
		}
	}
	else if($rec == 'detailKelas')
	{
		if($action == 'get')
		{
			$id_data = $_GET['data'];
			$sql = mysql_query("SELECT data_mahasiswa.nim, data_mahasiswa.nama, data_kelas.* FROM data_mahasiswa "
								."JOIN data_kelas ON data_mahasiswa.id_kelas = data_kelas.id_kelas "
								."WHERE data_mahasiswa.id_kelas = '$id_data' "
								."UNION "
								."SELECT data_mahasiswa.nim, data_mahasiswa.nama, data_kelas.* FROM kelas_tambahan "
								."JOIN data_mahasiswa ON kelas_tambahan.nim = data_mahasiswa.nim "
								."JOIN data_kelas ON data_mahasiswa.id_kelas = data_kelas.id_kelas "
								."WHERE kelas_tambahan.kelas_tambahan = '$id_data'");

	        $data = array();
	        
			while($result = mysql_fetch_array($sql))
			{ //href='dash.php?rec=jurusan&action=hapus&data=".$result['id_jurusan']."'
				$data[] = array(
						"nim"			=> $result['nim'],
						"nama" 			=> $result['nama'],
						"kelas_asal"	=> $result['kelas'],
						"aksi" 			=> "<div class='btn-group btn-aksi' href='#'>"
								              ."<a type='button' class='btn btn-danger tip' data-href='dash.php?rec=detailKelas&action=hapus&data=".$result['nim'].",".$result['id_kelas'].",".$id_data."' data-toggle='modal' data-target='#confirm-delete'>"
								                ."<span class='glyphicon glyphicon-remove'></span>"
								              ."</a>"
								            ."</div>"
					);
			}

			echo json_encode($data);
		}
	}
	else if($rec == 'spp')
	{
		if($action == 'get')
		{
			$sql = mysql_query("SELECT * FROM data_spp_aal");

	        $data = array();
	        
	        
			while($result = mysql_fetch_array($sql))
			{ //href='dash.php?rec=jurusan&action=hapus&data=".$result['id_jurusan']."'
				$data[] = array(
						"kode_spp1"		=> $result['id_spp'],
						"kode_spp"		=> $result['id_spp'],
						"angkatan" 		=> "20".$result['id_angkatan'],
						"jumlah_aal"	=> "Rp. ".number_format($result['jumlah_aal'], 0, ',', '.'),
						"jumlah_spp"	=> "Rp. ".number_format($result['jumlah_spp'], 0, ',', '.'),
						"aksi" 			=> "<div class='btn-group btn-aksi' href='#'>"
								              ."<a type='button' class='btn btn-default btn-perbarui' data-function='spp' data-id='".$result['id_spp']."' data-toggle='modal' data-target='#updateModal'>"
								                ."<span class='glyphicon glyphicon-edit'></span>"
								              ."</a>"
								              ."<a type='button' class='btn btn-danger tip' data-href='dash.php?rec=spp&action=hapus&data=".$result['id_spp']."' data-toggle='modal' data-target='#confirm-delete'>"
								                ."<span class='glyphicon glyphicon-remove'></span>"
								              ."</a>"
								            ."</div>"
					);
			}

			echo json_encode($data);
		}
		else if($action == 'perbarui')	
		{
			$id_spp = $_GET['data'];
			$sql = mysql_query("SELECT *  FROM data_spp_aal WHERE id_spp = '$id_spp' LIMIT 1") or  die(mysql_error());

	        $r = mysql_fetch_assoc($sql);
	        print json_encode($r);
		}
	}
	else if($rec == 'dpp')
	{
		if($action == 'get')
		{
			$sql = mysql_query("SELECT * FROM data_dpp");

	        $data = array();
	        
	        
			while($result = mysql_fetch_array($sql))
			{ //href='dash.php?rec=jurusan&action=hapus&data=".$result['id_jurusan']."'
				$data[] = array(
						"kode_dpp1"		=> $result['id_dpp'],
						"kode_dpp"		=> $result['id_dpp'],
						"angkatan" 		=> "20".$result['id_angkatan'],
						"gelombang"		=> $result['gelombang'],
						"jumlah_dpp"	=> "Rp. ".number_format($result['jumlah_dpp'], 0, ',', '.'),
						"aksi" 			=> "<div class='btn-group btn-aksi' href='#'>"
								              ."<a type='button' class='btn btn-default btn-perbarui' data-function='dpp' data-id='".$result['id_dpp']."' data-toggle='modal' data-target='#updateModal'>"
								                ."<span class='glyphicon glyphicon-edit'></span>"
								              ."</a>"
								              ."<a type='button' class='btn btn-danger tip' data-href='dash.php?rec=dpp&action=hapus&data=".$result['id_dpp']."' data-toggle='modal' data-target='#confirm-delete'>"
								                ."<span class='glyphicon glyphicon-remove'></span>"
								              ."</a>"
								            ."</div>"
					);
			}

			echo json_encode($data);
		}
		else if($action == 'perbarui')	
		{
			$id_dpp = $_GET['data'];
			$sql = mysql_query("SELECT *  FROM data_dpp WHERE id_dpp = '$id_dpp' LIMIT 1") or  die(mysql_error());

	        $r = mysql_fetch_assoc($sql);
	        print json_encode($r);
		}
	}
	else if($rec == 'administrator')
	{
		if($action == 'get')
		{
			$sql 	= mysql_query("SELECT data_admin.*, SUBSTRING(alamat, 1, 30) as alamat_pendek FROM data_admin");
			$data 	= array();

			while($result = mysql_fetch_array($sql))
			{ 
				$data[] = array(
						"nip1"			=> $result['nip'],
						"nip"			=> $result['nip'],
						"nama"			=> $result['nama'],
						"alamat"		=> $result['alamat_pendek'],
						"jenis_kelamin"	=> $result['jenis_kelamin'],
						"status_bagian" => $result['status_bagian'],
						"aksi" 			=> "<div class='btn-group btn-aksi' href='#'>"
								              ."<a type='button' class='btn btn-default btn-perbarui' data-function='administrator' data-id='".$result['nip']."' data-toggle='modal' data-target='#updateModal'>"
								                ."<span class='glyphicon glyphicon-edit'></span>"
								              ."</a>"
								              ."<a type='button' class='btn btn-danger tip' data-href='dash.php?rec=administrator&action=hapus&data=".$result['nip']."' data-toggle='modal' data-target='#confirm-delete'>"
								                ."<span class='glyphicon glyphicon-remove'></span>"
								              ."</a>"
								            ."</div>"
					);
			}

			echo json_encode($data);
		}
		else if($action == 'perbarui')	
		{
			$nip = $_GET['data'];
			$sql = mysql_query("SELECT * FROM data_admin WHERE nip = '$nip' LIMIT 1") or die(mysql_error());

	        $r = mysql_fetch_assoc($sql);
	        print json_encode($r);
		}
	}
	else if($rec == 'bayar')
	{
		if($action == 'get')
		{
			$sql 	= mysql_query("SELECT data_pembayaran.*, data_admin.nama FROM data_pembayaran JOIN data_admin ON data_pembayaran.id_admin = data_admin.nip");
			$data 	= array();

			while($result = mysql_fetch_array($sql))
			{ 
				$data[] = array(
						"no_transaksi"		=> $result['no_transaksi'],
						"tgl_transaksi"		=> date('d-M-Y', strtotime($result['tgl_transaksi'])),
						"nim"				=> $result['nim'],
						"jenis_transaksi"	=> $result['jenis_transaksi'],
						"cicilan_ke"		=> $result['cicilan_ke'],
						"jumlah_pembayaran"	=> "Rp. ".number_format($result['jumlah_pembayaran'], 0, ',', '.'),
						"status" 			=> $result['status'],
						"admin" 			=> $result['nama'],
						"aksi" 				=> "<div class='btn-group btn-aksi' href='#'>"
											  ."<a type='button' class='btn btn-default btn-perbarui' data-function='bayar' data-id='".$result['no_transaksi']."' data-toggle='modal' data-target='#updateModal'>"
								                ."<span class='glyphicon glyphicon-edit'></span>"
								              ."</a>"
								              ."<a type='button' class='btn btn-danger tip' data-href='dash.php?rec=bayar&action=hapus&data=".$result['no_transaksi']."' data-toggle='modal' data-target='#confirm-delete'>"
								                ."<span class='glyphicon glyphicon-remove'></span>"
								              ."</a>"
								            ."</div>"
					);
			}

			echo json_encode($data);
		}
		else if($action == 'perbarui')	
		{
			$no_transaksi = $_GET['data'];
			$sql = "SELECT data_pembayaran.*, data_mahasiswa.nama, data_spp_aal.*, data_dpp.jumlah_dpp FROM data_pembayaran, data_mahasiswa"
		        		." JOIN data_spp_aal ON data_mahasiswa.id_angkatan = data_spp_aal.id_angkatan" 
		        		." JOIN data_dpp ON data_mahasiswa.gelombang = data_dpp.gelombang AND data_mahasiswa.id_angkatan = data_dpp.id_angkatan"
		        		." WHERE no_transaksi = $no_transaksi LIMIT 1";
		    $result = mysql_query($sql);
	        $r = mysql_fetch_assoc($result);
	        print json_encode($r);
		}
		else if($action == 'getNim')
		{
			$row = array();
		    $return_arr = array();
		    $row_array = array();

		    if((isset($_GET['term']) && strlen($_GET['term']) > 0) || (isset($_GET['id']) && is_numeric($_GET['id'])))
		    {

		        if(isset($_GET['term']))
		        {
		            $getVar = $_GET['term'];
		            $whereClause =  " nim LIKE '%" . $getVar ."%' ";
		        }
		        elseif(isset($_GET['id']))
		        {
		            $whereClause =  " nim = $getVar ";
		        }
		        /* limit with page_limit get */

		        $limit = intval($_GET['page_limit']);

		        $sql = "SELECT data_mahasiswa.nim, data_mahasiswa.nama, data_spp_aal.*, data_dpp.jumlah_dpp FROM data_mahasiswa"
		        		." JOIN data_spp_aal ON data_mahasiswa.id_angkatan = data_spp_aal.id_angkatan" 
		        		." JOIN data_dpp ON data_mahasiswa.gelombang = data_dpp.gelombang AND data_mahasiswa.id_angkatan = data_dpp.id_angkatan"
		        		." WHERE $whereClause LIMIT $limit";

		        /** @var $result MySQLi_result */
		        $result = mysql_query($sql);

		            if(mysql_num_rows($result) > 0)
		            {

		                while($row = mysql_fetch_array($result))
		                {
		                    $row_array['id'] = $row['nim'];
		                    $row_array['text'] = $row['nama'];
		                    $row_array['jumlah_spp'] = $row['jumlah_spp'];
		                    $row_array['jumlah_aal'] = $row['jumlah_aal'];
		                    $row_array['jumlah_dpp'] = $row['jumlah_dpp'];
		                    array_push($return_arr,$row_array);
		                }

		            }
		    }
		    else
		    {
		        $row_array['id'] = 0;
		        $row_array['text'] = utf8_encode('Start Typing....');
		        array_push($return_arr,$row_array);

		    }

		    $ret = array();
		    /* this is the return for a single result needed by select2 for initSelection */
		    if(isset($_GET['id']))
		    {
		        $ret = $row_array;
		    }
		    /* this is the return for a multiple results needed by select2
		    * Your results in select2 options needs to be data.result
		    */
		    else
		    {
		        $ret['results'] = $return_arr;
		    }
		    echo json_encode($ret);

		}
	}