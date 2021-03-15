<?php
    setcookie('password', null);
    setcookie('username', null);
    session_start();
	session_unset();
	session_destroy();
    header('location:login.php');
?>