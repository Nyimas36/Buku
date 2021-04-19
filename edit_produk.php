<?php include('koneksi.php'); 

	if (isset($_GET['id'])) {
		$id = $_GET['id'];
		$query = "SELECT * FROM produk where id = '$id'";
		$result = mysqli_query($koneksi, $query);
		if (!$result) {
			die("Query Error :".mysqli_errno($koneksi)." - ".mysqli_error($koneksi));
			# code...
		}
		$data = mysqli_fetch_assoc($result);
		# code...


		if (!count($data)) {
			echo "<script>alert('Data tidak ditemukan pada tabel. ');window.location='index.php'</script>";
			# code...
		}
	} else {
		echo "<script>alert('Masukkan ID yang akan diedit');window.location='index.php'</script>";
	}


?>
<!DOCTYPE html>
<html>
<head>
	<title>Data Buku</title>
	<style type="text/css">
		*{
			font-family: "Trebuchet MS";
		}
		h1 {
			text-transform: uppercase;
		}
		.base {
			width: 400px;
			padding: 20px;
			margin-left: auto;
			margin-right: auto;
			background-color: #ededed;
		}
		label {
			margin-top: 10px ;
			float: left;
			text-align: left;
			width: 100%;
		}
		input {
			padding: 6px;
			width: 100%;
			box-sizing: border-box;
			background-color: #f8f8f8;
			border: 2px solid #ccc;
			outline-color: #90e3fc;
		}
		button{
			background-color: #5dbb63;
			color: #fff;
			padding: 10px;
			font-size: 12 px;
			border: 0;
			margin-top: 20px;

		}
	</style>
</head>
<body>
	<center><h1>Edit Buku <?php echo $data['judul']; ?></h1></center>
	<form method="POST" action="proses_edit.php" enctype="multipart/form-data">
	<section class="base">
		<div>
			<label>Judul</label>
			<input type="text" name="judul" autofocus="" required="" value="<?php echo $data['judul']; ?>" />
			<input type="hidden" name="id" value="<?php echo $data['id']; ?>" />
		</div>
		<div>
			<label>Pengarang</label>
			<input type="text" name="pengarang" value="<?php echo $data['pengarang']; ?>"/>
		</div>
		<div>
			<label>Persediaan</label>
			<input type="text" name="persediaan" required="" value="<?php echo $data['persediaan']; ?>"/>
		</div>
		<div>
			<label>Penerbit</label>
			<input type="text" name="penerbit" required="" value="<?php echo $data['penerbit']; ?>"/>
		</div>
		<div>
			<label>Gambar</label>
			<img src="gambar/<?php echo $data['gambar_buku']; ?>" style="width: 170px;float: left;margin-bottom: 5px;">
			<input type="file" name="gambar_buku"/>
			<i style="float: left;font-size: 11px;color: red;">Abaikan jika tidak merubah gambar produk</i>
		</div>
		<div>
			<br>
			<button type="submit">Simpan Perubahan</button>
		</div>
	</section>
</form>
</body>
</html>