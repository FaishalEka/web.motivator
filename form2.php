<?php
 
	// Check If form submitted, insert form data into users table.
	if(isset($_POST['submit'])) {
        $nama_event = $_POST['event'];
        $tema = $_POST['tema'];
        $penentuan_jadwal = $_POST['tanggal'];
        $rentang_usia = $_POST['usia'];
        $jumlah_audiens = $_POST['jumlahaudiens'];      

		// include database connection file
		include_once("library.php");
				
		// Insert user data into table
		$result = mysqli_query($mysqli, "INSERT INTO form(nama_instansi, nama_pj, nama_event, tema, email, no_telepon, penentuan_jadwal, rentang_usia, jumlah_audiens ) VALUES('$nama_instansi', '$nama_pj', '$nama_event', '$tema', '$email', '$no_telepon', '$penentuan_jadwal', '$rentang_usia', '$jumlah_audiens')");
		
		// Show message when user added
		echo "Data berhasil di input.";
	}
	?>
<!doctype html>
<html lang="en">
    <head>
        <!-- meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="css/register.css">
        <title>Formulir Undangan</title>
    </head>
    <body >

        <div class="d-flex align-items-center light-blue-gradient" style="height: 110vh;">
            <div class="container" >
                <div class="d-flex justify-content-center">
                    <div class="col-md-6">
                        <div class="card rounded-0 shadow">
                            <div class="card-body">

                                <h3>Formulir Undangan</h3>
                                <br>
                                <h4>Informasi Event</h4>
                                <form action="form.php" method="POST" name="form">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Nama Event: </label>
                                        <input type="text" class="form-control" id="exampleInputEmail1" name="event" aria-describedby="emailHelp" placeholder="Nama Event">
                                    </div>

                                    <div class="form-group">
                                            <label for="exampleInputEmail1">Tema:</label>
                                            <input type="text" class="form-control" id="exampleInputEmail1" name="tema" aria-describedby="emailHelp" placeholder="Tema">
                                        </div>

                                    <div class="form-group">
                                            <label for="exampleInputEmail1">Rentang Usia Audiens: </label>
                                            <input type="text" class="form-control" id="exampleInputEmail1" name="usia" aria-describedby="emailHelp" placeholder="... - ...">
                                        </div>

                                    <div class="form-group">
                                            <label for="exampleInputEmail1">Jumlah Audiens: </label>
                                            <input type="text" class="form-control" id="exampleInputEmail1" name="jumlahaudiens" aria-describedby="emailHelp" placeholder="Jumlah Audiens">
                                        </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Tanggal Mulai Pelaksanaan: </label>
                                        <input type="date" class="form-control" id="exampleInputEmail1" name="tanggal" aria-describedby="emailHelp" placeholder="Tanggal Pelaksanaan">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Tanggal Selesai Pelaksanaan: </label>
                                        <input type="date" class="form-control" id="exampleInputEmail1" name="tanggal" aria-describedby="emailHelp" placeholder="Tanggal Pelaksanaan">
                                    </div>
                            
                                    
                                    <div class="form-group form-check">
                                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                        <label class="form-check-label" for="exampleCheck1"name="checklist">Semua data yang diinput sudah benar?</label>
                                    </div>

                                    <button> <a href="form.php" class="button" name="kembali">Kembali</button>

                                    <button href="whatsapp://send?text=Silahkan Isi Formulir dibawah ini, lalu kirim                                         
                                        Nama : 
                                        
                                                            Umur : 
                                                            
                                                            Alamat: 
                                        
                                                            Asal Sekolah:                              
                                                            
                                        &phone=+6283195210808" type="submit" name="submit" value="add">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Optional JavaScript -->
                <!-- jQuery first, then Popper.js, then Bootstrap JS -->
                <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
                <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
            </div>
    </body>
</html>
