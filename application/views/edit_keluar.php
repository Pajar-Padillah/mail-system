<!DOCTYPE html>
<html>

<head>
	<title>Edit keluar</title>
	<?php $this->load->view('link'); ?> <!--Include link-->

</head>

<body>
	<?php $this->load->view('menu'); ?> <!--Include menu-->
	<div class="wrapper-konten">

		<div class="card">
			<h5 class="card-header">Edit keluar</h5>
			<div class="card-body">
				<h5 class="card-title"></h5>
				<form action=" <?php echo base_url('keluar/fungsiEdit_Klr') ?> " method="post">
					<table class="table table-striped">
						<tr>
							<td>Id keluar</td>
							<td>:</td>
							<td><input type="text" class="form-control" name="id_keluar" value="<?php echo $queryDetailKlr->id_keluar ?>" readonly></td>
						</tr>
						<tr>
							<td>No keluar</td>
							<td>:</td>
							<td><input type="text" class="form-control" name="no_transaksi" value="<?php echo $queryDetailKlr->no_transaksi ?>"></td>
						</tr>




						<select hidden id="id_permintaan" class="form-select" name="id_permintaan" value="<?php echo $queryDetailKlr->id_permintaan ?>">

							<?php
							foreach ($queryAllPmt as $row) {
								if ($queryDetailKlr->id_permintaan == $row->id_permintaan) {
							?>
									<option value="<?php echo $row->id_permintaan ?>" selected><?php echo $row->no_permintaan ?></option>

								<?php } else {

								?>

									<option value="<?php echo $row->id_permintaan ?>"><?php echo $row->no_permintaan ?></option>

							<?php

								}
							} ?>

						</select>



						<tr>
							<td>Tanggal Permintaan</td>
							<td>:</td>
							<td><input type="text" class="form-control" name="tanggal_surat" value="<?php echo $queryDetailKlr->tanggal_surat ?>"></td>
						</tr>
						<tr>
							<td>Wilker</td>
							<td>:</td>

							<td>

								<select id="id_wilker" class="form-select" name="id_wilker" value="<?php echo $queryDetailKlr->id_wilker ?>">

									<?php
									foreach ($queryAllWil as $row) {
										if ($queryDetailKlr->id_wilker == $row->id_wilker) {
									?>
											<option value="<?php echo $row->id_wilker ?>" selected><?php echo $row->wilker ?></option>

										<?php } else {

										?>

											<option value="<?php echo $row->id_wilker ?>"><?php echo $row->wilker ?></option>

									<?php

										}
									} ?>

								</select>

							</td>
						</tr>
						<tr>
							<td>Tanggal Kirim</td>
							<td>:</td>
							<td><input type="text" class="form-control" name="tanggal_kirim" value="<?php echo $queryDetailKlr->tanggal_kirim ?>"></td>
						</tr>
						<tr>
							<td>File</td>
							<td>:</td>
							<td><input type="file" class="form-control" name="file">
								<small><?php echo $queryDetailKlr->file ?></small>
							</td>
						</tr>
						<tr>
							<td>Jenis Sertifikat</td>
							<td>:</td>

							<td>

								<select id="id_jenis_sertifikat" class="form-select" name="id_jenis_sertifikat" value="<?php echo $queryDetailSrt->jenis_sertifikat ?>">

									<?php
									foreach ($queryAllJs as $row) {
										if ($queryDetailKlr->id_jenis_sertifikat == $row->id_jenis_sertifikat) {
									?>
											<option value="<?php echo $row->id_jenis_sertifikat ?>" selected><?php echo $row->jenis_sertifikat ?></option>

										<?php } else {

										?>

											<option value="<?php echo $row->id_jenis_sertifikat ?>"><?php echo $row->jenis_sertifikat ?></option>

									<?php

										}
									} ?>

								</select>

							</td>
						</tr>
						<tr>
							<td>Jumlah</td>
							<td>:</td>
							<td><input type="text" class="form-control" name="jumlah" value="<?php echo $queryDetailKlr->jumlah ?>"></td>
						</tr>
						<tr>
							<td>Status</td>
							<td>:</td>

							<td><select id="id_status" class="form-select" name="id_status" value="<?php echo $queryDetailKlr->id_status ?>">
									<?php

									foreach ($queryAllSts as $row) {
										if ($queryDetailKlr->id_status == $row->id_status) {

									?>

											<option value="<?php echo $row->id_status ?>" selected><?php echo $row->status ?></option>

										<?php } else {



										?>
											<option value="<?php echo $row->id_status ?>"><?php echo $row->status ?></option>
									<?php

										}
									} ?>
								</select> </td>


						</tr>
						<tr>
							<td colspan="3"><button type="submit" class="btn btn-primary" onclick="Swal.fire(
					'Sukses!!',
					'Data Berhasil DiUbah',
					'success'
					)">Edit</button></td>
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