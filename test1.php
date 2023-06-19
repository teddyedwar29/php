<?php 
    require "test2.php";
    $comic = query("SELECT * FROM comic ORDER BY id DESC");

    // tombol cari ditekan
    if(isset($_POST["cari"])) {
        $comic = search($_POST["keyword"]);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Comic</title>
</head>
<body>
    <h1>Halaman Comic</h1>

    <a href="tambahComic.php">Halaman Tambah Comic</a>
    <br><br><br>

    <form action="" method="post">
        <input type="text" name="keyword" size="40" placeholder="Masukkan Keywordnya Disini.." autocomplete="off" autofocus>
        <button type="submit" name="cari">Cari!</button>
    </form>
    <br>

    <table border="1" cellspacing="1" cellpadding="10" >
        <tr>
            <th>No ID</th>
            <th>Aksi</th>
            <th>Gambar</th>
            <th>Judul</th>
            <th>Penulis</th>
            <th>Tahun Terbit</th>
            <th>Bahasa</th>
            <th>Genre</th>
        </tr>
        <?php $i = 1; ?>
        <?php foreach($comic as $com) : ?>
            <tr>
                <td><?= $i; ?></td>
                <td>
                <a href="editComic.php?id=<?= $com["id"]; ?>">Edit</a> | 
                <a href="hapusComic.php?id=<?= $com["id"]; ?>" onclick="return confirm('Apakah Anda Ingin Mengapusnya??')">Delete</a> 
                </td>
                <td>
                    <img src="img/<?= $com["gambar"]; ?>" alt="pict">
                </td>
                <td><?= $com["judul"]; ?></td>
                <td><?= $com["penulis"]; ?></td>
                <td><?= $com["tahunTerbit"]; ?></td>
                <td><?= $com["bahasa"]; ?></td>
                <td><?= $com["genre"]; ?></td>
            </tr>
        <?php $i++ ?>
        <?php endforeach; ?>

    </table>

</body>
</html>