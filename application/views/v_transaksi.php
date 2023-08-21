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
			<h5 class="card-header">Laporan Transaksi</h5>
			<div class="card-body">
				<h5 class="card-title"></h5>
				<a href="<?php echo base_url('laporan_pdf/semuaTransaksi') ?>" target="_blank"><button class="btn btn-primary">Cetak Semua</button></a>
				<br>
				<br>

				<!-- <table>
					<p>Cetak Berdasarkan :</p>

					<tr>
					<td>Tanggal</td>
					<td>:</td>
					<td><input type="date" class="form-control" name="tanggal_surat" value="tanggal_surat"></td>
					<td><a href="<?php echo base_url('laporan_pdf/transaksiByDate') ?>"><button type="submit" class="btn btn-primary" >Cetak</button></a></td>
				</tr>
				<tr>
					<td>Wilker</td>
					<td>:</td>
					<td><select id="id_wilker" class="form-select" name="id_wilker">
						<option value="-">--Pilih Wilker--</option>
					<?php
					$count = 0;
					foreach ($queryAllWil as $row) {
						$count = $count + 1;

					?>
						<option value="<?php echo $row->id_wilker ?>"><?php echo $row->wilker ?></option>
						<?php } ?>
					</select> </td>
					<td><a href="<?php echo base_url('laporan_pdf/transaksiByWilker') ?>"><button type="submit" class="btn btn-primary" >Cetak</button></a></td>
				</tr>
				</table> -->

				<br>
				<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
					<thead>
						<tr>

							<th class="th-sm">No</th>
							<th class="th-sm">Wilker</th>
							<th class="th-sm">Jenis Sertifikat</th>
							<th class="th-sm">Status</th>
							<th class="th-sm">Tanggal Pemintaan</th>
							<th class="th-sm">Jumlah</th>
							<th class="th-sm">Tanggal Kirim</th>
							<th class="th-sm">File</th>
							<th class="th-sm">Aksi</th>

						</tr>
					</thead>
					<tbody>
						<?php
						$count = 0;
						foreach ($queryAllTrs as $row) {
							$count = $count + 1;

						?>
							<tr>
								<td><?php echo $count ?></td>
								<td><?php echo $row->wilker ?></td>
								<td><?php echo $row->jenis_sertifikat ?></td>
								<td><?php echo $row->status ?></td>
								<td><?php echo $row->tanggal_surat ?></td>
								<td><?php echo $row->jumlah ?></td>
								<td><?php echo $row->tanggal_kirim ?></td>
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
								<td> <a href="<?php echo base_url('laporan_pdf/perTransaksi') ?>/<?php echo $row->id_keluar ?> " target="_blank"><button type="button" class="btn btn-primary btn-sm"><i class="fa fa-download" aria-hidden="true"></i></button></a>

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