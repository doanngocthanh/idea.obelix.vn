<?php
include_once("Model/database.php");
class loaiDanhMuc extends DB {
  function getAll(){
    return $this->select("SELECT * FROM `loaidanhmuc`");
  }
  function getId($id){
    return $this->select("SELECT * FROM `loaidanhmuc` WHERE id_loai='$id'");
  }
  
  function insertLoaiDanhMuc($id,$ten_loai,$hide_show){
    $hide_show_con=0;
    if($hide_show=='on'){
      $hide_show_con=1;
    }
    return $this->select("INSERT INTO `loaidanhmuc` (`id_loai`,`ten_loai`, `hide_show`) VALUES ('$id','$ten_loai','$hide_show_con')"); 
  }
  function deleteLoaiDanhMuc($id){
    return $this->select("DELETE FROM `loaidanhmuc`
    WHERE id_loai = '$id'"); 
  }
  function updateLoaiDanhMuc($id,$name,$hide_show){
    $hide_show_con=0;
    if($hide_show=='on'){
      $hide_show_con=1;
    }
    return $this->select("UPDATE `loaidanhmuc`
    SET ten_loai = '$name',hide_show=$hide_show_con Where id_loai='$id'"); 
  }
}

?>