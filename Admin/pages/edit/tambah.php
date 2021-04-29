<?php
include '../../../library.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id     = @$_POST['id'];
    $judul  = @$_POST['judul'];
    $tempat = @$_POST['tempat'];
    $foto   = @$_FILES['foto'];
    $file   = $foto['name'];

    if (empty($judul)) {
        echo "<script>alert('Mohon masukkan judul dengan benar')</script>";
    } elseif (empty($tempat)) {
        echo "<script>alert('Mohon masukan nama lokasi acara dengan benar')</script>";
    } else {
        if (!empty($foto) and $foto['error'] == 0) {
            $path = '../../../images/project/';
            $upload = move_uploaded_file($foto['tmp_name'], $path . $foto['name']);

            if (!$upload) {
                echo "<script>alert('Upload GAGAL!')</script>";
                header('location:index.php');
            }
            $file = $foto['name'];
        }

        $sql_gambar = "INSERT INTO edit_gambar (judul, tempat, file) 
                    VALUES ('$judul', '$tempat', '$file')";

        $mysqli->query($sql_gambar) or die($mysqli->error);

        header('location:../edit/');
    }
}

$sql_gambar = "SELECT * FROM edit_gambar";
$dataEditGambar = $mysqli->query($sql_gambar) or die($mysqli->error);