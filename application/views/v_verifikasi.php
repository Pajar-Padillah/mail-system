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
							<th class="th-sm">Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$count = 0;
						foreach ($queryAllVrf as $row) {
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

								<td><a href="<?php echo base_url('permintaan/halaman_edit') ?>/<?php echo $row->id_permintaan ?> "><button type="button" class="btn btn-success"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></a>

									<button type="button" class="btn btn-danger" onclick="Swal.fire({
										title: 'Peringatan!!',
										text: 'Apakah anda yakin ingin menghapus data?',
										icon: 'warning',
										showCancelButton: true,
										confirmButtonColor: '#3085d6',
										cancelButtonColor: '#d33',
										confirmButtonText: 'Ya, Hapus!'
									}).then((result) => {
										if (result.isConfirmed) {
											window.location.href='permintaan/fungsiDelete_Pmt/<?php echo $row->id_permintaan ?>';
											Swal.fire(
												'Dihapus!',
												'Data Berhasil Dihapus.',
												'success'
												)
										}
									})">
										<i class="fa fa-trash" aria-hidden="true"></i>
									</button>
								</td>
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