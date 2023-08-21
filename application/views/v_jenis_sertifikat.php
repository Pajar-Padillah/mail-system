<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Halaman jenis_sertifikat</title>
	<?php $this->load->view('link');?> <!--Include link-->

</head>
<body>
	<?php $this->load->view('menu');?> <!--Include menu-->
	<?php $this->load->view('header');?> <!--Include header-->
	<div class="wrapper-konten">
		<div class="card">
			<h5 class="card-header">Data Jenis Sertifikat</h5>
			<div class="card-body">
				<h5 class="card-title"></h5>
				<?php if($this->session->userdata('akses')=='1'):?> 
				<a href="<?php echo base_url('jenis_sertifikat/halaman_tambah') ?>"><button class="btn btn-primary" >Tambah Data</button></a>
				<br>
				<br>
				<?php elseif($this->session->userdata('akses')=='2'):?>
								<?php endif;?>
				<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
					<thead>
						<tr>
							<th class="th-sm">No</td>
							
							<th class="th-sm">Jenis Sertifikat</td>
								<?php if($this->session->userdata('akses')=='1'):?> 
							<th class="th-sm">Aksi</td>
								<?php elseif($this->session->userdata('akses')=='2'):?>
								<?php endif;?>
						</tr>
					</thead>
					<tbody>
						<?php 
						$count=0;
						foreach ($queryAllJs as $row){
							$count = $count+1;

							?>
							<tr>
								<td><?php echo $count ?></td>
								
								<td><?php echo $row->jenis_sertifikat ?></td>
								<?php if($this->session->userdata('akses')=='1'):?> 
								<td><a href="<?php echo base_url('jenis_sertifikat/halaman_edit') ?>/<?php echo $row->id_jenis_sertifikat ?> "><button type="button" class="btn btn-success"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></a> 
									
								<button type="button" class="btn btn-danger"  onclick="Swal.fire({
										title: 'Peringatan!!',
										text: 'Apakah anda yakin ingin menghapus data?',
										icon: 'warning',
										showCancelButton: true,
										confirmButtonColor: '#3085d6',
										cancelButtonColor: '#d33',
										confirmButtonText: 'Ya, Hapus!'
									}).then((result) => {
										if (result.isConfirmed) {
											window.location.href='jenis_sertifikat/fungsiDelete_js/<?php echo $row->id_jenis_sertifikat?>';
											Swal.fire(
												'Dihapus!',
												'Data Berhasil Dihapus.',
												'success'
												)
										}
									})">
									<i class="fa fa-trash" aria-hidden="true"></i>
								</button></td>
								<?php elseif($this->session->userdata('akses')=='2'):?>
								<?php endif;?>
							</tr>
						<?php } ?>
					</tbody>
					
				</table>
			</div>
		</div>
	</div>
	<?php $this->load->view('footer');?> <!--Include footer-->


</body>
<?php $this->load->view('javascriptnya');?> <!--Include javascript-->
</html>
