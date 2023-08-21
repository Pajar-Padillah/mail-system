<!DOCTYPE html>
<html>
<head>
	<title>Edit wilker</title>
	<?php $this->load->view('link');?> <!--Include link-->

</head>
<body>
 <?php $this->load->view('menu');?> <!--Include menu-->
 <div class="wrapper-konten">
	
	<div class="card">
  <h5 class="card-header">Edit wilker</h5>
  <div class="card-body">
    <h5 class="card-title"></h5>
    <form action=" <?php echo base_url('wilker/fungsiEdit_Wil') ?> " method="post">
		<table class="table table-striped">
			<tr>
				<td>Id wilker</td>
				<td>:</td>
				<td><input type="text" class="form-control" name="id_wilker" value="<?php echo $queryDetailWil->id_wilker ?>" readonly></td>
			</tr>
			<tr>
				<td>wilker</td>
				<td>:</td>
				<td><input type="text" class="form-control" name="wilker" value="<?php echo $queryDetailWil->wilker ?>"></td>
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
