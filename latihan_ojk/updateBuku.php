<?php
require_once "koneksi.php";
echo "coba ya";
$id = $_POST["id"];
$nama = $_POST["nama"];
$penerbit = $_POST["penerbit"];
$penulis = $_POST["penulis"];
$tahun = $_POST["tahun"];
// $password = md5($_POST["passwordUser"]);

$sql = "UPDATE tb_buku set nama_buku='$nama', nama_penerbit='$penerbit',nama_penulis='$penulis' where id_buku='$id'";


if ($conn->query($sql)===TRUE){
 	echo "<script>alert('Data berhasil diupdate')</script>";
 	echo "<script>window.location.assign('index.php')</script>";
 }else{
 	echo "<script>alert('Data gagal diupdate $conn->error')</script>";
 	echo "<script>window.location.assign('index.php')</script>";
 }
?>