<?php include "koneksi.php";

$id = $_GET['id'];
$data = mysqli_query($koneksi, "SELECT * FROM mahasiswa WHERE id='$id'");
$d = mysqli_fetch_array($data);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Data</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
<div class="container">
    <h2>EDIT DATA MAHASISWA</h2>

    <form method="POST" enctype="multipart/form-data">

        <label>Nama</label>
        <input type="text" name="nama" value="<?= $d['nama']; ?>" required>

        <label>NIM</label>
        <input type="text" name="nim" value="<?= $d['nim']; ?>" required>

        <label>Prodi</label>
        <input type="text" name="prodi" value="<?= $d['prodi']; ?>" required>

        <label>Foto</label><br>
        <img src="uploads/<?= $d['foto']; ?>" width="100"><br><br>
        <input type="file" name="foto">

        <button type="submit" name="update">UPDATE</button>

    </form>

    <a href="index.php" class="btn">Kembali</a>

    <?php
    if (isset($_POST['update'])) {

        $nama  = $_POST['nama'];
        $nim   = $_POST['nim'];
        $prodi = $_POST['prodi'];

        // Jika foto baru di-upload
        if ($_FILES['foto']['name'] != "") {

            $foto  = $_FILES['foto']['name'];
            $tmp   = $_FILES['foto']['tmp_name'];

            move_uploaded_file($tmp, "uploads/".$foto);

            mysqli_query($koneksi, "UPDATE mahasiswa SET nama='$nama', nim='$nim', prodi='$prodi', foto='$foto' WHERE id='$id'");
        } else {
            mysqli_query($koneksi, "UPDATE mahasiswa SET nama='$nama', nim='$nim', prodi='$prodi' WHERE id='$id'");
        }

        echo "<script>alert('Data berhasil diperbarui');window.location='index.php';</script>";
    }
    ?>

</div>
</body>
</html>
