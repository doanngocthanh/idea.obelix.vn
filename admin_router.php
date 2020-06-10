<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IDEA-MANAGER</title>
    <?php include_once("includes/admin_links.php"); ?>
</head>

<body>
    <?php
    include_once("includes/admin_menu.php");
    if(isset($_SESSION["userencode"])&&$_SESSION["userencode"]!=null){
    }else{
    header('location:admin_login.html');
    }
    
    ?>
    <?php


    if (isset($_GET['btAction'])) {
        if ($_GET['btAction'] == 'logout') {
            $_SESSION["userencode"] = null;
            header("Location:admin_login.html");
        } else if ($_GET['btAction'] == 'qlmn') {
            include('admin_quanlymenu.php');
        } else if ($_GET['btAction'] == 'qlbv') {
            include('admin_quanlybaiviet.php');
        } else if ($_GET['btAction'] == 'qltk') {
            echo 'quản lý tài khoản';
        }
    } else {
        include('admin_quanlymenu.php');
    }
   
    
   
    ?>

</body>

</html>