<?php
include '../../../library.php';
$listForm = $_GET['id_form'];

$listForm = "DELETE FROM form WHERE id_form = $listForm";

$mysqli->query($listForm) or die($mysqli->error);

header('location: mailbox.php');