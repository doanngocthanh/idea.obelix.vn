<?php
include_once("Model/loaiDanhMuc.php");
include_once("Model/danhMucBaiViet.php");
include_once("Model/baiViet.php");
include_once("Model/nguoiDung.php");
$base_url="http://".$_SERVER['SERVER_NAME'].dirname($_SERVER["REQUEST_URI"].'?').'/admin//';
class adminController{

     public function login($username,$password)
     { 
         $nguoiDung= new nguoiDung();
         $nguoidung=$nguoiDung->checkNguoiDung($username,$password);
         if(count($nguoidung)==0){
             echo '<div class="alert alert-error">
            Dữ liệu không chính xác!
           </div>';
         }else{
            $_SESSION["userencode"] =$nguoidung;
            header("Location:".$base_url."index.php");
            die();
         }
     }
     public function logout(){
        $_SESSION["userencode"] =null;
        header("Location:".$base_url."index.php");
     }
     public function checksession(){
       if(isset($_SESSION["userencode"])){

       }else{
       header("Location:".$base_url."index.php");

       }
       
     }
	
   
}