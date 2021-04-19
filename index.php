<?php include('koneksi.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Data Siswa</title>
	<style type="text/css">
		*{
			font-family: "Trebuchet MS";
		}
		h1 {
			text-transform: uppercase;
		}
		table {
			border: 1px solid #ddeeee;
			border-collapse: collapse;
			border-spacing: 0;
			width: 70%;
			margin: 10px auto 10px auto;
		}
		table thead th {
			background-color: #ddefef;
			border: 1px solid #ddeeee;
			color: #336b6b;
			padding: 10px;
			text-align: left;
			text-shadow: 1px 1px 1px #fff;
		}
		table tbody td{
			border: 1px solid #ddeeee;
			color: #333;
			padding: 10px;
		}
		a {
			background-color: #5dbb63;
			color: #fff;
			padding: 10px;
			font-size: 12px;
			text-decoration: none;
		}
	</style>
</head>
<body>
	<center><h1>Siswa</h1></center>
	<center><a href="tambah_produk.php">+ &nbsp; Tambah Siswa</a></center>
	<br>
	<table>
		<thead>
			<tr>
				<th>No.</th>
				<th>Nama</th>
				<th>Jenis Kelamin</th>
				<th>NIS</th>
				<th>Jurusan</th>
				<th>Gambar</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			<?php
				$query = "SELECT * FROM produk ORDER BY id ASC"; 
				$result = mysqli_query($koneksi, $query);
			
				if (!$result) {
					die("query Error : ".mysql_errno($koneksi)." - ".mysql_error($koneksi));
					# code...
				}
				$no = 1;

				while ($row = mysqli_fetch_assoc($result)) {
					# code...
			?>
			<tr>
				<td><?php echo $no; ?></td>
				<td><?php echo $row['judul']; ?></td>
				<td><?php echo substr($row['pengarang'], 0, 20); ?>...</td>
				<td><?php echo $row['persediaan']; ?></td>
				<td><?php echo $row['penerbit']; ?></td>
				<td style="text-align: center;"><img src="gambar/<?php echo $row['gambar_buku']; ?>" style="width: 120px;"></td>
				<td>
					<a href="edit_produk.php?id=<?php echo $row['id']; ?>">Edit</a>
					<br>
					<a href="proses_hapus.php?id=<?php echo $row['id']; ?>"onclick="return confirm('Anda Yakin Ingin Hapus?')">Hapus</a>
				</td>
			</tr>
			<?php
				$no++;
			}
			?>
		</tbody>
	</table>
</body>
</html>