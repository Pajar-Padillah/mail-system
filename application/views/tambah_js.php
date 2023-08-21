<!DOCTYPE html>
<html>
<head>
	<title>Tambah Jenis Sertifikat</title>
	<?php $this->load->view('link');?> <!--Include link-->

</head>
<body>
	<?php $this->load->view('menu');?> <!--Include menu-->
<div class="wrapper-konten">
	<div class="card">
	  <h5 class="card-header">Tambah Jenis Sertifikat</h5>
	  <div class="card-body">
	    <h5 class="card-title"></h5>
	    <form action=" <?php echo base_url('jenis_sertifikat/fungsiTambah_js') ?>" method="post">
			<table class="table table-striped">

				<!-- <tr>
					<td>Id jenis_sertifikat</td>
					<td>:</td>
					<td><input type="text" name="id_jenis_sertifikat"></td>
				</tr> -->
			
				<tr>
					<td>Jenis Sertifikat</td>
					<td>:</td>
					<td><input type="text" class="form-control" name="jenis_sertifikat"></td>
				</tr>
				<td colspan="3"><button type="submit" class="btn btn-primary" onclick="Swal.fire(
					'Sukses!!',
					'Data Berhasil Ditambahkan',
					'success'
					)" >Tambah</button></td>
				
			</table>
		</form>
	  </div>
	</div>
	
	
</div>
<?php $this->load->view('footer');?> <!--Include footer-->
</body>
<?php $this->load->view('javascriptnya');?> <!--Include javascript-->
</html>
