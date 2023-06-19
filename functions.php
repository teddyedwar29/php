<?php 
    // koneksi ke database
    // harus mengisi parameter, ingat teman2 harus berurutan yaitu host,username,pw,dan nama databasenya
    $conn = mysqli_connect("localhost", "root", "", "phpdasar");

    function query($query) {
        global $conn;
        $result = mysqli_query($conn, $query);
        $rows = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }
        return $rows;
    }


    // tambah data
    function tambah($data) {
        global $conn;
        // ambil data dari tiap elemen dalam form yang sudah dipencet
        $nim = htmlspecialchars($data["nim"]);
        $nama = htmlspecialchars($data["nama"]);
        $email = htmlspecialchars($data["email"]);
        $jurusan = htmlspecialchars($data["jurusan"]);
        $gambar = htmlspecialchars($data["gambar"]);
            
        // query insert data
        $query = "INSERT INTO mahasiswa VALUES ('','$nama','$nim','$email','$jurusan','$gambar')";
        mysqli_query($conn,$query);
        return mysqli_affected_rows($conn);
    }

    // hapus data
    function hapus($id) {
        global $conn;
        mysqli_query($conn, "DELETE FROM mahasiswa WHERE id=$id" );
        return mysqli_affected_rows($conn);
    }

    // ubah data
    function ubah($data) {
        global $conn;
        // ambil data dari tiap elemen dalam form yang sudah dipencet
        $id = $data["id"];
        $nim = htmlspecialchars($data["nim"]);
        $nama = htmlspecialchars($data["nama"]);
        $email = htmlspecialchars($data["email"]);
        $jurusan = htmlspecialchars($data["jurusan"]);
        $gambar = htmlspecialchars($data["gambar"]);
            
        // query insert data
        $query = "UPDATE mahasiswa SET
            nim = '$nim',
            nama = '$nama',
            email = '$email',
            jurusan = '$jurusan',
            gambar = '$gambar'
            WHERE id = $id
        ";
        mysqli_query($conn,$query);
        return mysqli_affected_rows($conn);
    }

    // cari data 
    function cari ($keyword) {
        $query = "SELECT * FROM mahasiswa
            WHERE 
            nama LIKE '%$keyword%' OR
            nim LIKE '%$keyword%' OR
            email LIKE '%$keyword%' OR
            jurusan LIKE '%$keyword%' 
            
        ";
        return query($query);
    }

?>