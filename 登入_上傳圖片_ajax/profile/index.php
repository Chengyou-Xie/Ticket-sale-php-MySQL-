<?php require('../islogin.php'); ?>
<?php require('db.php'); ?>
<?php
// $uid = 'A02';

$sql = "select * from UserInfo where uid = ?";
$stmt = $mysqli->prepare($sql);
$stmt->bind_param("s", $uid);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

$cname = $row['cname'];
$image = @$row['image'];
$mime_type = (new finfo(FILEINFO_MIME_TYPE))->buffer($image);
$image = base64_encode($image);
$src = "data:$mime_type;base64,$image";
?>

<html>
<style>
img {
    width: 180px;
    height: 180px;
    object-fit: cover;
}
</style>
<script>
function loadDoc() {
    const xhttp = new XMLHttpRequest();
    xhttp.onload = function() {
        document.getElementById("headimage").src = this.responseText;
    }

    uid = document.getElementById("uid").value;
    file = document.getElementById("file").files[0];
    formData = new FormData();
    formData.append("uid", uid);
    formData.append("file", file, file.name);

    xhttp.open("POST", "upload_image.php", true);
    xhttp.send(formData);
}
</script>
<body>
<img src="<?= $src ?>" id="headimage" border="1"><p/>
<form>
    <input type="hidden" name="uid" id="uid" value="<?= $uid ?>">
    <input type="file" name="file" id="file"><br/>
    <input type="button" value="上傳" onclick="loadDoc()">
</form>
<label>帳號：</label><?= $uid ?><p/>
<label>姓名：</label><?= $cname ?><p/>
<form action="../login/logout.php">
    <input type="submit" value="登出">
</form>
</body>
</html>

