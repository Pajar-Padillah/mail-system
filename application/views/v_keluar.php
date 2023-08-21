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
			<h5 class="card-header">Data keluar</h5>
			<div class="card-body">
				<h5 class="card-title"></h5>
				<a href="<?php echo base_url('keluar/halaman_tambah') ?>"><button class="btn btn-primary">Tambah Data</button></a>
				<br>
				<br>
				<p>Total KT : <?php echo $queryTotalKT->jumlah_kt - $KT_keluar->jumlah_kt ?></p>
				<p>Total KH : <?php echo $queryTotalKH->jumlah_kh - $KH_keluar->jumlah_kh ?></p>
				<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
					<thead>
						<tr>

							<th class="th-sm">No</th>
							<th class="th-sm">No Transaksi</th>
							<th class="th-sm">No Permintaan </th>
							<th class="th-sm">Tanggal Transaksi</th>
							<th class="th-sm">Wilker</th>
							<th class="th-sm">Tanggal Kirim</th>
							<th class="th-sm">Jenis Sertifikat</th>
							<th class="th-sm">Jumlah</th>
							<th class="th-sm">File</th>
							<th class="th-sm">Status</th>
							<th class="th-sm">Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$count = 0;
						foreach ($queryAllKlr as $row) {
							$count = $count + 1;

						?>
							<tr>
								<td><?php echo $count ?></td>
								<td><?php echo $row->no_transaksi ?></td>
								<!-- permintaan -->
								<?php

								foreach ($queryAllPmt as $row1) {
									if ($row1->id_permintaan == $row->id_permintaan) {

								?>
										<td><?php echo $row1->no_permintaan ?></td>
								<?php }
								}   ?>


								<td><?php echo $row->tanggal_surat ?></td>

								<!-- wilker -->
								<?php

								foreach ($queryAllWil as $row2) {
									if ($row2->id_wilker == $row->id_wilker) {

								?>
										<td><?php echo $row2->wilker ?></td>
								<?php }
								}   ?>

								<td><?php echo $row->tanggal_kirim ?></td>

								<!-- jenis_sertifikat -->
								<?php

								foreach ($queryAllJs as $row3) {
									if ($row3->id_jenis_sertifikat == $row->id_jenis_sertifikat) {

								?>
										<td><?php echo $row3->jenis_sertifikat ?></td>
								<?php }
								}   ?>

								<td><?php echo $row->jumlah ?></td>

								<!-- <td><?php echo $row->file ?></td> -->
								<td><?php if ($row->file == null) { ?>
										<span class="badge badge-warning" style="font-size: 12px; color: white;">
											<i class="fa fa-times"></i> No File
										</span>
									<?php } else { ?>
										<span class="badge badge-info">
											<a href="<?= base_url() ?>data_file/<?= $row->file ?>" style="font-size: 12px; color: white;" target="_blank"><i class="fa fa-eye"></i> Lihat File</a>
										</span>
									<?php } ?>
								</td>


								<!-- status -->
								<?php

								foreach ($queryAllSts as $row4) {
									if ($row4->id_status == $row->id_status) {

								?>
										<td><?php echo $row4->status ?></td>
								<?php }
								}   ?>
								<td><a href="<?php echo base_url('keluar/halaman_edit') ?>/<?php echo $row->id_keluar ?> "><button type="button" class="btn btn-success"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></a>

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
											window.location.href='keluar/fungsiDelete_Klr/<?php echo $row->id_keluar ?>';
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