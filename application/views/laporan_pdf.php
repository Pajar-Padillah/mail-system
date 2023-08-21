<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Laporan Sertifikat</title>
	<style type="text/css">
		.border-tabel{
			border: 2px solid black;
			border-collapse: collapse;
			word-wrap: break-word;
			text-align: center;

		}

		.header-tabel{
			background-color: yellow;
		}

		.judul-laporan{
			text-align: center;
			margin-bottom: 80px;
		}

	</style>
</head>
<body>

	<h2 class="judul-laporan">Laporan Rekap Sertifikat</h2>
	<p>Tanggal Cetak : <?php 
	echo date('d-m-Y');

?> </p>
<table class="border-tabel" >

	<tr class=" header-tabel">

		<td class="border-tabel"><b>No</b></td>
		<td class="border-tabel"><b>No Sertifikat</b></td>
		<td class="border-tabel"><b>Jenis</b></td>
		<td class="border-tabel"><b>Pemohon</b></td>
		<td class="border-tabel"><b>Alamat</b></td>
		<td ><b>Pejabat</b></td>
		<!-- <td><b>Nip</b></td> -->
		<td class="border-tabel"><b>Status</b></td>
		<td class="border-tabel"><b>Keterangan</b></td>

	</tr>


	<?php 

	if ($querySertifikatAlls == !null) {

		$count=0;
		foreach ($querySertifikatAlls as $row){
			$count = $count+1;
			echo("<script type='text/javascript'> console.log(JSON.parse('" . json_encode($row) . "'));</script>");
			?>
			<tr >
				<td ><?php echo $count ?></td>
				<td class="border-tabel"><?php echo $row->no_sertifikat ?></td>
				<td class="border-tabel"><?php echo $row->jenis_sertifikat ?></td>
				<td class="border-tabel"><?php echo $row->pemohon ?></td>
				<td class="border-tabel"><?php echo $row->alamat_pemohon ?></td>
				<td class="border-tabel"><?php echo $row->nama ?></td>
				<!-- <td><?php echo $row->nip ?></td> -->
				<td class="border-tabel"><?php echo $row->status ?></td>
				<td class="border-tabel"><?php echo $row->jenis_keterangan ?></td>


			</tr>
		<?php } };?>



	</table>		 

</body>

</html>

