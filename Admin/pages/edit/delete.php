<?php
  include '../../../library.php';
  $id = $_GET['id'];

  if (!empty($id)) {
    $sql = "DELETE FROM edit_gambar WHERE id = $id";
  
    if ($mysqli -> query($sql)) {
      echo "<script>alert('Dokumentasi telah dihapus')</script>";
    }
    else {
      echo "<script>alert('Dokumentasi tidak terhapus')</script>";
    }
  }

  header('location: ../edit/');
?>