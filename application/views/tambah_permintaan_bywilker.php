<!DOCTYPE html>
<html>

<head>
	<title>Tambah permintaan</title>
	<?php $this->load->view('link'); ?> <!--Include link-->

</head>

<body>
	<?php $this->load->view('menu'); ?> <!--Include menu-->
	<div class="wrapper-konten">

		<div class="card">
			<h5 class="card-header">Tambah permintaan</h5>
			<div class="card-body">
				<h5 class="card-title"></h5>
				<form action=" <?php echo base_url('permintaan/fungsiTambah_Pmt') ?>" method="post" enctype="multipart/form-data">
					<table class="table table-striped">

						<!-- 	<tr>
					<td>Id permintaan</td>
					<td>:</td>
					<td><input type="text" class="form-control" name="id_permintaan"></td>
				</tr> -->
						<?php

						$no_permintaan = $querycekNoTerbesar->NoTerbesar;

						// mengambil angka dari kode barang terbesar, menggunakan fungsi substr
						// dan diubah ke integer dengan (int)
						$urutan = (int) substr($no_permintaan, 4, 3);

						// bilangan yang diambil ini ditambah 1 untuk menentukan nomor urut berikutnya
						$urutan++;

						// membentuk kode barang baru
						// perintah sprintf("%03s", $urutan); berguna untuk membuat string menjadi 3 karakter
						// misalnya perintah sprintf("%03s", 15); maka akan menghasilkan '015'
						// angka yang diambil tadi digabungkan dengan kode huruf yang kita inginkan, misalnya BRG 
						$huruf = "PMT-";
						$no_permintaan = $huruf . sprintf("%03s", $urutan);


						?>
						<tr>
							<td>No permintaan</td>
							<td>:</td>
							<td><input type="text" class="form-control" name="no_permintaan" value="<?php echo $no_permintaan ?>" readonly></td>
						</tr>
						<tr>
							<td>Wilker</td>
							<td>:</td>
							<td>
								<select id="id_wilker" class="form-select" name="id_wilker" readonly>
									<!-- <option value="-">--Pilih Wilker--</option>
									<?php
									$count = 0;
									foreach ($queryAllWil as $row) {
										$count = $count + 1;

									?>
										<option value="<?php echo $row->id_wilker ?>"><?php echo $row->wilker ?></option>
									<?php } ?>	 -->

									<?php
									foreach ($queryAllWil as $row) {
										if ($this->session->userdata('ses_wilker') == $row->id_wilker) {
									?>
											<option value="<?php echo $row->id_wilker ?>" selected><?php echo $row->wilker ?></option>
										<?php }	?>
									<?php } ?>
								</select>
							</td>

						</tr>
						<tr>
							<td>Tanggal</td>
							<td>:</td>
							<td><input type="date" class="form-control" name="tanggal"></td>
						</tr>
						<!-- <tr>
					<td>File</td>
					<td>:</td>
					<td><input type="file" class="form-control" name="userfile"></td>
				</tr> -->
						<tr>
							<td>Jenis Sertifikat</td>
							<td>:</td>
							<td><select id="id_jenis_sertifikat" class="form-select" name="id_jenis_sertifikat">
									<option value="-">--Pilih Jenis Sertifikat--</option>
									<?php
									$count = 0;
									foreach ($queryAllJs as $row) {
										$count = $count + 1;

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

						<input hidden type="text" class="form-control" name="id_status" value="6">

						<tr>
							<td colspan="3"><button type="submit" class="btn btn-primary" value="upload" onclick="Swal.fire(
					'Sukses!!',
					'Data Berhasil Ditambahkan',
					'success'
					)">Tambah</button></td>
						</tr>
					</table>
				</form>
			</div>
		</div>

	</div>
	<?php $this->load->view('footer'); ?> <!--Include footer-->
</body>
<?php $this->load->view('javascriptnya'); ?> <!--Include javascript-->

</html>