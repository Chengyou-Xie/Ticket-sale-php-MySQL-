<?php
setcookie('a', 'hello world', time() + 60*10);
setcookie('b', 'hi', time() + 60);
echo 'done';
?>