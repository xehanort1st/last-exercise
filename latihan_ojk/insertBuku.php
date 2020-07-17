<?php
require_once "koneksi.php";

$nama = $_POST["nama"];
$penerbit = $_POST["namaPenerbit"];
$penulis = $_POST["penulis"];
$tahun = $_POST["tahun"];

$sql = "INSERT INTO tb_buku VALUES(null,'$nama','$penerbit','$penulis','$tahun')";


if ($conn->query($sql)===TRUE){
	echo "<script>alert('Data berhasil disimpan')</script>";
	echo "<script>window.location.assign('index.php')</script>";
}else{
	echo "<script>alert('Data gagal disimpan $conn->error')</script>";
	echo "<script>window.location.assign('index.php')</script>";
}



?>