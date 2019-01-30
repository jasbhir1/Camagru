<?php
//to logout user
session_start();
session_destroy();
header("location:login.php");
?>