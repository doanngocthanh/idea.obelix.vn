<?php
include_once("Model/database.php");
class loaiDanhMuc extends DB {
  function getAll(){
    return $this->select("SELECT * FROM `loaidanhmuc` WHERE hide_show=0");
  }
  
  function insertLoaiDanhMuc($ten_loai,$hide_show,$menu_index){
    return $this->select("INSERT INTO `loaidanhmuc` (`ten_loai`, `hide_show`, `menu_index`) VALUES ('$ten_loai','$hide_show','$menu_index')"); 
  }
}

?>