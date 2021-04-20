<?php
    session_start();

    function base_url() {
        return "http://localhost/WEB/web.motivator";
    }

    function cekLogin() {
        $email = @$_SESSION['email'];
        $password = @$_SESSION['password'];

        if (empty($email) AND empty($password)) {
            header("location:login.php");
        }
    }

    function sudahLogin() {
        $email = @$_SESSION['email'];
        $password = @$_SESSION['password'];

        if (!empty($email) AND !empty($password)) {
            header("location:login.php");
        }
    }
?>