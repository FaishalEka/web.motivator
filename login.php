<?php
    include 'library.php';

    sudahLogin();

    if ($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $sql = " SELECT *  FROM admin WHERE email = '$email' AND password = SHA1('$password')";

        $data = $mysqli -> query($sql) or die($mysqli->error);

        if ($data->num_rows != 0)
        {
            $row = mysqli_fetch_object($data);
            $_SESSION['email'] = $row -> email;
            $_SESSION['level'] = $row -> level;
            header('location:Admin/index.php');
        }
        else
        {
            $error ="<script>alert('Username atau Password salah')</script>";
            echo $error;
        }
    }

    include 'v_login.php';
?>