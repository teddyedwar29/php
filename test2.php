<?php
    // connect ke dbms
    $conn = mysqli_connect("localhost", "root", "","phpdasar");

    function query($query){
        global $conn;
        $result = mysqli_query($conn, $query);
        $rows = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }
        return $rows;
    }

    // menambahkan data 
    function tambahComic($data) {
        global $conn;

        $judul = htmlspecialchars($data["judul"]);
        $penulis = htmlspecialchars($data["penulis"]);
        $tahunTerbit = htmlspecialchars($data["tahunTerbit"]);
        $bahasa = htmlspecialchars($data["bahasa"]);
        $gambar = htmlspecialchars($data["gambar"]);
        $genre = htmlspecialchars($data["genre"]);

        $query = "INSERT INTO comic VALUES ('','$judul','$penulis','$tahunTerbit','$bahasa','$gambar','$genre')";
        mysqli_query($conn,$query);
        return mysqli_affected_rows($conn);
    }

    // mengedit data 
    function editComic ($data) {
        global $conn;

        $id = $data["id"];
        $judul = htmlspecialchars($data["judul"]);
        $penulis = htmlspecialchars($data["penulis"]);
        $tahunTerbit = htmlspecialchars($data["tahunTerbit"]);
        $bahasa = htmlspecialchars($data["bahasa"]);
        $gambar = htmlspecialchars($data["gambar"]);
        $genre = htmlspecialchars($data["genre"]);

        $query = "UPDATE comic SET
            judul = '$judul',
            penulis = '$penulis',
            tahunTerbit = '$tahunTerbit',
            bahasa = '$bahasa',
            gambar = '$gambar',
            genre = '$genre'
            WHERE id = $id
        ";
        mysqli_query($conn,$query);
        return mysqli_affected_rows($conn);
    }

    // menghapus data

    function hapusComic($id) {
        global $conn;
        mysqli_query($conn, "DELETE FROM comic WHERE id=$id");
        return mysqli_affected_rows($conn);
    }

    // mencari data
    function search($keyword) {
        $query = "SELECT * FROM comic WHERE
            judul LIKE '%$keyword%' OR
            penulis LIKE '%$keyword%' OR
            tahunTerbit LIKE '%$keyword%' OR
            bahasa LIKE '%$keyword%' OR
            genre LIKE '%$keyword%' 
        ";
        return query($query);
    }

?>