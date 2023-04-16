<?php session_start(); ?>
<?php require("db.php"); ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Document</title>
        <style>
            img{
                width: 300px;
            }
        </style>
    </head>
    <body>
        <h1>新增售票活動</h1>
        <hr />
        <?php
        
            echo "活動名稱:".$_SESSION["title"]."<br>";
            echo "活動內容:".$_SESSION["content"]."<br>";
            echo "活動類型:".$_SESSION["type"]."<br>";


            $sql = "select * from event where title = '".$_SESSION["title"]."'";
            $result = mysqli_query($mysqli, $sql);
            $row = mysqli_fetch_assoc($result);

            $banner = $row["banner"];
            $bannerType = $row["bannerType"]; 
            // $mime_type = (new finfo(FILEINFO_MIME_TYPE))->buffer($itemImage);
            // $itemImage = base64_encode($itemImage);
            $src = "data:$bannerType;base64,$banner";

            
        ?>
        <img src="<?= $src ?>">
        <hr>
        <a href="admin.html">繼續新增</a>
    </body>
</html>
