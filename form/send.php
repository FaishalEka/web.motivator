<?php
if(isset($_POST['submit'])) {
		$nama_instansi= $_POST['instansi'];
        $nama_pj = $_POST['penanggungjawab'];
        $nama_event = $_POST['event'];
        $tema = $_POST['tema'];
        $email = $_POST['email'];
        $no_telepon = $_POST['telepon'];
        $start_event = $_POST['tanggalawal'];
        $end_event = $_POST['tanggalakhir'];
        $rentang_usia = $_POST['usia'];
        $jumlah_audiens = $_POST['jumlahaudiens'];      
        $file = @$_FILES['file']['name'];

        $file = null;

        if(@$_FILES && $_FILES['file']['name'])
        {
            $uploads_dir     = '../Admin/pdf/';
            $tmp_name         = $_FILES['file']['tmp_name'];
            $filename         = basename($_FILES['file']['name']);
            
            if(move_uploaded_file($tmp_name, $uploads_dir . $filename)){
                // SET JIKA BERHASIL DI UPLOAD
                $file = $filename;
            }
        }


		// include database connection file
		include_once ("../library.php");
				
		// Insert user data into table
		$result = mysqli_query($mysqli, "INSERT INTO form(nama_instansi, nama_pj, nama_event, tema, email, no_telepon, start_event, end_event, rentang_usia, jumlah_audiens, file) 
                                         VALUES('$nama_instansi', '$nama_pj', '$nama_event', '$tema', '$email', '+62$no_telepon', '$start_event', '$end_event', '$rentang_usia', '$jumlah_audiens', '$file')");
		
		// Show message when user added
		echo "Data Berhasil diinput";

        header("location:https://api.whatsapp.com/send?phone=6283195210808&text=Saya%20$nama_pj%20dari,%0A$nama_instansi%20ingin%20mengundang%20Anda%20untuk%20menjadi%20pembicara%20di%20acara%20$nama_event%20yang%20bertema%20$tema.%20Acaranya%20dilaksanakan%20pada%20$start_event%20sampai%20$end_event.%20Acara%20tersebut%20akan%20dihadiri%20oleh%20$jumlah_audiens%20orang%20dengan%20rentang%20usia%20$rentang_usia.%20Semoga%20Anda%20berkenan.%20Terima%20kasih.%20");
    } else {
        echo "
            <script>
                window.location=history.go(-1);
        ";
    }
?>