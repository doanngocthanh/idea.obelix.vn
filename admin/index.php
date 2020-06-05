<?php 
include_once('Model/database.php');
$base_url="http://".$_SERVER['SERVER_NAME'].dirname($_SERVER["REQUEST_URI"].'?').'/';

if($_SESSION["userencode"]==null){
     header("Location:login.php");
    die();
}else{
     include("dashboard.php");
}
?>