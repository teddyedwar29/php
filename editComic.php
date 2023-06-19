<?php
    require "test2.php";
    // cek apakah tombol sudah ditekan apa belum
    
    // tangkap id comic menggunakan metode GET
    $id = $_GET["id"];
    
    $comic = query("SELECT * FROM comic WHERE id=$id")[0];
    


    if(isset($_POST["submit"])) {
        if(editComic($_POST) > 0) {
            echo"
                <script>
                    alert('Data Berhasil Diubah');
                    document.location.href = 'test1.php';
                </script>
            ";
        } else {
            echo"
                <script>
                    alert('Data Gagal Diubah');
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
    <h1>Halaman Ubah Comic</h1>

    <form action="" method="post">
        <input type="hidden" name="id" value="<?= $comic["id"]; ?>" >
        <ul>
            <li>
                <label for="judul">Judul</label>
                <input type="text" name="judul" id="judul" required value="<?= $comic["judul"]; ?>" >
            </li>
            <li>
                <label for="penulis">Penulis</label>
                <input type="text" name="penulis" id="penulis" required value="<?= $comic["penulis"]; ?>">
            </li>
            <li>
                <label for="tahunTerbit">Tahun Terbit</label>
                <input type="text" name="tahunTerbit" id="tahunTerbit" required value="<?= $comic["tahunTerbit"]; ?>" >
            </li>
            <li>
                <label for="bahasa">Bahasa</label>
                <input type="text" name="bahasa" id="bahasa" required value="<?= $comic["bahasa"]; ?>" >
            </li>
            <li>
                <label for="gambar">Gambar</label>
                <input type="text" name="gambar" id="gambar" required value="<?= $comic["gambar"]; ?>">
            </li>
            <li>
                <label for="genre">Genre</label>
                <input type="text" name="genre" id="genre" required value="<?= $comic["genre"]; ?>" >
            </li>
            <li>
                <button type="submit" name="submit">Edit</button>
            </li>
        </ul>
    </form>

</body>
</html>