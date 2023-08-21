<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>Halaman Home</title>
	<?php $this->load->view('link'); ?> <!--Include link-->

	<link href="<?php echo base_url() . 'assets/DataTables/datatables.min.css' ?>" rel="stylesheet">


</head>

<body>
	<?php $this->load->view('menu'); ?> <!--Include menu-->
	<?php $this->load->view('header'); ?> <!--Include header-->
	<div class="wrapper-konten">
		<div class="card">
			<h5 class="card-header">Total Persediaan</h5>
			<div class="card-body">
				<h5 class="card-title"></h5>
				<a href="<?php echo base_url('laporan_pdf/semuaPersediaan') ?>"><button class="btn btn-primary">Cetak Semua</button></a>

				<br>
				<br>

				<p>Total KT : <?php echo $queryTotalKT->jumlah_kt ?></p>
				<p>Total KH : <?php echo $queryTotalKH->jumlah_kh ?></p>
				<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
					<thead>
						<tr>
							<th class="th-sm">No</th>
							<th class="th-sm">Tanggal </th>
							<th class="th-sm">Jenis Sertifikat</th>
							<th class="th-sm">Jumlah</th>
							<th class="th-sm">Keterangan</th>

						</tr>
					</thead>
					<tbody>
						<?php
						$count = 0;
						foreach ($queryAllPsd as $row) {
							$count = $count + 1;

						?>
							<tr>
								<td><?php echo $count ?></td>
								<td><?php echo $row->tanggal_masuk ?></td>
								<td><?php echo $row->jenis_sertifikat ?></td>
								<td><?php echo $row->jumlah ?></td>
								<td><?php echo $row->keterangan ?></td>

							</tr>
						<?php } ?>
					</tbody>


				</table>
			</div>
		</div>

	</div>
	<?php $this->load->view('footer'); ?> <!--Include footer-->
</body>
<?php $this->load->view('javascriptnya'); ?> <!--Include javascript-->




</html>