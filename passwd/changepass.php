<?php
    session_start();
    require_once('../config/connection.php');
    require_once('../config/global_function.php');
    $data = validatePass($_POST['username'], $_POST['oldpassword']);
    if ($data) {
        $pass_baru = $_POST['passwordbaru'];
        $pass_konf = $_POST['passwordbaru2'];

        if($pass_baru == $pass_konf){
            $pass_enc = md5($pass_konf);
            $change = mysqli_query($conn,"UPDATE user set password = '$pass_enc' WHERE username='$data[username]'");
            if($change){
                session_destroy();
                echo"<script>alert('Password berhasil di update !');document.location='../user'</script>";

            }
        }else{
            echo"<script>alert('Gagal mengganti password !');document.location='index.php'</script>";            
        }
    }else{
        echo"<script>alert('Username atau Password lama anda tidak terdaftar !');document.location='index.php'</script>";
    }
?>