<?php
    session_start();

    if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true){
        header("location: home.php");
        exit;
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link
            rel="shortcut icon"
            href="./Icons/favicon.ico"
            type="image/x-icon"
        />
        <title>訂GOGI | 登入</title>
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

        <link rel="stylesheet" href="./style/style.css" />
        <script src="./main.js"></script>
    </head>
    <body>
        <!-- Navbar -->
        <nav class="navbar navbar-expand-xl navbar-light bg-light fixed-top">
            <div class="container-fluid">
                <a class="navbar-brand" href="./home.php"
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
                                    <a class="dropdown-item" href="home.php#active-list-concert">演唱會</a>
                                </li>
                                <!-- <li>
                                    <a class="dropdown-item" href="#">舞台劇</a>
                                </li> -->

                                <li>
                                    <a class="dropdown-item" href="home.php#active-list-show"
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
                    <ul class="nav-login navbar-nav me-right mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="index.php">登入</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./register.html">註冊</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <section class="login">
            <h1>會員登入</h1>
            <hr />
            <h2 id="ligin-form- title">請先登入會員方可購票及使用會員服務</h2>
            <div id="login-form">
                <form action="login.php" id="register" method="post">
                    <ul>
                        <li><label for="account">* 帳號：</label></li>
                        <li><label for="password">* 密碼：</label></li>
                        <!-- <li><label for="user_name">* 姓名：</label></li>
                        <li><label for="birthday">* 出生日：</label></li> -->
                        <li><label for="verify">驗證碼：</label></li>
                    </ul>
                    <ul>
                        <li>
                            <input
                                type="email"
                                name="account"
                                id="account"
                                placeholder=" 請輸入帳號"
                                required
                            />
                        </li>
                        <li>
                            <input
                                type="password"
                                name="password"
                                id="password"
                                placeholder=" 請輸入密碼"
                                required
                            />
                        </li>
                        <!-- <li>
                            <input
                                type="text"
                                id="userName"
                                placeholder=" 請輸入姓名"
                            />
                        </li>
                        <li>
                            <input
                                type="date"
                                id="birthday"
                                placeholder=" 請選擇出生日"
                            />
                        </li> -->
                        <li>
                            <input
                                type="text"
                                id="varify"
                                placeholder="（此功能尚未開通）"
                                disabled
                            />
                        </li>
                    </ul>
                    <div class="button-box">
                        <button type="reset" class="reset">重設</button>
                        <button type="submit" class="login">登入</button>
                    </div>
                </form>
                <a href="./register.html" id="toRegister">尚未註冊</a>
            </div>
        </section>

        <section class="ad">
            <h3>歡迎乾爹置入</h3>
        </section>

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
                    >&copy;2022 訂GOGI（訂孤支）Corporation, ALL RIGHTS
                    RESERVED.</span
                >
            </div>
        </footer>
    </body>
</html>
