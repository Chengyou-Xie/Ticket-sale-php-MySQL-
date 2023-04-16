<?php require('./db.php') ?>

<?php

    $account = $_POST['account'];
    $password = $_POST['password'];
    // $passwordCheck = $_POST['passwordCheck'];
    $userName= $_POST['userName'];
    $birthday = $_POST['birthday'];


    // 檢查帳號是否重複
    $check = "select * from user_info where account = '$account' ";  
    $result = mysqli_query($mysqli, $check);  
    if(mysqli_num_rows($result) == 0){
        $sql = "insert into user_info (account, password, userName, birthday) values ('$account', '$password', '$userName', '$birthday')";

        if(mysqli_query($mysqli, $sql)){
            echo "註冊成功！3秒後將自動跳轉登入頁面<br>";
            echo "<a href='login.html'>未成功跳轉頁面請點擊此</a>";
            header("refresh: 3; url = index.php");
            exit;
        }else{
            echo "Error creating table:".$mysqli_error($mysqli);
        }
    }else{
        echo "該郵件已有人使用！<br>3秒後將自動跳轉頁面<br>";
        echo "<a href='./register.html'>未成功跳轉頁面請點擊此</a>";
        header("refresh: 3; url = register.html");
        exit;
    }

    mysql_close($mysqli);

    function function_alert($message){
        echo "<script>alert('$message');
            window.location.href='index.php';
            </script>";
            return false;
    }







    // $sql = 'insert into user_info(account, password, name, birthday) values (?, ?, ?, ?)';
    
    // $stmt = $mysqli->prepare($sql);
    // $stmt->bind_param('ssss', $account, $password, $userName, $birthday);
    // $stmt->execute();
    // $result = $stmt->get_result();
    // $row = $result->fetch_assoc();
    // $err = $row['err'];
    // $des = $row['description'];

    // header('content-type: application/json, charset=utf-8');
    // echo "{\"error\":\"$err\", \"description\": \"$des\"}";
    // echo $err.$des;

?>