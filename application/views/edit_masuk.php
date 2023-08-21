<!DOCTYPE html>
<html>
<head>
	<title>Edit masuk</title>
	<?php $this->load->view('link');?> <!--Include link-->

</head>
<body>
 <?php $this->load->view('menu');?> <!--Include menu-->
 <div class="wrapper-konten">
	
	<div class="card">
  <h5 class="card-header">Edit masuk</h5>
  <div class="card-body">
    <h5 class="card-title"></h5>
    <form action=" <?php echo base_url('masuk/fungsiEdit_Msk') ?> " method="post">
		<table class="table table-striped">
			<tr>
				<td>Id Masuk</td>
				<td>:</td>
				<td><input type="text" class="form-control" name="id_masuk" value="<?php echo $queryDetailMsk->id_masuk ?>" readonly></td>
			</tr>
			<tr>
				<td>No Masuk</td>
				<td>:</td>
				<td><input type="text" class="form-control" name="no_masuk" value="<?php echo $queryDetailMsk->no_masuk ?>"></td>
			</tr>
			<tr>
				<td>Tanggal</td>
				<td>:</td>
				<td><input type="text" class="form-control" name="tanggal_masuk" value="<?php echo $queryDetailMsk->tanggal_masuk?>"></td>
			</tr>
			<tr>
			<td>Jenis Sertifikat</td>
			<td>:</td>
		
			<td>

				<select id="id_jenis_sertifikat" class="form-select" name="id_jenis_sertifikat" value="<?php echo $queryDetailSrt->jenis_sertifikat ?>">
											
					<?php 						
						foreach ($queryAllJs as $row){
						if ($queryDetailSrt->id_jenis_sertifikat ==$row->id_jenis_sertifikat ) {				
					 ?>
						<option value="<?php echo $row->id_jenis_sertifikat ?>" selected><?php echo $row->jenis_sertifikat ?></option>

						<?php } else {

						?>
						
						<option value="<?php echo $row->id_jenis_sertifikat ?>" ><?php echo $row->jenis_sertifikat ?></option>
						
					<?php  					

						}}?>

					</select> 

				</td>
			</tr>
			<tr>
				<td>Jumlah</td>
				<td>:</td>
				<td><input type="text" class="form-control" name="jumlah" value="<?php echo $queryDetailMsk->jumlah?>"></td>
			</tr>
				<tr>
				<td>Keterangan</td>
				<td>:</td>
				<td><input type="text" class="form-control" name="keterangan" value="<?php echo $queryDetailMsk->keterangan?>"></td>
			</tr>
			<tr>
				<td colspan="3"><button type="submit" class="btn btn-primary" onclick="Swal.fire(
					'Sukses!!',
					'Data Berhasil DiUbah',
					'success'
					)" >Edit</button></td>
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
