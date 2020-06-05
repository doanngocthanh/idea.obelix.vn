<?php
include_once("Model/database.php");
class nguoiDung extends DB {
  function checkNguoiDung($username,$password){

    return $this->select("SELECT * FROM `nguoidung` WHERE ten_dang_nhap='$username' and mat_khau='$password'");
  }
  
  function insertLoaiDanhMuc($ten_loai,$hide_show,$menu_index){
    return $this->select("INSERT INTO `loaidanhmuc` (`ten_loai`, `hide_show`, `menu_index`) VALUES ('$ten_loai','$hide_show','$menu_index')"); 
  }
}

?>