<?php

// Check If form submitted, insert form data into users table.
if (isset($_POST['submit'])) {
    $nama_instansi = $_POST['instansi'];
    $nama_pj = $_POST['penanggungjawab'];
    $nama_event = $_POST['event'];
    $tema = $_POST['tema'];
    $email = $_POST['email'];
    $no_telepon = $_POST['telepon'];
    $start_event = $_POST['tanggal'];
    $end_event = $_POST['tanggal'];
    $rentang_usia = $_POST['usia'];
    $jumlah_audiens = $_POST['jumlahaudiens'];
    $file = @$_FILES['file']['name'];

    $file = null;

    if (@$_FILES && $_FILES['file']['name']) {
        $uploads_dir     = '../Admin/pdf/';
        $tmp_name         = $_FILES['file']['tmp_name'];
        $filename         = basename($_FILES['file']['name']);

        if (move_uploaded_file($tmp_name, $uploads_dir . $filename)) {
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
    <link rel="stylesheet" type="text/css" href="formstyle.css">
    <title>Formulir Undangan</title>
</head>
<body>

    <div class="d-flex align-items-center light-blue-gradient" style="height: 110%; padding: 20px;">
        <div class="container">
            <div class="d-flex justify-content-center">
                <div class="col-md-12">
                    <div class="card rounded-0 shadow">

                        <div class="card-body">
                            <h3>Formulir Undangan</h3>
                            <form action="send.php" method="POST" name="form" enctype="multipart/form-data">


                                <input class="tujuan" type="hidden" value="085894784145" />

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nama Instansi Pengundang: </label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" name="instansi" aria-describedby="emailHelp" placeholder="Nama Instansi">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nama Penanggung Jawab:</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" name="penanggungjawab" aria-describedby="emailHelp" placeholder="Panitia acara">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email: </label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" name="email" aria-describedby="emailHelp" placeholder="Email">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">No Telepon: </label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-white" id="basic-addon1">+62</span>
                                        <input id="telepon"  type="tel" name="telepon" class="form-control" placeholder="No Telp." aria-label="Username" aria-describedby="basic-addon1">
                                    </div>
                                </div>

                                <h5>Data Event</h5>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nama Event:</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" name="event" aria-describedby="emailHelp" placeholder="Nama Event">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Tema:</label>
                                    <input type="text" class="form-control" id="exampleInputPassword1" name="tema" placeholder="Tema">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tanggal mulai pelaksanaan: </label>
                                    <input type="datetime-local" class="form-control" id="exampleInputEmail1" name="tanggalawal" aria-describedby="emailHelp" placeholder="(DD/MM/YY)">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tanggal selesai pelaksanaan: </label>
                                    <input type="datetime-local" class="form-control" id="exampleInputEmail1" name="tanggalakhir" aria-describedby="emailHelp" placeholder="(DD/MM/YY)">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Rentang usia audiens: </label>
                                    <input type="text" class="form-control" id="exampleInputPassword1" name="usia" placeholder="rentang umur (.. - ..)">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Jumlah Audiens: </label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" name="jumlahaudiens" aria-describedby="emailHelp" placeholder="Jumlah audiens">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Upload File: (PDF) </label>
                                    <input type="file" class="form-control" id="exampleInputEmail1" name="file" aria-describedby="emailHelp" placeholder="Upload disini">
                                </div>

                                <input type="hidden" name="noWA" value="085894784145">

                                <div class="float-right">
                                    <button class="button btn-red" ><a href="../index.php" name="kembali">Kembali</button>
                                    <button class="button btn-green" type="submit" name="submit" onclick="return confirm('Anda yakin data yang diisi sudah benar?')">Kirim</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    
    <!-- Optional JavaScript -->
    <script>
    
        $(document).ready(function(){
            $("#telepon").on("input", function(){
            
            if($(this).val()[0] == "0"){          
        
                    $(this).val("");  
            }

            });
        });
    </script>
    
</body>
</html>