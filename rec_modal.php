<!-- Modal -->
	<div class="modal fade" id="addModal" tabindex="-1" role="dialog" 
	aria-labelledby="myModalLabel" aria-hidden="true">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
	        <h4 class="modal-title" id="myModalLabel">Form Tambah data</h4>
	      </div>
	      <div class="modal-body">
	      <?php if ($rec == "mahasiswa") { ?>
	        <div class="panel panel-default" style="border: none; box-shadow: none !important;">
				<div class="panel-body" style="border-color: #fff;">
					<form class="form-horizontal form" action="dash.php?rec=mahasiswa&action=insert" 
					method="post" id="formAdd">

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
							<div class='input-group date' id='kalender'>
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
						<select name="kelas" class="form-control">
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
					<form class="form-horizontal form" action="dash.php?rec=dosen&action=insert" method="post" id="formAdd">
						<!-- NIM input-->
						<div class="form-group">
							<label class="col-md-3 control-label" for="kode_jurusan">NID</label>
							<div class="col-md-4">
							<input id="kode_jurusan" name="nid" type="text" 
									placeholder="NID" class="form-control" required >
							</div>
						</div>
					
						<!-- NAMA input-->
						<div class="form-group">
							<label class="col-md-3 control-label" for="jurusan">Nama</label>
							<div class="col-md-7">
								<input id="jurusan" name="nama" type="text" 
								placeholder="Nama" class="form-control" required>
							</div>
						</div>
				</div>
			</div>
			<?php } else if($rec == 'jurusan') { ?>
			<div class="panel panel-default" style="border: none; box-shadow: none !important;">
				<div class="panel-body" style="border-color: #fff;">
					<form class="form-horizontal form" action="dash.php?rec=jurusan&action=insert" method="post" id="formAdd">
						<!-- NIM input-->
						<div class="form-group">
							<label class="col-md-3 control-label" for="kode_jurusan">Kode Jurusan</label>
							<div class="col-md-4">
							<input id="kode_jurusan" name="kode_jurusan" type="number" 
									placeholder="Kode Jurusan" class="form-control" required 
									title="Hanya Angka">
							</div>
						</div>
					
						<!-- NAMA input-->
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
					<form class="form-horizontal form" action="dash.php?rec=tahun_ajaran&action=insert" method="post" id="formAdd">
						<!-- NIM input-->
						<div class="form-group">
							<label class="col-md-3 control-label" for="kode_jurusan">Tahun Ajaran</label>
							<div class="col-md-4">
							<input id="kode_jurusan" name="tahun_ajaran" type="text" 
									placeholder="Tahun Ajaran" class="form-control" required >
							</div>
						</div>
					
						<!-- NAMA input-->
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
					<form class="form-horizontal form" action="dash.php?rec=matkul&action=insert" method="post" id="formAdd">
						<!-- NIM input-->
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
			<?php } else if($rec == "detailDosen") { ?>
			<div class="panel panel-default" style="border: none; box-shadow: none !important;">
				<div class="panel-body" style="border-color: #fff;">
					<form class="form-horizontal form" action="dash.php?rec=detailDosen&action=insert&data=<?=$_GET['data']?>" method="post" id="formAdd">
						<div class="form-group">
							<label class="col-md-3 control-label" for="nama">Kode Mata Kuliah</label>
							<div class="col-md-5">
								<input id="e1" class="matkulAuto" name="kode_matkul" type="hidden" 
								placeholder="Kode Mata Kulaih" required style="width: 200px;">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label" for="nama">Tahun Ajaran</label>
							<div class="col-md-5">
								<select name="tahun_ajaran" class="form-control">
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
				</div>
			</div>	
			<?php } else if($rec == 'kelas') { ?>
			<div class="panel panel-default" style="border: none; box-shadow: none !important;">
				<div class="panel-body" style="border-color: #fff;">
					<form class="form-horizontal form" action="dash.php?rec=kelas&action=insert" method="post" id="formAdd">
					
						<!-- NAMA input-->
						<div class="form-group">
							<label class="col-md-3 control-label" for="kode_jurusan">Kode Kelas</label>
							<div class="col-md-4">
							<input id="kode_jurusan" name="kode_kelas" type="number" 
									placeholder="Kode Kelas" class="form-control" required 
									title="Hanya Angka ex 1761">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-3 control-label" for="jurusan">Kelas</label>
							<div class="col-md-5">
								<input id="jurusan" name="kelas" type="text" 
								placeholder="Nama Kelas" class="form-control" required>
							</div>
						</div>
				</div>
			</div>		
			<?php } else if($rec == "detailKelas") { ?>
			<div class="panel panel-default" style="border: none; box-shadow: none !important;">
				<div class="panel-body" style="border-color: #fff;">
					<form class="form-horizontal form" action="dash.php?rec=detailKelas&action=insert&data=<?=$_GET['data']?>" method="post" id="formAdd">
						<div class="form-group">
							<label class="col-md-3 control-label" for="nama">NIM</label>
							<div class="col-md-5">
								<input id="e1" class="nimAuto" name="nim" type="hidden" 
								placeholder="NIM" required style="width: 200px;">
							</div>
						</div>
				</div>
			</div>		
			<?php } else if($rec == 'spp') { ?>
			<div class="panel panel-default" style="border: none; box-shadow: none !important;">
				<div class="panel-body" style="border-color: #fff;">
					<form class="form-horizontal form" action="dash.php?rec=spp&action=insert" method="post" id="formAdd">					
						<!-- NAMA input-->
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
					<form class="form-horizontal form" action="dash.php?rec=dpp&action=insert" method="post" id="formAdd">					
						<!-- NAMA input-->
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
					<form class="form-horizontal form" action="dash.php?rec=administrator&action=insert" 
					method="post" id="formAdd"  enctype="multipart/form-data">
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
								<input type="radio" name="jenis_kelamin" value="Pria"> Pria &nbsp;
								<input type="radio" name="jenis_kelamin" value="Wanita"> Wanita
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-3 control-label" for="alamat">Email</label>
							<div class="col-md-5">
								<input id="nama" name="email" type="text" 
								placeholder="Email" class="form-control" required>
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-3 control-label" for="password">Password</label>
							<div class="col-md-5">
								<input id="password" name="password" type="password" 
								placeholder="Password" class="form-control" required>
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
								placeholder="Foto" class="form-control" required accept=".jpg,.png,.bmp,.gif">

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
					<form class="form-horizontal form" action="dash.php?rec=bayar&action=insert" 
					method="post" id="formAddBayar">
						<!-- NIM input-->
						<div class="form-group">
							<label class="col-md-3 control-label" for="nim">No Transaksi</label>
							<div class="col-md-5">
									<input id="nim" name="no_transaksi" type="number" 
									placeholder="No Transaksi" class="form-control" required 
									title="Hanya Angka">
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
								<input id="e1" class="nimAuto" name="nim" type="hidden" 
								placeholder="NIM" required style="width: 200px;">
							</div>
						</div>

						<div class="form-group show_status_bayar">
							<label class="col-md-3 control-label" for="alamat">Status Pembayaran</label>
							<div class="col-md-7" style="padding-top: 5px;">
								<input type="radio" name="status_pembayaran" value="Beasiswa"> Beasiswa &nbsp;
								<input type="radio" name="status_pembayaran" value="Pribadi"> Pribadi
							</div>
						</div>


						<div class="form-group show_transaksi">
							<label class="col-md-3 control-label" for="password">Jenis Transaksi</label>
							<div class="col-md-5">
								<select name="jenis_transaksi" class="form-control">
									<option value="">Jenis Transaksi</option>
									<option value="SPP">SPP</option>
									<option value="AAL">AAL</option>
									<option value="DPP">DPP</option>
									<option value="Lain">Lainnya</option>
								</select>
							</div>				
						</div>

						<div class="form-group show_lain">
							<label class="col-md-3 control-label" for="nama">Lainnya</label>
							<div class="col-md-5">
								<input class="form-control" name="lain" type="text" 
								placeholder="Lainnya">
							</div>
						</div>

						<div class="form-group show_cicilan">
							<label class="col-md-3 control-label" for="password"></label>
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

						<div class="form-group show_jumlah">
							<label class="col-md-3 control-label" for="nim">Jumlah Pembayaran</label>
							<div class="col-md-5">
									<input id="nim" name="jumlah_pembayaran" type="number" 
									placeholder="Jumlah Pembayaran" class="form-control" required 
									title="Hanya Angka">
							</div>
						</div>

						<div class="form-group show_bayar">
							<label class="col-md-3 control-label" for="nim">Pembayaran</label>
							<div class="col-md-5">
									<input id="nim" name="pembayaran" type="number" 
									placeholder="Pembayaran" class="form-control" required 
									title="Hanya Angka">
							</div>
						</div>

						<div class="form-group show_status">
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

			<?php } ?>
	      </div>
	      <div class="modal-footer">
	      <img src='image/loading.gif' style='width: 15px; height:15px; float:left;' class='loading-image'/>
			        	<button type="button" class="btn btn-default btn-reset" data-dismiss="modal">Tutup</button>
				        <input type="submit" class="btn btn-primary btn-save" name="simpan" value="Simpan"/>
					</form>
	      </div>
	    </div>
	  </div>
	</div>



	<!-- Modal Confirm Delete -->
	<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	    <div class="modal-dialog">
	        <div class="modal-content">
	            <div class="modal-header">
	                <h4 class="modal-title" id="myModalLabel">Hapus Data</h4>
	            </div>
	            <div class="modal-body">
	                Apakah Anda Yakin Akan Menghapus Data Ini ?
	            </div>
	            <div class="modal-footer">
	                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
	                <a href="#" class="btn btn-danger danger">Delete</a>
	            </div>
	        </div>
	    </div>
	</div>

	<div class="modal fade" id="confirm-export" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	    <div class="modal-dialog">
	        <div class="modal-content">
	            <div class="modal-header">
	            	<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
	                <h4 class="modal-title" id="myModalLabel">Export Data</h4>
	            </div>
	            <div class="modal-body">
	                Apakah Anda Yakin Akan Mengexport Semua Data Ini ?
	            </div>
	            <div class="modal-footer">
	                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
	                <a href="#" class="btn btn-info danger">Export</a>
	            </div>
	        </div>
	    </div>
	</div>

	<div class="modal fade" id="upload-csv" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	    <div class="modal-dialog">
	        <div class="modal-content">
	            <div class="modal-header">
	            	<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
	                <h4 class="modal-title" id="myModalLabel">Upload Data</h4>
	            </div>
	            <div class="modal-body">
		            <div class="panel panel-default" style="border: none; box-shadow: none !important;">
						<div class="panel-body" style="border-color: #fff;">
			                <form action=""
			                method="post" id="formImport"  enctype="multipart/form-data">
			                	<div class="form-group">
									<label class="col-md-3 control-label" for="nim">File</label>
									<div class="col-md-5">
										<input name="file-csv" type="file" 
										placeholder="File CSV" class="form-control" required accept=".csv">
									</div>
								</div>
						</div>
					</div>
	            </div>
	            <div class="modal-footer">
	                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
	                <input type="submit" href="#" class="btn btn-info danger" name="submit" value="Upload"></a>
	                </form>
	            </div>
	        </div>
	    </div>
	</div>

	<?php include("rec_modal_update.php");?>