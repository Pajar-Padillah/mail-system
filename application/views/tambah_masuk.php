<!DOCTYPE html>
<html>
<head>
	<title>Tambah masuk</title>
	<?php $this->load->view('link');?> <!--Include link-->

</head>
<body>
	<?php $this->load->view('menu');?> <!--Include menu-->
<div class="wrapper-konten">
	
	<div class="card">
	  <h5 class="card-header">Tambah masuk</h5>
	  <div class="card-body">
	    <h5 class="card-title"></h5>
	    <form action=" <?php echo base_url('masuk/fungsiTambah_Msk') ?>" method="post">
			<table class="table table-striped">

			<!-- 	<tr>
					<td>Id masuk</td>
					<td>:</td>
					<td><input type="text" class="form-control" name="id_masuk"></td>
				</tr> -->
				<?php 
					 
						$no_masuk = $querycekNoTerbesar->NoTerbesar;
 
						// mengambil angka dari kode barang terbesar, menggunakan fungsi substr
						// dan diubah ke integer dengan (int)
						$urutan = (int) substr($no_masuk, 4, 3);
						 
						// bilangan yang diambil ini ditambah 1 untuk menentukan nomor urut berikutnya
						$urutan++;
						 
						// membentuk kode barang baru
						// perintah sprintf("%03s", $urutan); berguna untuk membuat string menjadi 3 karakter
						// misalnya perintah sprintf("%03s", 15); maka akan menghasilkan '015'
						// angka yang diambil tadi digabungkan dengan kode huruf yang kita inginkan, misalnya BRG 
						$huruf = "TR-M";
						$no_masuk = $huruf . sprintf("%03s", $urutan);

						
					 ?>
			
				<tr>
					<td>No Masuk</td>
					<td>:</td>
					<td><input type="text" class="form-control" name="no_masuk" value="<?php echo $no_masuk ?>" readonly></td>
				</tr>
				<tr>
					<td>Tanggal</td>
					<td>:</td>
					<td><input type="date" class="form-control" name="tanggal_masuk"></td>
				</tr>
				<tr>
					<td>Jenis Sertifikat</td>
					<td>:</td>
					<td><select id="id_jenis_sertifikat" class="form-select" name="id_jenis_sertifikat">
						<option value="-">--Pilih Jenis Sertifikat--</option>
					<?php 
						$count=0;
						foreach ($queryAllJs as $row){
							$count = $count+1;

					 ?>
						<option value="<?php echo $row->id_jenis_sertifikat ?>"><?php echo $row->jenis_sertifikat ?></option>
						<?php } ?>
					</select> </td>
				</tr>

				<tr>
					<td>Jumlah</td>
					<td>:</td>
					<td><input type="text" class="form-control" name="jumlah"></td>
				</tr>
				<tr>
					<td>Keterangan</td>
					<td>:</td>
					<td><input type="text" class="form-control" name="keterangan"></td>
				</tr>
				<tr>
					<td colspan="3"><button type="submit" class="btn btn-primary" onclick="Swal.fire(
					'Sukses!!',
					'Data Berhasil Ditambahkan',
					'success'
					)" >Tambah</button></td>
				</tr>
			</table>
		</form>
	  </div>
	</div>
	
</div>
<?php $this->load->view('footer');?> <!--Include footer-->
</body>
<?php $this->load->view('javascriptnya');?> <!--Include javascript-->
</html>
