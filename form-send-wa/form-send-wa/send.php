</php
    if (isset($_POST['submit'])) {
        $NamaInstansiPengundang     = $_POST['$NamaInstansiPengundang'];
        $NamaPenanggungJawab        = $_POST['$NamaPenanggungJawab'];
        $email                      = $_POST['$email'];
        $no_wa                      = $_POST['$noWa'];
        header("location:https://api.whatsapp.com/send?phone=$no_wa&text=$NamaInstansiPengundang:%20$$NamaInstansiPengundang%20%0DNamaPenanggungJawab:%20$$$NamaPenanggungJawab%20%0DEmail:%20$email");
    } else {
        echo "
            <script>
                window.location=history.go(-1);
        ";
    }
?>