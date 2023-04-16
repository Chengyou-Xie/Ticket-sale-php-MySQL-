<?php require("db.php"); ?>
<?php
    require('./db.php');

    // 抓取活動
    $sql_concert = "select * from event where type = '演唱會';";
    $sql_show = "select * from event where type = '脫口秀'; ";

    $result_concert = mysqli_query($mysqli, $sql_concert);
    $result_show = mysqli_query($mysqli, $sql_show);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0"
            crossorigin="anonymous"
        />
        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8"
            crossorigin="anonymous"
        ></script>
    <title>Document</title>
    <style>
        div.eventContainer{
            display: flex;
            width: 70%;
        }
        img{
            height: 10vw;
            object-fit: cover;
        }
        p{
            overflow: hidden;
            text-overflow: ellipsis;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
        }
        form{
            position: absolute;
            top: 0;
            right: 0;
            border: 1px solid black;
            padding: 1rem;
        }
        label{
            margin: 1rem 0;
        }
    </style>
</head>
<body>
    <div class="eventContainer">
        <?php
            while($row_concert = mysqli_fetch_assoc($result_concert)){

                $banner = $row_concert["banner"];
                $bannerType = $row_concert["bannerType"]; 
                $src = "data:$bannerType;base64,$banner";                        

                echo "
                    <div class='card' style='width: 18rem;'>
                        <img src='$src' class='card-img-top' alt='...' />
                        <div class='card-body'>
                            <h5 class='card-title'>{$row_concert['title']}</h5>
                            <p class='card-text'>
                                {$row_concert['content']}
                            </p>
                            <a href='edit.php' class='btn btn-primary'>修改</a>
                        </div>
                    </div>
                            
                ";
            }
        ?>
    </div>
    <form action="" method="post" enctype="multipart/form-data">
            <label for="title">活動名稱</label>
            <input type="text" id="title" name="title" /><br />

            <label for="content">活動內容</label>
            <textarea
                name="content"
                id="content"
                cols="30"
                rows="10"
            ></textarea>
            <br />

            <label for="type">活動類型</label>
            <!-- <input type="text" id="type" name="type" /><br /> -->
            <select name="type">
                <option selected value="">請選擇</option>
                <option value="演唱會">演唱會</option>
                <option value="脫口秀">脫口秀</option>
            </select>
            <br />

            <label for="banner">宣傳圖</label>
            <input
                type="file"
                id="banner"
                name="banner"
                accept="image/*"
            /><br />
            <button type="reset">重置</button>
            <button>送出</button>
        </form>

</body>
</html>