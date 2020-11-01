<?php

if(isset($_POST['email'])){
    //action
    $conn=$con->koneksi();
    $email=$_POST['email'];
    $psw=$_POST['password'];
    $sql = "SELECT * FROM tb_login where password ='$psw' and email ='$email'";
    $user = $conn->query($sql);
    if($user->num_rows > 0){
        
        $sess=$user->fetch_array();
        $_SESSION['login']['email']=$sess['email'];
        $_SESSION['login']['id']=$sess['id'];
        $url="http://localhost/perpusra";
        header('Location: http://localhost/perpusra/admin/index.php?mod=buku');
    }else{
        $msg="Email dan Password tidak cocok";
        include_once 'views/v_login.php';
    }
}else{
    include_once 'views/v_login.php';
}
?>