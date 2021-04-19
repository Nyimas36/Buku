<?php
 	include('koneksi.php');

 	$id = $_POST['id'];
	$judul = $_POST['judul'];
 	$pengarang = $_POST['pengarang'];
 	$persediaan = $_POST['persediaan'];
 	$penerbit = $_POST['penerbit'];
 	$gambar_buku = $_FILES['gambar_buku']['name'];

 	if ($gambar_buku != "") {
 		$ekstnsi_diperbolehkan = array('png', 'jpg', );
 		$x = explode('.', $gambar_buku);
 		$ekstansi = strtolower(end($x));
 		$file_tmp = $_FILES['gambar_buku']['tmp_name'];
 		$angka_acak = rand(1, 999);
 		$nama_gambar_baru = $angka_acak.'-'.$gambar_buku;

 		if (in_array($ekstansi, $ekstnsi_diperbolehkan) === true) {
 			move_uploaded_file($file_tmp, 'gambar/'.$nama_gambar_baru);

 			$query = "UPDATE produk SET judul = '$judul',pengarang = '$pengarang',persediaan = '$persediaan',penerbit = '$penerbit',gambar_buku= '$nama_gambar_baru'";
 			$query .= "WHERE id = '$id'";
 			$result = mysqli_query($koneksi, $query);


 			if (!$result) {
					die("query Error : ".mysqli_errno($koneksi)." - ".mysqli_error($koneksi));
					# code...
			} else {
				echo "<script>alert('Data Berhasil Diubah!');window.location='index.php'</script>";
			}
 		} else {
 			echo "<script>alert('Ekstensi gambar hanya JPG dan PNG');window.location='edit_produk.php';</script>";
 		}
 	} else {
 		$query = "UPDATE produk SET judul = '$judul',pengarang = '$pengarang',persediaan = '$persediaan',penerbit = '$penerbit'";
 			$query = "WHERE id = '$id'";
 			$result = mysqli_query($koneksi, $query);


 			if (!$result) {
					die ("Query gagal dijalankan: ".mysqli_errno($koneksi)." - ".mysqli_error($koneksi));

			} else {
				echo "<script>alert('Data Berhasil Diubah!');window.location='index.php'</script>";
			}
 	}


?>