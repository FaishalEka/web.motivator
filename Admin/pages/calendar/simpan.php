<?php 
include "koneksi.php";

if(isset($_POST['title'])) {
    $title= $_POST['title'];
    $start= $_POST['start'];
    $end= $_POST['end'];

    mysqli_query($koneksi, "INSERT into kalender VALUES ('', '$title', '$start', '$end')");
}
?>