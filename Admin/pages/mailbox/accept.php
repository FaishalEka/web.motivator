<?php
include '../../../library.php';
if(isset($_GET['id']))
{
    $id = $_GET['id'];
    $query1 = mysqli_query($mysqli, "INSERT INTO terkonfirmasi(id, nama_instansi, nama_pj, title, tema, email, no_telepon, start_event, end_event, rentang_usia, jumlah_audiens, file) 
    SELECT f.id_form, f.nama_instansi, f.nama_pj, f.nama_event, f.tema, f.email, f.no_telepon, f.start_event, f.end_event, f.rentang_usia, f.jumlah_audiens, f.file FROM form f WHERE f.id_form = ".$id);
    
    $query2 = mysqli_query($mysqli, "SELECT * FROM form WHERE id_form = ".$id);
    $row = mysqli_fetch_assoc($query2);
    $query3 = mysqli_query($mysqli, "DELETE FROM form WHERE id_form=".$id);
    if($query2){
        echo"<script>alert('Data Terkonfirmasi');</script>";
        echo "<script>window.location='mailbox.php'</script>";
    }

    header("location:https://api.whatsapp.com/send?phone=".$row['no_telepon']."&text=Saya%20bersedia%20untuk%20menjadi%20pembicara%20di%20acara%20".$row['nama_event']."%20yang%20bertema%20".$row['tema']."%20yang%20akan%20dilaksanakan%20pada%20".$row['start_event']."%20sampai%20".$row['end_event'].".%20Silakan%20unduh%20dan%20isi%20surat%20MOU%20berikut%20ini,%20kemudian%20kirim%20ke%20email%20inovindo@gmail.com.%20https://linkmouceritanya.com");
}
?>