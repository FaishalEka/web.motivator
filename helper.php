<?php
    session_start();

    function base_url() {
        return "http://localhost/web.motivator/";
    }

    function flash($tipe, $pesan = '') {
        if (empty($pesan)) {
            $pesan = @$_SESSION[$tipe];
            unset($_SESSION[$tipe]);
            return $pesan;
        } else {
            $_SESSION[$tipe] = $pesan;
        }
    }

    function cekLogin() {
        $email = @$_SESSION['email'];
        $level = @$_SESSION['level'];

        if (empty($email) AND empty($level)) {
            header("location:../v_login.php");
        }
    }

    function sudahLogin() {
        $email = @$_SESSION['email'];
        $level = @$_SESSION['level'];

        if (!empty($email) AND !empty($level)) {
            header("location:v_login.php");
        }
    }
?>