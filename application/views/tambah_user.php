<!DOCTYPE html>
<html>
<head>
	<title>Tambah User</title>
	<?php $this->load->view('link');?> <!--Include link-->

</head>
<body>
	<?php $this->load->view('menu');?> <!--Include menu-->
<div class="wrapper-konten">
	
	<div class="card">
	  <h5 class="card-header">Tambah User</h5>
	  <div class="card-body">
	    <h5 class="card-title"></h5>
	    <form action=" <?php echo base_url('user/fungsiTambah_usr') ?>" method="post">
			<table class="table table-striped">

			<!-- 	<tr>
					<td>Id User</td>
					<td>:</td>
					<td><input type="text" class="form-control" name="id_user"></td>
				</tr> -->
				<tr>
					<td>Wilker</td>
					<td>:</td>
					<td><select id="id_wilker" class="form-select" name="id_wilker">
						<option value="-">--Pilih Wilker--</option>
					<?php 
						$count=0;
						foreach ($queryAllWil as $row){
							$count = $count+1;

					 ?>
						<option value="<?php echo $row->id_wilker ?>"><?php echo $row->wilker ?></option>
						<?php } ?>
					</select> </td>
				</tr>
				<tr>
					<td>Nama</td>
					<td>:</td>
					<td><input type="text" class="form-control" name="nama"></td>
				</tr>
				<tr>
					<td>Username</td>
					<td>:</td>
					<td><input type="text" class="form-control" name="username"></td>
				</tr>
				<tr>
					<td>Password</td>
					<td>:</td>
					<td><input type="text" class="form-control" name="password"></td>
				</tr>
				<tr>
					<td>Level</td>
					<td>:</td>
					<td><select id="level" class="form-select" name="level">
						<option value="">Pilih Level</option>
						<option value="Admin">Admin</option>
						<option value="Kantor Pos">Kantor Pos</option>
					</select> </td>
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
