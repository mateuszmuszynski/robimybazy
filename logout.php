<?php
unset($_COOKIE["user"]);
setcookie('user', null, -1, '/');
session_destroy();
header('Location: login.php', true, 301);
?>

<div>test</div>

