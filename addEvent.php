<?php require('db.php'); ?>
<?php
    $title = $_POST["title"];
    $content = $_POST["content"];
    $type = $_POST["type"];
    
    // 讀取圖片
    $file = fopen($_FILES["banner"]["tmp_name"], "rb");
    $fileContents = fread($file, filesize($_FILES["banner"]["tmp_name"]));
    fclose($file);
    $fileContents = base64_encode($fileContents);

    $bannerType = $_FILES["banner"]["type"];

   
    $sql = "insert into event (title, content, type, banner, bannerType) values ('$title', '$content', '$type', '$fileContents', '$bannerType')";    
    mysqli_query($mysqli, $sql);

    $_SESSION = array(); 
    session_destroy(); 
    
    session_start();
    $_SESSION["title"] = $title;
    $_SESSION["content"] = $content;
    $_SESSION["type"] = $type;
    
    
    header("location: addEventResult.php");
    exit;
    
    

?>