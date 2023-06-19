<?php
    require 'functions.php';
    $mahasiswa = query("SELECT * FROM mahasiswa ORDER BY nim ASC");

    // tombol cari ditekan
    if (isset($_POST["cari"])) {
        $mahasiswa = cari($_POST["keyword"]);
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Admin</title>
</head>
<body>
    <h1>Daftar Mahasiswa</h1>

    <a href="tambah.php">Tambah Data Mahasiswa</a>
    <br>
    <br>

    <form action="" method="post">

        <input type="text" name="keyword" id="keyword"size="40" autofocus placeholder="Masukkan Keyword Pencarian.." autocomplete="off" >
        <button type="submit" name="cari">Cari!</button>

    </form>
    <br>

    <table border="1" cellpadding="10" cellspacing="1" >
        <tr>
            <th>No.</th>
            <th>Aksi</th>
            <th>Gambar</th>
            <th>Nim</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Jurusan</th>
        </tr>
        
        <?php $i = 1 ?>
        <?php foreach($mahasiswa as $row) : ?>
            <tr>
                <td><?= $i; ?></td>
                <td>
                    <a href="ubah.php?id=<?= $row["id"]; ?>" onclick="return confirm('Apakah Anda Mau Mengubahnya?');">Edit</a> |
                    <a href="hapus.php?id=<?= $row["id"]; ?>" onclick="return confirm('Apakah Anda Mau Menghapusnya?');">Delete</a>
                </td>
                <td>
                    <img src="img/<?= $row["gambar"] ?>" alt="" style="width: 50px;"> 
                </td>
                <td><?= $row["nim"]; ?></td>
                <td><?= $row["nama"]; ?></td>
                <td><?= $row["email"];?></td>
                <td><?= $row["jurusan"]; ?></td>
            </tr>
          <?php $i++ ?>
        <?php endforeach; ?>
    </table>

</body>
</html>