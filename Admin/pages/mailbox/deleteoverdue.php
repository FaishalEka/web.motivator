<?php 
include "../../../library.php";

$listRiwayat = $_GET['id'];

$listRiwayat = "DELETE FROM riwayat WHERE id = $listRiwayat";

$mysqli->query($listRiwayat) or die($mysqli->error);

header('location: overdue.php');
?>