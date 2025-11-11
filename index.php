<?php include "koneksi.php"; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Data Mahasiswa</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
<div class="container">
    <h2>DATA MAHASISWA</h2>

    <a href="tambah.php" class="btn">+ Tambah Data</a>

    <table>
        <tr>
            <th>No</th>
            <th>Foto</th>
            <th>Nama</th>
            <th>NIM</th>
            <th>Prodi</th>
            <th>Aksi</th>
        </tr>

        <?php
        $no = 1;
        $data = mysqli_query($koneksi, "SELECT * FROM mahasiswa");
        while ($d = mysqli_fetch_array($data)) {
        ?>
        <tr>
            <td><?= $no++; ?></td>
            <td><img src="uploads/<?= $d['foto']; ?>" class="foto"></td>
            <td><?= $d['nama']; ?></td>
            <td><?= $d['nim']; ?></td>
            <td><?= $d['prodi']; ?></td>
            <td>
                <a href="edit.php?id=<?= $d['id']; ?>" class="btn">Edit</a>
                <a href="index.php?hapus=<?= $d['id']; ?>" class="btn-danger">Hapus</a>
            </td>
        </tr>
        <?php } ?>

    </table>

    <?php
    if (isset($_GET['hapus'])) {
        $id = $_GET['hapus'];
        mysqli_query($koneksi, "DELETE FROM mahasiswa WHERE id='$id'");
        echo "<script>alert('Data berhasil dihapus');window.location='index.php';</script>";
    }
    ?>

</div>
</body>
</html>
