<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Halaman Home</title>
	<?php $this->load->view('link');?> <!--Include link-->

</head>
<body>
	<?php $this->load->view('menu');?> <!--Include menu-->
	<?php $this->load->view('header');?> <!--Include header-->

	<div class="wrapper-konten">
		<div class="card">
			<h5 class="card-header">Rekap Sertifikat</h5>
			<div class="card-body">
				<h5 class="card-title"></h5>
				<a href="<?php echo base_url('laporan_pdf/laporan_pdf') ?>"><button class="btn btn-primary" >Cetak PDF</button></a>
				<br>
				<br>
				<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
					<thead>

						<tr>

							<th class="th-sm">No</td>
							<th class="th-sm">No Sertifikat</td>
							<th class="th-sm">Jenis</td>
							<th class="th-sm">Pemohon</td>
							<th class="th-sm">Alamat</td>
							<th class="th-sm">Pejabat</td>
							<th class="th-sm">Nip</td>
							<th class="th-sm">Status</td>
							<th class="th-sm">Ket.</td>

						</tr>
					</thead>
					<tbody>

						<?php 

						if ($querySertifikatAlls == !null) {

							$count=0;
							foreach ($querySertifikatAlls as $row){
								$count = $count+1;
								
								?>
								<tr>
									<td><?php echo $count ?></td>
									<td><?php echo $row->no_sertifikat ?></td>
									<td><?php echo $row->jenis_sertifikat ?></td>
									<td><?php echo $row->pemohon ?></td>
									<td><?php echo $row->alamat_pemohon ?></td>
									<td><?php echo $row->nama ?></td>
									<td><?php echo $row->nip ?></td>
									<td><?php echo $row->status ?></td>
									<td><?php echo $row->jenis_keterangan ?></td>


								</tr>
							<?php } };?>

						</tbody>

					</table>
				</div>
			</div>


		</div>
		<?php $this->load->view('footer');?> <!--Include footer-->
	</body>
	<?php $this->load->view('javascriptnya');?> <!--Include javascript-->
	</html>
