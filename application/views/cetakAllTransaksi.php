<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Laporan Rekap Transaksi</title>
	<style type="text/css">
		.border-tabel{
			border: 1px solid black;
			border-collapse: collapse;
			text-align: center;
			width: 100%;

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
	<h2 class="judul-laporan">Laporan Rekap Transaksi</h2>
				<table class="border-tabel">
			
						<tr class="header-tabel">
							
							<th class="th-sm">No</th>
							<th class="th-sm">Wilker</th>
							<th class="th-sm">Jenis Sertifikat</th>
							<th class="th-sm">Status</th>
							<th class="th-sm">Tanggal Pemintaan</th>
							<th class="th-sm">Jumlah</th>
							<th class="th-sm">Tanggal Kirim</th>
							
						</tr>
				
					<tbody>
						<?php 
						$count=0;
						foreach ($queryAllTrs as $row){
							$count = $count+1;

							?>
							<tr>
								<td><?php echo $count ?></td>
								<td><?php echo $row->wilker ?></td>
								<td><?php echo $row->jenis_sertifikat ?></td>
								<td><?php echo $row->status ?></td>
								<td><?php echo $row->tanggal_surat ?></td>
								<td><?php echo $row->jumlah ?></td>
								<td><?php echo $row->tanggal_kirim ?></td>
								
							</tr>
						<?php } ?>
					</tbody>
					
					
				</table>
			
</body>

</html>
