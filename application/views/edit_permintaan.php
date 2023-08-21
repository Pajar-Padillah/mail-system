<!DOCTYPE html>
<html>

<head>
	<title>Edit permintaan</title>
	<?php $this->load->view('link'); ?> <!--Include link-->

</head>

<body>
	<?php $this->load->view('menu'); ?> <!--Include menu-->
	<div class="wrapper-konten">

		<div class="card">
			<h5 class="card-header">Edit permintaan</h5>
			<div class="card-body">
				<h5 class="card-title"></h5>
				<form action=" <?php echo base_url('permintaan/fungsiEdit_Pmt') ?> " method="post" enctype="multipart/form-data">
					<table class="table table-striped">
						<tr>
							<td>Id permintaan</td>
							<td>:</td>
							<td><input type="text" class="form-control" name="id_permintaan" value="<?php echo $queryDetailPmt->id_permintaan ?>" readonly></td>
						</tr>
						<tr>
							<td>No permintaan</td>
							<td>:</td>
							<td><input type="text" class="form-control" name="no_permintaan" value="<?php echo $queryDetailPmt->no_permintaan ?>"></td>
						</tr>
						<tr>
							<td>Wilker</td>
							<td>:</td>

							<td>

								<select id="id_wilker" class="form-select" name="id_wilker" value="<?php echo $queryDetailPmt->id_wilker ?>">

									<?php
									foreach ($queryAllWil as $row) {
										if ($queryDetailPmt->id_wilker == $row->id_wilker) {
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
							<td>Tanggal</td>
							<td>:</td>
							<td><input type="text" class="form-control" name="tanggal" value="<?php echo $queryDetailPmt->tanggal ?>"></td>
						</tr>
						<!-- <tr>
							<td>File</td>
							<td>:</td>
							<td><input type="file" class="form-control" name="userfile"></td>
						</tr> -->
						<tr>
							<td>Jenis Sertifikat</td>
							<td>:</td>

							<td>

								<select id="id_jenis_sertifikat" class="form-select" name="id_jenis_sertifikat" value="<?php echo $queryDetailPmt->id_jenis_sertifikat ?>">

									<?php
									foreach ($queryAllJs as $row) {
										if ($queryDetailPmt->id_jenis_sertifikat == $row->id_jenis_sertifikat) {
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
							<td><input type="text" class="form-control" name="jumlah" value="<?php echo $queryDetailPmt->jumlah ?>"></td>
						</tr>

						<tr>
							<td>Status</td>
							<td>:</td>

							<td><select id="id_status" class="form-select" name="id_status" value="<?php echo $queryDetailPmt->id_status ?>">
									<?php

									foreach ($queryAllSts as $row) {
										if ($queryDetailPmt->id_status == $row->id_status) {

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