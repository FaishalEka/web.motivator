<?php 
include "../../../library.php";

$listTertolak = $_GET['id'];

$listTertolak = "DELETE FROM tertolak WHERE id = $listTertolak";

$mysqli->query($listTertolak) or die($mysqli->error);

header('location: form_decline.php');
?>