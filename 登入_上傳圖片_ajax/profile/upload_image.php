<?php require('db.php'); ?>
<?php
    $uid = $_POST['uid'];
    $tmp_name = $_FILES['file']['tmp_name'];
    $contents = file_get_contents($tmp_name);
    $stmt = $mysqli->prepare("update UserInfo set image = ? where uid = ?");
    $stmt->bind_param("bs", $contents, $uid);
    $stmt->send_long_data(0, $contents);
    $stmt->execute();

    $mime_type = (new finfo(FILEINFO_MIME_TYPE))->buffer($contents);
    $image = base64_encode($contents);
    echo "data:$mime_type;base64,$image";
?>
