<?php
 include_once("Controller/homeController.php");
try {
  $base_url="http://".$_SERVER['SERVER_NAME'].dirname($_SERVER["REQUEST_URI"].'?').'/';
   //code...
   $controller = new Controller();
 if(isset($_GET['page'])){

  if($_GET['page']=='danh-sach-bai-viet'){
       $controller->DanhSachCtroller($_GET['page'],$_GET['danh-muc'],$_GET['id-loai'],$_GET['id-bai-viet']);
  }else{
    $controller->index();
  }
}else{
  $controller->index();
  }
} catch (\Throwable $th) {
   $controller->pageEror($th);
}
?>