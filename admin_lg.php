
<?php
include_once('Model/nguoiDung.php');
$nguoiDung=new nguoiDung();

if(isset($_POST['username'])&&isset($_POST['password'])){
$checknguoidung=$nguoiDung->checkNguoiDung($_POST['username'],$_POST['password']);
if(count($checknguoidung)!=0){
    $_SESSION["userencode"]==$checknguoidung;
}

}
include("admin_index.php");
?>
