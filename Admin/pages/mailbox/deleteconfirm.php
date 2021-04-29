<?php 
include "../../../library.php";

$listTerkonfirmasi = $_GET['id'];

$listTerkonfirmasi = "DELETE FROM terkonfirmasi WHERE id = $listTerkonfirmasi";

$mysqli->query($listTerkonfirmasi) or die($mysqli->error);

header('location: terkonfirmasi.php');
?>