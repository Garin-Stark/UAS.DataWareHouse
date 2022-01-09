<?php
include 'koneksi.php';
     $kode_kriteria = $_POST['kode_kriteria'];
     $nama_kriteria = $_POST['nama_kriteria'];
     $bobot = $_POST['bobot'];
	 {
// update data ke database
// $db->query("UPDATE tb_kriteria SET nama_kriteria='$nama_kriteria', bobot='$bobot' WHERE kode_kriteria='$_GET[kode_kriteria]'");
$query = mysql_query("UPDATE tb_kriteria SET nama_kriteria='$nama_kriteria',bobot='$bobot' WHERE kode_kriteria='$kode_kriteria'");

	echo "<script>
				window.location='index.php?m=kriteria';
			</script>";
	 }
?>