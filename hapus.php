<?php
include 'koneksi.php';

$id = $_GET['id'];

$data = mysqli_query($koneksi, "SELECT * FROM mahasiswa WHERE id=$id");
$d = mysqli_fetch_array($data);

// hapus foto
unlink("uploads/".$d['foto']);

mysqli_query($koneksi, "DELETE FROM mahasiswa WHERE id=$id");

header("Location: index.php");
?>
