<?php
 
	// Check If form submitted, insert form data into users table.
	if(isset($_POST['submit'])) {
		$nama_instansi= $_POST['instansi'];
        $nama_pj = $_POST['penanggungjawab'];
        $nama_event = $_POST['event'];
        $tema = $_POST['tema'];
        $email = $_POST['email'];
        $no_telepon = $_POST['telepon'];
        $start_event = $_POST['tanggal'];
        $end_event = $_POST['tanggal'];
        $rentang_usia = $_POST['usia'];
        $jumlah_audiens = $_POST['jumlahaudiens'];      

		// include database connection file
		include_once("library.php");
				
		// Insert user data into table
		$result = mysqli_query($mysqli, "INSERT INTO form(nama_instansi, nama_pj, nama_event, tema, email, no_telepon, start_event, end_event, rentang_usia, jumlah_audiens) 
                                         VALUES('$nama_instansi', '$nama_pj', '$nama_event', '$tema', '$email', '$no_telepon', '$start_event', '$end_event', '$rentang_usia', '$jumlah_audiens')");
		
		// Show message when user added
		echo "User added successfully.";
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
                            
                        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

                        <div class="card-body">
                                <h3>Formulir Undangan</h3>
                                <form action="form.php" method="POST" name="form">

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
                                            <label for="exampleInputEmail1">Nomor telepon: </label>
                                            <input type="text" class="form-control" id="exampleInputEmail1" name="telepon" aria-describedby="emailHelp" placeholder="Nomor telepon">
                                        </div>
                                
                                <h4>Data Event</h4>

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
                                            <input type="date" class="form-control" id="exampleInputEmail1" name="tanggal" aria-describedby="emailHelp" placeholder="(DD/MM/YY)">
                                    </div>
                                        
                                    <div class="form-group">
                                            <label for="exampleInputEmail1">Tanggal selesai pelaksanaan: </label>
                                            <input type="date" class="form-control" id="exampleInputEmail1" name="tanggal" aria-describedby="emailHelp" placeholder="(DD/MM/YY)">
                                    </div>        

                                    <div class="form-group">
                                            <label for="exampleInputPassword1">Rentang usia audiens: </label>
                                            <input type="text" class="form-control" id="exampleInputPassword1" name="usia" placeholder="rentang umur (.. - ..)">
                                        </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Jumlah Audiens: </label>
                                        <input type="text" class="form-control" id="exampleInputEmail1" name="jumlahaudiens" aria-describedby="emailHelp" placeholder="Jumlah audiens">
                                    </div>
                                    
                                    <div class="form-group form-check">
                                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                        <label class="form-check-label" for="exampleCheck1"name="checklist">Semua data yang diinput sudah benar?</label>
                                    </div>

                                    <button> <a href="index.html" class="button"name="kembali">Kembali</button>
                                    <button class="submit" type="submit" name="submit" value="add">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>


<script>
    
 $('.whatsapp-btn').click(function(){
	$('#whatsapp').toggleClass('toggle');
});
// Onclick Whatsapp Sent!
$('#whatsapp .submit').click(WhatsApp);

$("#whatsapp input, #whatsapp textarea").keypress(function() {
	if (event.which == 13) WhatsApp();
});
var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
function WhatsApp() {

	var ph = '';
	if ($('#whatsapp .nama').val() == '') { // Cek Nama
		ph = $('#whatsapp .nama').attr('placeholder');
		alert('Silahkan tulis ' + ph);
		$('#whatsapp .nama').focus();
		return false;

	} else if ($('#whatsapp .alamat').val() == '') { // Cek alamat
		ph = $('#whatsapp .alamat').attr('placeholder');
		alert('Silahkan tulis ' + ph);
		$('#whatsapp .alamat').focus();
		return false;

	} else if ($('#whatsapp .nomor').val() == '') { // Cek Nomor
		ph = $('#whatsapp .nomor').attr('placeholder');
		alert('Silahkan tulis ' + ph);
		$('#whatsapp .nomor').focus();
		return false;

	} else if ($('#whatsapp .pesan').val() == '') { // Cek Pesan
		ph = $('#whatsapp .pesan').attr('placeholder');
		alert('Silahkan tulis ' + ph);
		$('#whatsapp .pesan').focus();
		return false;

	} else {
		if (!confirm("Kirim Ke WhatsApp?")) {
			window.open("https://www.whatsapp.com/download/");
		} else {
            
			// Check Device (Mobile/Desktop)
			var url_wa = 'https://web.whatsapp.com/send';
			if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
				url_wa = 'whatsapp://send/';
			}
			// Get Value
			var tujuan = $('#whatsapp .tujuan').val(),
					via_url = location.href,
					nama = $('#whatsapp .nama').val(),
					alamat = $('#whatsapp .alamat').val(),
                    nomor = $('#whatsapp .nomor').val(),
					pesan = $('#whatsapp .pesan').val();
			$(this).attr('href', url_wa + '?phone=62 ' + tujuan + '&text=Halo admin saya mau order, saya *' + nama + '* %0A%0AAlamat:%20' + alamat +' %0A%0ANo.tlp:%20'+ nomor + ' %0A%0APaket:%20' + pesan + '%0A%0AMohon dibantu total dan cara pembayarannya kak');
			var w = 960,
					h = 540,
					left = Number((screen.width / 2) - (w / 2)),
					tops = Number((screen.height / 2) - (h / 2)),
					popupWindow = window.open(this.href, '', 'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=yes, resizable=1, copyhistory=no, width=' + w + ', height=' + h + ', top=' + tops + ', left=' + left);
			popupWindow.focus();
			return false;
		}
	}
}
</script>

                <!-- Optional JavaScript -->
                <!-- jQuery first, then Popper.js, then Bootstrap JS -->
                <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
                <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
            </div>
    </body>
</html>
