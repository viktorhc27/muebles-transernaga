<?php
session_start();
if (isset($_SESSION['user'])) {
    /* header('Location:http://localhost/muebles-transernaga/views/admin/home/home.php?param=inicio'); */
    echo "<script>";
    echo "location.href='./views/admin/home/home.php?param=inicio'";
    echo "</script>";
} else {
    include_once './views/admin/login/login.php';
}
