
<?php session_start(); ?>
<?php
    require('./db.php');

    // 抓取活動
    $sql_concert = "select * from event where type = '演唱會';";
    $sql_show = "select * from event where type = '脫口秀'; ";

    $result_concert = mysqli_query($mysqli, $sql_concert);
    $result_show = mysqli_query($mysqli, $sql_show);

    

    // while($row_concert = mysqli_fetch_assoc($result_concert)){
    //     var_dump($row_concert);
    // }
    // while($row_show = mysqli_fetch_assoc($result_show)){
    //     var_dump($row_show);
    // }
    // exit;

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />

        <link rel="stylesheet" type="text/css" href="style.css?version=&lt;?php echo time(); ?&gt;">

        <link
            rel="shortcut icon"
            href="./Icons/favicon.ico"
            type="image/x-icon"
        />
        <title>訂GOGI</title>
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
        <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
            integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
            crossorigin="anonymous"
            referrerpolicy="no-referrer"
        />

        <link rel="stylesheet" href="./style/style.css">
        <script src="./main.js"></script>
    </head>
    <body>
        <!-- Navbar -->
        <nav class="navbar navbar-expand-xl navbar-light bg-light fixed-top">
            <div class="container-fluid">
                <a class="navbar-brand" href="#"
                    >訂GOGI <i class="fa-solid fa-gun"></i
                ></a>
                <button
                    class="navbar-toggler"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent"
                    aria-expanded="false"
                    aria-label="Toggle navigation"
                >
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div
                    class="collapse navbar-collapse"
                    id="navbarSupportedContent"
                >
                    <ul class="nav-active navbar-nav me-auto mb-2 mb-lg-0">
                        <!-- <li class="nav-item">
                            <a class="nav-link" href="#">Link</a>
                        </li> -->
                        <li class="nav-item dropdown">
                            <a
                                class="nav-link dropdown-toggle"
                                href="#"
                                id="navbarDropdown"
                                role="button"
                                data-bs-toggle="dropdown"
                                aria-expanded="false"
                            >
                                活動分類
                            </a>
                            <ul
                                class="dropdown-menu"
                                aria-labelledby="navbarDropdown"
                            >
                                <li>
                                    <a class="dropdown-item" href="#active-list-concert">演唱會</a>
                                </li>
                                <!-- <li>
                                    <a class="dropdown-item" href="#">舞台劇</a>
                                </li> -->

                                <li>
                                    <a class="dropdown-item" href="#active-list-show"
                                        >現場脫口秀</a
                                    >
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a
                                class="nav-link"
                                href="#"
                                tabindex="-1"
                                aria-disabled="true"
                                >最新公告</a
                            >
                        </li>
                    </ul>
                    <!-- 登入 -->
                    <?php

                        if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true){
                            // header("location: home.html");
                            echo "
                            <ul class='nav-login navbar-nav me-right mb-2 mb-lg-0'>
                                <li class='nav-item'>
                                    <a class='nav-link' href='#'>你好，".$_SESSION['userName']."</a>
                                </li>
                                
                                <li class='nav-item'>
                                    <a class='nav-link' href='./logout.php'>登出</a>
                                </li>
                            </ul>";
                        }else{
                            echo "
                            <ul class='nav-login navbar-nav me-right mb-2 mb-lg-0'>
                                <li class='nav-item'>
                                    <a class='nav-link' href='./index.php'>登入</a>
                                </li>
                                <li class='nav-item'>
                                    <a class='nav-link' href='./register.html'>註冊</a>
                                </li>
                            </ul>";

                        }
                    
                    ?>
                    <!-- <ul class="nav-login navbar-nav me-right mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="./index.php">登入</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./register.html">註冊</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./logout.php">登出</a>
                        </li>
                    </ul> -->
                    
                </div>
            </div>
        </nav>

        <!-- Carousel -->
        <div
            id="carouselExampleIndicators"
            class="carousel slide"
            data-bs-ride="carousel"
        >
            <div class="carousel-indicators">
                <button
                    type="button"
                    data-bs-target="#carouselExampleIndicators"
                    data-bs-slide-to="0"
                    class="active"
                    aria-current="true"
                    aria-label="Slide 1"
                ></button>
                <button
                    type="button"
                    data-bs-target="#carouselExampleIndicators"
                    data-bs-slide-to="1"
                    aria-label="Slide 2"
                ></button>
                <button
                    type="button"
                    data-bs-target="#carouselExampleIndicators"
                    data-bs-slide-to="2"
                    aria-label="Slide 3"
                ></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img
                        src="./image/banner_1.jpg"
                        class="d-block w-100"
                        alt="..."
                    />
                </div>
                <div class="carousel-item">
                    <img
                        src="./image/banner_2.jpg"
                        class="d-block w-100"
                        alt="..."
                    />
                </div>
                <div class="carousel-item">
                    <img
                        src="./image/banner_3.jpg"
                        class="d-block w-100"
                        alt="..."
                    />
                </div>
            </div>
            <button
                class="carousel-control-prev"
                type="button"
                data-bs-target="#carouselExampleIndicators"
                data-bs-slide="prev"
            >
                <span
                    class="carousel-control-prev-icon"
                    aria-hidden="true"
                ></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button
                class="carousel-control-next"
                type="button"
                data-bs-target="#carouselExampleIndicators"
                data-bs-slide="next"
            >
                <span
                    class="carousel-control-next-icon"
                    aria-hidden="true"
                ></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

        <section class="active">
            <h3>近期活動</h3>

            <h4 id="active-list-concert">演唱會</h4>
            <div class="active-list-concert">
                
                

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
                                    <a href='#' class='btn btn-primary'>查看詳情</a>
                                </div>
                            </div>
                        
                        ";
                    }
                ?>


            </div>
            <hr />

            <h4 id="active-list-show">脫口秀</h4>
            <div class="active-list-show" >
                
                <!-- <div class="card" style="width: 18rem">
                    <img src="..." class="card-img-top" alt="..." />
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">
                            Some quick example text to build on the card title
                            and make up the bulk of the card's content.
                        </p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div> -->
               

                <?php
                    while($row_show = mysqli_fetch_assoc($result_show)){

                        $banner = $row_show["banner"];
                        $bannerType = $row_show["bannerType"]; 
                        $src = "data:$bannerType;base64,$banner";                        

                        echo "
                            <div class='card' style='width: 18rem;'>
                                <img src='$src' class='card-img-top' alt='...' />
                                <div class='card-body'>
                                    <h5 class='card-title'>{$row_show['title']}</h5>
                                    <p class='card-text'>
                                        {$row_show['content']}
                                    </p>
                                    <a href='#' class='btn btn-primary'>查看詳情</a>
                                </div>
                            </div>
                        
                        ";
                    }
                ?>
            </div>

            
        </section>

        <!-- Footer -->
        <footer>
            <div class="top">
                <a href="">服務條款</a><span>|</span> <a href="">隱私權政策</a
                ><span>|</span> <a href="">常見問題</a><span>|</span
                ><a href="">合作夥伴</a><span>|</span><a href="">下載App</a>
            </div>
            <div class="icon">
                <a href=""><img src="./Icons/facebook.svg" alt="FB" /></a>
                <a href=""><img src="./Icons/instagram.svg" alt="IG" /></a>
                <a href=""><img src="./Icons/youtube.svg" alt="YT" /></a>
                <a href=""><img src="./Icons/twitter.svg" alt="twitter" /></a>
            </div>
            <div class="contact">
                <i class="fa-solid fa-envelope"></i>
                <span>客服信箱:jim0228xie@gmail.com</span>&nbsp
                <i class="fa-solid fa-phone"></i>
                <span>客服專線:0800-092-000</span>&nbsp
                <i class="fa-solid fa-clock"></i><span></span>
                <span>服務時間:12:00pm-12:01pm</span>
                <br />
                <i class="fa-solid fa-location-dot"></i
                ><span
                    >臺中市南屯區公益路二段51號18樓 (國泰人壽公益大樓內)</span
                >
            </div>
            <hr />
            <div class="copyRight">
                <span
                    >&copy;2022 訂GOGI（訂孤支）Corporation, 所有圖片以教學練習用為主.</span
                >
            </div>
        </footer>
    </body>
</html>
