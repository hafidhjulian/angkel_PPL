<?php
    include 'koneksi.php';

    $NRP = $_POST['nrp'];
    $password = md5($_POST['password']);
    $login = mysqli_query($db,"SELECT * FROM pegawai WHERE NRP= '$NRP' and password= '$password'");
    if(mysqli_num_rows($login)>0){
        $row = mysqli_fetch_array($login);
        session_start();
        $_SESSION['nrp'] = $NRP;
        $_SESSION['username']= $row['username'];
        $_SESSION['status'] = 'login';
        header("location:pageUser.php");
    }else{
        header("location:masukUser.php");
    }
?>