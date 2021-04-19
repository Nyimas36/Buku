<?php
 	include('koneksi.php');

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

 			$query = "INSERT INTO produk (judul, pengarang, persediaan, penerbit, gambar_buku) VALUES ('$judul', '$pengarang', '$persediaan', '$penerbit', '$nama_gambar_baru')";
 			$result = mysqli_query($koneksi, $query);


 			if (!$result) {
					die("query Error : ".mysql_errno($koneksi)." - ".mysql_error($koneksi));
					# code...
			} else {
				echo "<script>alert('Data Berhasil Ditambahkan!');window.location='index.php'</script>";
			}
 		} else {
 			echo "<script>alert('Ekstensi gambar hanya JPG dan PNG');window.location='tambah_produk.php';</script>";
 		}
 	} else {
 		$query = "INSERT INTO produk (judul, pengarang, persediaan, penerbit) VALUES ('$judul', '$pengarang', '$persediaan', '$penerbit')";
 			$result = mysql_query($koneksi, $query);


 			if (!$result) {
					die("query Error : ".mysql_errno($koneksi)." - ".mysql_error($koneksi));
					# code...
			} else {
				echo "<script>alert('Data Berhasil Ditambahkan!');window.location='index.php'</script>";
			}
 	}


?>