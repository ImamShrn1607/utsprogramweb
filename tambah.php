<?php include "koneksi.php"; ?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Data</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
<div class="container">
    <h2>TAMBAH DATA MAHASISWA</h2>

    <form method="POST" enctype="multipart/form-data">

        <label>Nama</label>
        <input type="text" name="nama" required>

        <label>NIM</label>
        <input type="text" name="nim" required>

        <label>Prodi</label>
        <input type="text" name="prodi" required>

        <label>Foto</label>
        <input type="file" name="foto" required>

        <button type="submit" name="simpan">SIMPAN</button>

    </form>

    <a href="index.php" class="btn">Kembali</a>

    <?php
    if (isset($_POST['simpan'])) {

        $nama  = $_POST['nama'];
        $nim   = $_POST['nim'];
        $prodi = $_POST['prodi'];

        $foto  = $_FILES['foto']['name'];
        $tmp   = $_FILES['foto']['tmp_name'];

        move_uploaded_file($tmp, "uploads/".$foto);

        mysqli_query($koneksi, "INSERT INTO mahasiswa VALUES (NULL, '$nama', '$nim', '$prodi', '$foto')");

        echo "<script>alert('Data berhasil ditambahkan');window.location='index.php';</script>";
    }
    ?>

</div>
</body>
</html>
