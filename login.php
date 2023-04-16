<?php require('./db.php'); ?>
    
<?php

    $account=$_POST["account"];
    $password=$_POST["password"];

    //增加hash可以提高安全性
    $password_hash=password_hash($password,PASSWORD_DEFAULT);

    // 確認輸入的帳號密碼是否正確ㄊ
    $sql = "select * from user_info where account = '$account'";
    $result = mysqli_query($mysqli, $sql);

    // 不知道為何 mysqli_fetch_assoc 用第二次後會出現錯誤，故將 mysqli_fetch_assoc 另存為 detail
    $detail = mysqli_fetch_assoc($result);

    if((mysqli_num_rows($result) == 1) && ($password == $detail["password"])){

        session_start();


        // Store data in session variables
        $_SESSION["loggedin"] = true;

        // ，故用使用者輸入的值
        $_SESSION["uid"] = $detail["uid"];
        $_SESSION["userName"] = $detail["userName"];
        

        header("location: home.php");

    }else{
        function_alert("帳號或密碼錯誤");
    }

    mysqli_close($mysqli);

    function function_alert($message){
        echo "<script> alert('$message');
            window.location.href = 'index.php'; 
            </script>";
        return false;
    }




    
?>