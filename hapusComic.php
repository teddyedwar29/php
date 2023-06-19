<?php
    require 'test2.php';

    $id = $_GET["id"];

    if(hapusComic($id) > 0) {
        echo "
            <script>
                alert('Data Berhasil Diapus');
                document.location.href = 'test1.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Data Gagal Diapus');
                document.location.href = 'test1.php';
            </script>
        ";
    }


?>