<!-- Modal Update -->
	<div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	    <div class="modal-dialog">
	        <div class="modal-content">
	            <div class="modal-header">
	            	<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
	                <h4 class="modal-title" id="myModalLabel">Form Update Data &nbsp; <img src='image/loading.gif' style='width: 15px; height:15px; ' class='loading-image'/></h4>  
	            </div>
	            <div class="modal-body">
	                <?php if ($rec == "mahasiswa") { ?>
				        <div class="panel panel-default" style="border: none; box-shadow: none !important;">
							<div class="panel-body" style="border-color: #fff;">
								<form class="form-horizontal form" action="" 
								method="post" id="formUpdate">

									<div class="form-group">
										<label class="col-md-3 control-label" for="nama">Nama</label>
										<div class="col-md-7">
											<input id="nama" name="nama" type="text" 
											placeholder="Nama" class="form-control" required>
										</div>
									</div>

									<div class="form-group">
										<label class="col-md-3 control-label" for="nim">NIM</label>
										<div class="col-md-4">
										<input id="nim" name="nim" type="number" 
												placeholder="NIM" class="form-control" required 
												title="Hanya Angka">
										</div>
									</div>

									<div class="form-group">
										<label class="col-md-3 control-label" for="alamat">Tempat Lahir</label>
										<div class="col-md-5">
											<input id="nama" name="tempat_lahir" type="text" 
											placeholder="Tempat Lahir" class="form-control" required>
										</div>
									</div>

									<div class="form-group date" id='calender'>
										<label class="col-md-3 control-label" for="alamat">Tanggal Lahir</label>
										<div class="col-md-5">
											<div class='input-group date' id='kalender1'>
											    <input id="nama" name="tanggal_lahir" type="text" 
														placeholder="Tanggal Lahir" class="form-control" 
														data-date-format="DD-MM-YYYY" required>
											    <span class="input-group-addon">
											      <span class="glyphicon glyphicon-calendar"></span>
											    </span>
											</div>
										</div>
									</div>

									<div class="form-group">
										<label class="col-md-3 control-label" for="alamat">Jenis Kelamin</label>
										<div class="col-md-7" style="padding-top: 5px;">
											<input type="radio" name="jenis_kelamin" value="L"> Laki - Laki &nbsp;
											<input type="radio" name="jenis_kelamin" value="P"> Perempuan
										</div>
									</div>

									<div class="form-group">
										<label class="col-md-3 control-label" for="agama">Agama</label>
										<div class="col-md-5">
											<select name='agama' class="form-control">
												<option value="">Agama</option>
												<option value='Islam'>Islam</option>
												<option value='Kristen'>Kristen</option>
												<option value='Katholik'>Katholik</option>
												<option value='Hindhu'>Hindhu</option>
												<option value='Budha'>Budha</option>
											</select>
										</div>				
									</div>

									<div class="form-group">
										<label class="col-md-3 control-label" for="nama">Asal SMA</label>
										<div class="col-md-6">
											<input id="nama" name="asal_sma" type="text" 
											placeholder="Asal SMA" class="form-control">
										</div>
									</div>

									<div class="form-group">
										<label class="col-md-3 control-label" for="nama">Jurusan</label>
										<div class="col-md-5">
											<input id="nama" name="jurusan" type="text" 
											placeholder="Jurusan" class="form-control">
										</div>
									</div>

									<div class="form-group">
										<label class="col-md-3 control-label" for="jurusan">Tahun Lulus</label>
										<div class="col-md-3">
											<select name="tahun_lulus" required class="form-control">
												<option value="">Tahun</option>
												<?php
													for($i=date('Y'); $i>2000; $i--) 
													{
													    $selected = '';
													    if ($birthdayYear == $i) $selected = ' selected="selected"';
													    print('<option value="'.$i.'"'.$selected.'>'.$i.'</option>'."\n");
													}
												?>
											</select>
										</div>
									</div>

									<div class="form-group">
										<label class="col-md-3 control-label" for="alamat">Alamat</label>
										<div class="col-md-7">
											<textarea class="form-control" id="alamat" name="alamat" 
											placeholder="Tuliskan Alamat disini ..!" rows="3" required></textarea>
										</div>
									</div>

									<div class="form-group">
										<label class="col-md-3 control-label" for="nama">Kota</label>
										<div class="col-md-5">
											<input id="nama" name="kota" type="text" 
											placeholder="Kota" class="form-control" required>
										</div>
									</div>

									<div class="form-group">
										<label class="col-md-3 control-label" for="jurusan">Gelombang Pendaftaran</label>
										<div class="col-md-4">
											<select name="gelombang" required class="form-control">
												<option value="">Gelombang</option>
												<?php
													for($i=1; $i<6; $i++) 
													{
													    echo'<option value="'.$i.'">'.$i.'</option>';
													}
												?>
											</select>
										</div>
									</div>

									<div class="form-group">
										<label class="col-md-3 control-label" for="nama">Kelas</label>
										<div class="col-md-4">
										<select name="kelas" required class="form-control">
												<option value="">Kelas</option>
											<?php 
												$sql = mysql_query("SELECT * FROM data_kelas ORDER BY kelas ASC");

												while($data = mysql_fetch_array($sql))
												{
													echo "<option value='".$data['id_kelas']."'>".$data['kelas']."</option>";
												}
											?>
										</select>
										</div>
									</div>
									
							</div>
						</div>
					<?php } else if($rec == 'dosen') { ?>
						<div class="panel panel-default" style="border: none; box-shadow: none !important;">
							<div class="panel-body" style="border-color: #fff;">
								<form class="form-horizontal form" action="" method="post" id="formUpdate">
									<!-- Kode Jurusan input-->
									<div class="form-group">
										<label class="col-md-3 control-label" for="kode_jurusan">NID</label>
										<div class="col-md-4">
										<input id="kode_jurusan" name="nid" type="text" 
												placeholder="NID" class="form-control" required >
										</div>
									</div>
								
									<!-- Jurusan input-->
									<div class="form-group">
										<label class="col-md-3 control-label" for="jurusan">Nama</label>
										<div class="col-md-7">
											<input id="jurusan" name="nama" type="text" 
											placeholder="Nama" class="form-control" required>
										</div>
									</div>
							</div>
						</div>	
					<?php } else if($rec == 'absen') { ?>
						<div class="panel panel-default" style="border: none; box-shadow: none !important;">
							<div class="panel-body" style="border-color: #fff;">
									<form  method="POST" action="dash.php?rec=absen&action=insert" id="formUpdate" class="form-horizontal form">
									<div class="input_data">
										
										<div class="form-group" >
											<label class="col-md-3 control-label" for="kode_jurusan">Kelas</label>
											<div class="col-md-4">
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
											<label class="col-md-3 control-label" for="kode_jurusan">Dosen Pengajar</label>
											<div class="col-md-5">
											<select name="nid" style="width: 100%;" class="form-control">
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
											<label class="col-md-3 control-label" for="kode_jurusan">Mata Kuliah</label>
											<div class="col-md-5">
											<select name="matkul" style="width: 100%;" class="form-control">
												<?php
															$sql = mysql_query("SELECT * FROM data_matakuliah") or die(mysql_error());
															while($row = mysql_fetch_array($sql))
															{
																echo "<option value='".$row['kode_matkul']."'>".$row['mata_kuliah']."</option>";
															}
														?>
											</select>
											</div>
										</div>

										<div class="form-group" >
											<label class="col-md-3 control-label" for="kode_jurusan">Tahun Ajaran</label>
											<div class="col-md-4">
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
											<label class="col-md-3 control-label" for="kode_jurusan">Pertemuan</label>
											<div class="col-md-3">
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
											<label class="col-md-3 control-label" for="alamat">Tanggal Kuliah</label>
											<div class="col-md-5">
												<div class='input-group date' id='kalender2'>
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
											<label class="col-md-3 control-label" for="alamat">Jam Mulai</label>
											<div class="col-md-4">
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
											<label class="col-md-3 control-label" for="alamat">Jam Akhir</label>
											<div class="col-md-4">
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
							</div>	
						</div>	
					<?php } else if($rec == 'jurusan') { ?>
						<div class="panel panel-default" style="border: none; box-shadow: none !important;">
							<div class="panel-body" style="border-color: #fff;">
								<form class="form-horizontal form" action="" method="post" id="formUpdate">
									<!-- Kode Jurusan input-->
									<div class="form-group">
										<label class="col-md-3 control-label" for="kode_jurusan">Kode Jurusan</label>
										<div class="col-md-4">
										<input id="kode_jurusan" name="kode_jurusan" type="number" 
												placeholder="Kode Jurusan" class="form-control" required 
												title="Hanya Angka">
										</div>
									</div>
								
									<!-- Jurusan input-->
									<div class="form-group">
										<label class="col-md-3 control-label" for="jurusan">Jurusan</label>
										<div class="col-md-7">
											<input id="jurusan" name="jurusan" type="text" 
											placeholder="Jurusan" class="form-control" required>
										</div>
									</div>
							</div>
						</div>	
					<?php } else if($rec == 'tahun_ajaran') { ?>
						<div class="panel panel-default" style="border: none; box-shadow: none !important;">
							<div class="panel-body" style="border-color: #fff;">
								<form class="form-horizontal form" action="" method="post" id="formUpdate">
									<!-- Kode Jurusan input-->
									<div class="form-group">
										<label class="col-md-3 control-label" for="kode_jurusan">Tahun Ajaran</label>
										<div class="col-md-4">
										<input id="kode_jurusan" name="tahun_ajaran" type="text" 
												placeholder="Tahun Ajaran" class="form-control" required>
										</div>
									</div>
								
									<!-- Jurusan input-->
									<div class="form-group">
										<label class="col-md-3 control-label" for="jurusan">Keterangan</label>
										<div class="col-md-7">
											<input id="jurusan" name="keterangan" type="text" 
											placeholder="Keterangan" class="form-control" required>
										</div>
									</div>
							</div>
						</div>	
					<?php } else if($rec == 'matkul') { ?>
						<div class="panel panel-default" style="border: none; box-shadow: none !important;">
							<div class="panel-body" style="border-color: #fff;">
								<form class="form-horizontal form" action="" method="post" id="formUpdate">
									<!-- Kode Jurusan input-->
									<div class="form-group">
										<label class="col-md-3 control-label" for="kode_jurusan">Kode Mata Kuliah</label>
										<div class="col-md-4">
										<input id="kode_jurusan" name="kode_matkul" type="text" 
												placeholder="Kode Mata Kuliah" class="form-control" required >
										</div>
									</div>
								
									<!-- NAMA input-->
									<div class="form-group">
										<label class="col-md-3 control-label" for="jurusan">Mata Kuliah</label>
										<div class="col-md-7">
											<input id="jurusan" name="matkul" type="text" 
											placeholder="Mata Kuliah" class="form-control" required>
										</div>
									</div>

									<div class="form-group">
										<label class="col-md-3 control-label" for="jurusan">SKS</label>
										<div class="col-md-3">
											<input id="jurusan" name="sks" type="number" 
											placeholder="SKS" class="form-control" required>
										</div>
									</div>
							</div>
						</div>	
					<?php } else if($rec == 'kelas') { ?>
						<div class="panel panel-default" style="border: none; box-shadow: none !important;">
							<div class="panel-body" style="border-color: #fff;">
								<form class="form-horizontal form" action="" method="post" id="formUpdate">
									<!-- Kode Jurusan input-->
									<div class="form-group">
										<label class="col-md-3 control-label" for="kode_kelas">Kode Kelas</label>
										<div class="col-md-4">
										<input id="kode_kelas" name="kode_kelas" type="number" 
												placeholder="Kode Kelas" class="form-control" required 
												title="Hanya Angka">
										</div>
									</div>
								
									<!-- Jurusan input-->
									<div class="form-group">
										<label class="col-md-3 control-label" for="jurusan">Kelas</label>
										<div class="col-md-7">
											<input id="jurusan" name="kelas" type="text" 
											placeholder="Kelas" class="form-control" required>
										</div>
									</div>
							</div>
						</div>	
					<?php } else if($rec == 'spp') { ?>
						<div class="panel panel-default" style="border: none; box-shadow: none !important;">
							<div class="panel-body" style="border-color: #fff;">
								<form class="form-horizontal form" action="" method="post" id="formUpdate">
									<div class="form-group">
									<label class="col-md-3 control-label" for="jurusan">Angkatan</label>
									<div class="col-md-3">
										<select name="angkatan" required class="form-control">
											<option value="">Angkatan</option>
											<?php
												for($i=date('Y'); $i>2000; $i--) 
												{
												    $selected = '';
												    if ($birthdayYear == $i) $selected = ' selected="selected"';
												    print('<option value="'.$i.'"'.$selected.'>'.$i.'</option>'."\n");
												}
											?>
										</select>
									</div>
								</div>

								<div class="form-group">
									<label class="col-md-3 control-label" for="jurusan">Biaya AAL</label>
									<div class="col-md-5">
										<input id="jurusan" name="jumlah_aal" type="number" min="1" max="9999999"
										placeholder="Biaya AAL" class="form-control" required>
									</div>
								</div>

								<div class="form-group">
									<label class="col-md-3 control-label" for="jurusan">Biaya SPP</label>
									<div class="col-md-5">
										<input id="jurusan" name="jumlah_spp" type="number" min="1" max="9999999"
										placeholder="Biaya SPP" class="form-control" required>
									</div>
								</div>
							</div>
						</div>	
					<?php } else if($rec == 'dpp') { ?>
						<div class="panel panel-default" style="border: none; box-shadow: none !important;">
							<div class="panel-body" style="border-color: #fff;">
								<form class="form-horizontal form" action="" method="post" id="formUpdate">
									<div class="form-group">
									<label class="col-md-3 control-label" for="jurusan">Angkatan</label>
									<div class="col-md-3">
										<select name="angkatan" required class="form-control">
											<option value="">Angkatan</option>
											<?php
												for($i=date('Y'); $i>2000; $i--) 
												{
												    $selected = '';
												    if ($birthdayYear == $i) $selected = ' selected="selected"';
												    print('<option value="'.$i.'"'.$selected.'>'.$i.'</option>'."\n");
												}
											?>
										</select>
									</div>
								</div>

								<div class="form-group">
									<label class="col-md-3 control-label" for="jurusan">Gelombang</label>
									<div class="col-md-3">
										<select name="gelombang" required class="form-control">
											<option value="">Gelombang</option>
											<?php
												for($i=1; $i<6; $i++) 
												{
												    print('<option value="'.$i.'">'.$i.'</option>'."\n");
												}
											?>
										</select>
									</div>
								</div>

								<div class="form-group">
									<label class="col-md-3 control-label" for="jurusan">Biaya DPP</label>
									<div class="col-md-5">
										<input id="jurusan" name="jumlah_dpp" type="number" min="1" max="99999999"
										placeholder="Biaya DPP" class="form-control" required>
									</div>
								</div>
							</div>
						</div>	
					<?php } else if ($rec == "administrator") { ?>
				        <div class="panel panel-default" style="border: none; box-shadow: none !important;">
							<div class="panel-body" style="border-color: #fff;">
								<form class="form-horizontal form" action="" 
								method="post" id="formUpdate" enctype="multipart/form-data">
									<!-- NIM input-->
									<div class="form-group">
										<label class="col-md-3 control-label" for="nim">NIP</label>
										<div class="col-md-4">
										<input id="nim" name="nip" type="number" 
												placeholder="NIP" class="form-control" required 
												title="Hanya Angka">
										</div>
									</div>
								
									<!-- NAMA input-->
									<div class="form-group">
										<label class="col-md-3 control-label" for="nama">Nama</label>
										<div class="col-md-7">
											<input id="nama" name="nama" type="text" 
											placeholder="Nama" class="form-control" required>
										</div>
									</div>
									
									<!-- Alamat body -->
									<div class="form-group">
										<label class="col-md-3 control-label" for="alamat">Alamat</label>
										<div class="col-md-7">
											<textarea class="form-control" id="alamat" name="alamat" 
											placeholder="Tuliskan Alamat disini ..!" rows="3" required></textarea>
										</div>
									</div>

									<div class="form-group">
										<label class="col-md-3 control-label" for="alamat">Jenis Kelamin</label>
										<div class="col-md-7" style="padding-top: 5px;">
											<input type="radio" checked name="jenis_kelamin" value="Pria"> Pria &nbsp;
											<input type="radio" name="jenis_kelamin" value="Wanita"> Wanita
										</div>
									</div>

									<div class="form-group">
										<label class="col-md-3 control-label" for="alamat">Email</label>
										<div class="col-md-5">
											<input id="nama" name="email" type="email" 
											placeholder="Tempat Lahir" class="form-control" required>
										</div>
									</div>

									<div class="form-group">
										<label class="col-md-3 control-label" for="password">Password</label>
										<div class="col-md-5">
											<input id="password" name="password" type="text" 
											placeholder="Password" class="form-control">
										</div>				
									</div>

									<div class="form-group">
										<label class="col-md-3 control-label" for="password">Status Bagian</label>
										<div class="col-md-5">
											<select name="status_bagian" class="form-control">
												<option value="">Bagian</option>
												<option value="Admin">Admin</option>
												<option value="BAAK">BAAK</option>
												<option value="BAAU">BAAU</option>
											</select>
										</div>				
									</div>

									<div class="form-group">
										<label class="col-md-3 control-label" for="foto">Foto</label>
										<div class="col-md-5">
											<input class="foto-mahasiswa" name="foto" type="file" 
											placeholder="Foto" class="form-control" accept=".jpg,.png,.bmp,.gif">

											<input id="password" name="last_foto" type="hidden" 
											placeholder="Password" class="form-control">		
											<center>
												<img src='image/placehold.gif' style='margin-top: 10px;width: 
												3cm;height:4cm;overflow:hidden;' class='placehold'/>
											</center>
										</div>				
									</div>						
							</div>
						</div>
					<?php } else if ($rec == "bayar") { ?>
				        <div class="panel panel-default" style="border: none; box-shadow: none !important;">
							<div class="panel-body" style="border-color: #fff;">
								<form class="form-horizontal form" action="" 
								method="post" id="formUpdate">
									<div class="form-group">
										<label class="col-md-3 control-label" for="nim">No Transaksi</label>
										<div class="col-md-5">
												<input id="nim" name="no_transaksi" type="number" 
												placeholder="No Transaksi" class="form-control" required 
												title="Hanya Angka" readonly>
										</div>
									</div>
								
									<!-- NAMA input-->
									<div class="form-group">
										<label class="col-md-3 control-label" for="nama">Tgl Transaksi</label>
										<div class="col-md-4">
											<input id="nama" name="tgl_transaksi" type="text" disabled="disabled"
											class="form-control" value="<?=date('d-M-Y',strtotime(now))?>">
										</div>
									</div>

									<div class="form-group">
										<label class="col-md-3 control-label" for="nama">NIM</label>
										<div class="col-md-5">
											<input class="form-control" name="nim" type="text" 
											placeholder="NIM" required style="width: 200px;" readonly>
										</div>
									</div>

									<div class="form-group">
										<label class="col-md-3 control-label" for="nama">Jenis Transaksi</label>
										<div class="col-md-5">
											<input class="form-control" name="jenis_transaksi" type="text" 
											placeholder="Lainnya" readonly>
										</div>
									</div>

									<div class="form-group ">
										<label class="col-md-3 control-label" for="alamat">Status Pembayaran</label>
										<div class="col-md-7" style="padding-top: 5px;">
											<input type="radio" name="status_pembayaran" value="Beasiswa"> Beasiswa &nbsp;
											<input type="radio" name="status_pembayaran" value="Pribadi"> Pribadi
										</div>
									</div>

									<div class="form-group">
										<label class="col-md-3 control-label" for="password">Pembayaran Ke</label>
										<div class="col-md-5">
											<select name="cicilan_ke" class="form-control">
												<option value="">-- --</option>
												<?php 
													for($i=1; $i<=10; $i++)
													{
														echo "<option value=".$i.">".$i."</option>";
													}
												?>
											</select>
										</div>				
									</div>

									<div class="form-group">
										<label class="col-md-3 control-label" for="nim">Jumlah Pembayaran</label>
										<div class="col-md-5">
												<input id="nim" name="jumlah_pembayaran" type="text" 
												placeholder="Jumlah Pembayaran" class="form-control" required 
												title="Hanya Angka" readonly>
										</div>
									</div>

									<div class="form-group show_last">
										<label class="col-md-3 control-label" for="nim">Pembayaran Sebelumnya</label>
										<div class="col-md-5">
												<input id="nim" name="last_bayar" type="text" 
												placeholder="Pembayaran Sebelumnya" class="form-control" required 
												title="Hanya Angka" readonly>
										</div>
									</div>

									<div class="form-group">
										<label class="col-md-3 control-label" for="nim">Pembayaran</label>
										<div class="col-md-5">
												<input id="nim" name="pembayaran" type="number" 
												placeholder="Pembayaran" class="form-control" required 
												title="Hanya Angka">
										</div>
									</div>

									<div class="form-group">
										<label class="col-md-3 control-label" for="password">Status</label>
										<div class="col-md-5">
											<select name="status" class="form-control">
												<option value="">Status</option>
												<option value="Lunas">Lunas</option>
												<option value="Belum">Belum Lunas</option>
											</select>
										</div>				
									</div>
							</div>
						</div>
					<?php }?>

	            </div>
	            <div class="modal-footer">
		                <button type="button" class="btn btn-default btn-reset" data-dismiss="modal">Batal</button>
					    <input type="submit" class="btn btn-warning btn-save" name="perbarui" value="Perbarui"/>
				    </form>
	            </div>
	        </div>
	    </div>
	</div>