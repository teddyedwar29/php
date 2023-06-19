<?php
    require "test2.php";
    // cek apakah tombol sudah ditekan apa belum
    if(isset($_POST["submit"])) {
        if(tambahComic($_POST) > 0) {
            echo"
                <script>
                    alert('Data Berhasil Ditambahkan');
                    document.location.href = 'test1.php';
                </script>
            ";
        } else {
            echo"
                <script>
                    alert('Data Gagal Ditambahkan');
                    document.location.href = 'test1.php';
                </script>
            ";
        }
    }


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Tambah Comic</title>
</head>
<body>
    <h1>Halaman Tambah Comic</h1>

    <form action="" method="post">
        <ul>
            <li>
                <label for="judul">Judul</label>
                <input type="text" name="judul" id="judul" required>
            </li>
            <li>
                <label for="penulis">Penulis</label>
                <input type="text" name="penulis" id="penulis" required>
            </li>
            <li>
                <label for="tahunTerbit">Tahun Terbit</label>
                <input type="text" name="tahunTerbit" id="tahunTerbit" required>
            </li>
            <li>
                <label for="bahasa">Bahasa</label>
                <input type="text" name="bahasa" id="bahasa" required>
            </li>
            <li>
                <label for="gambar">Gambar</label>
                <input type="text" name="gambar" id="gambar" required>
            </li>
            <li>
                <label for="genre">Genre</label>
                <input type="text" name="genre" id="genre" required>
            </li>
            <li>
                <button type="submit" name="submit">Kirim</button>
            </li>
        </ul>
    </form>

</body>
</html>