<!DOCTYPE html>
<html>
<head>
    <title>Form Send WA</title>
    <meta charset=utf-8>
    <meta name=description content="">
    <meta name=viewport content="width=device-width,initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css">
</head>
<body>

    <selection>
        <div class="container">
            <br><br>
            <h3>Form Send WhatsApp</h3>
            <br><br>

            <div class="row">
                <div class="col-6">
                    <form action="send.php" method="post" target="_blank">
                        <div class="form-group">
                            <label for="Nama Instansi Pengundang">Nama Instansi Pengundang</label>
                            <input type="Nama Instansi Pengundang" class="form-control" placeholder="Nama Instansi Pengundang">
                        </div>
                        <div class="form-group">
                            <label for="Nama Penanggung Jawab">Nama Instansi Pengundang</label>
                            <input type="Nama Penanggung Jawab" class="form-control" placeholder="Nama Penanggung Jawab">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" placeholder="email">
                        </div>
                        <input type="hidden" name="noWA" value="085678907654">

                        <button type="submit" name="submit" class="btn btn-primary">Send</button>
                    </form>
                </div>
            </div>
         </div>
    <selection>


</body>
</html>