<?php
session_start();
if(isset($_COOKIE['uid'])){
    $_SESSION['uid'] = $_COOKIE['uid'];
    setcookie('uid', $uid, time()+30);
    header('location: ../profile/');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="./login.php" method="post">
        輸入帳號<input name="uid"> <br>
        輸入密碼<input type="password" name="pwd">
        <p>
        <input type="submit">
    </form>
</body>
</html>