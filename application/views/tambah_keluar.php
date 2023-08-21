<!DOCTYPE html>
<html>

<head>
	<title>Tambah keluar</title>
	<?php $this->load->view('link'); ?> <!--Include link-->

</head>

<body>
	<?php $this->load->view('menu'); ?> <!--Include menu-->
	<div class="wrapper-konten">

		<div class="card">
			<h5 class="card-header">Tambah keluar</h5>
			<div class="card-body">
				<h5 class="card-title"></h5>
				<form action=" <?php echo base_url('keluar/fungsiTambah_Klr') ?>" method="post" enctype="multipart/form-data">
					<table class="table table-striped">

						<!-- 	<tr>
					<td>Id keluar</td>
					<td>:</td>
					<td><input type="text" class="form-control" name="id_keluar"></td>
				</tr> -->
						<?php

						$no_transaksi = $querycekNoTerbesar->NoTerbesar;

						// mengambil angka dari kode barang terbesar, menggunakan fungsi substr
						// dan diubah ke integer dengan (int)
						$urutan = (int) substr($no_transaksi, 4, 3);

						// bilangan yang diambil ini ditambah 1 untuk menentukan nomor urut berikutnya
						$urutan++;

						// membentuk kode barang baru
						// perintah sprintf("%03s", $urutan); berguna untuk membuat string menjadi 3 karakter
						// misalnya perintah sprintf("%03s", 15); maka akan menghasilkan '015'
						// angka yang diambil tadi digabungkan dengan kode huruf yang kita inginkan, misalnya BRG 
						$huruf = "TR-K";
						$no_transaksi = $huruf . sprintf("%03s", $urutan);


						?>
						<tr>
							<td>No Transaksi</td>
							<td>:</td>
							<td><input type="text" class="form-control" name="no_transaksi" value="<?php echo $no_transaksi ?>" readonly></td>
						</tr>
						<tr>
							<td>No Permintaan</td>
							<td>:</td>
							<td><select id="id_permintaan" class="form-select" name="id_permintaan">
									<option value="-">--Pilih No Permintaan--</option>
									<?php
									$count = 0;
									foreach ($queryAllPmt as $row) {
										$count = $count + 1;

									?>
										<option value="<?php echo $row->id_permintaan ?>"><?php echo $row->no_permintaan ?></option>
									<?php } ?>
								</select> </td>
						</tr>
						<tr>
							<td>Tanggal Surat</td>
							<td>:</td>
							<td><input type="date" class="form-control" name="tanggal_surat"></td>
						</tr>
						<tr>
							<td>Wilker</td>
							<td>:</td>
							<td><select id="id_wilker" class="form-select" name="id_wilker">
									<option value="-">--Pilih Wilker--</option>
									<?php
									$count = 0;
									foreach ($queryAllWil as $row) {
										$count = $count + 1;

									?>
										<option value="<?php echo $row->id_wilker ?>"><?php echo $row->wilker ?></option>
									<?php } ?>
								</select> </td>
						</tr>
						<tr>
							<td>Tanggal Kirim</td>
							<td>:</td>
							<td><input type="date" class="form-control" name="tanggal_kirim"></td>
						</tr>
						<tr>
							<td>File</td>
							<td>:</td>
							<td><input type="file" class="form-control" name="file"></td>
						</tr>
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

						<tr>
							<td>Status</td>
							<td>:</td>
							<td><select id="id_status" class="form-select" name="id_status">
									<option value="-">--Pilih Status--</option>
									<?php
									$count = 0;
									foreach ($queryAllSts as $row) {
										$count = $count + 1;

									?>
										<option value="<?php echo $row->id_status ?>"><?php echo $row->status ?></option>
									<?php } ?>
								</select> </td>
						</tr>
						<tr>
							<td colspan="3"><button type="submit" class="btn btn-primary" onclick="Swal.fire(
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