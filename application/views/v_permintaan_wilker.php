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
			<h5 class="card-header">Data permintaan</h5>
			<div class="card-body">
				<h5 class="card-title"></h5>
				<a href="<?php echo base_url('permintaan/halaman_tambah') ?>"><button class="btn btn-primary">Tambah Data</button></a>
				<br>
				<br>
				<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
					<thead>
						<tr>
							<th class="th-sm">No</th>
							<th class="th-sm">No permintaan</th>
							<th class="th-sm">Tanggal </th>
							<!-- <th class="th-sm">File</th> -->
							<th class="th-sm">Jenis Sertifikat</th>
							<th class="th-sm">Jumlah</th>
							<th class="th-sm">Status</th>

						</tr>
					</thead>
					<tbody>
						<?php
						$count = 0;
						foreach ($queryAllPmtWil as $row) {
							$count = $count + 1;

						?>
							<tr>
								<td><?php echo $count ?></td>
								<td><?php echo $row->no_permintaan ?></td>
								<td><?php echo $row->tanggal ?></td>
								<!-- <td><?php echo $row->file ?></td> -->
								<td><?php echo $row->jenis_sertifikat ?></td>
								<td><?php echo $row->jumlah ?></td>
								<td><?php echo $row->status ?></td>


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