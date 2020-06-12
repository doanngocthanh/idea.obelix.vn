<?php
include_once("Model/database.php");
class loaiDanhMuc extends DB {
  function getAll(){
    return $this->select("SELECT * FROM `loaidanhmuc` order by menu_index ASC");
  }
  function getId($id){
    return $this->select("SELECT * FROM `loaidanhmuc` WHERE id_loai='$id'");
  }
  
  function insertLoaiDanhMuc($id,$ten_loai,$hide_show,$mota){
    $hide_show_con=0;
    if($hide_show=='on'){
      $hide_show_con=1;
    }
    if ($_FILES['txtFile']['error'] > 0) {
      return $this->select("INSERT INTO `loaidanhmuc` (`id_loai`,`ten_loai`, `hide_show`,`mo_ta`) VALUES ('$id','$ten_loai','$hide_show_con','$mota')"); 
    }else{
      move_uploaded_file($_FILES['fileUpload']['tmp_name'], 'img/'. $_FILES['fileUpload']['name']); 
      $img=$_FILES['fileUpload']['name'];
      return $this->select("INSERT INTO `loaidanhmuc` (`id_loai`,`ten_loai`, `hide_show`,`mo_ta`,`img`) VALUES ('$id','$ten_loai','$hide_show_con','$mota','$img')"); 

    }

  }
  function deleteLoaiDanhMuc($id){
    return $this->select("DELETE FROM `loaidanhmuc`
    WHERE id_loai = '$id'"); 
  }
  function updateLoaiDanhMuc($id,$name,$hide_show,$vitri,$mota){
    $hide_show_con=0;
    if($hide_show=='on'){
      $hide_show_con=1;
    }
    if ($_FILES['txtFile']['error'] > 0) {
      return $this->select("UPDATE `loaidanhmuc` SET ten_loai = '$name',hide_show=$hide_show_con , menu_index=$vitri , mo_ta='$mota' Where id_loai='$id'"); 

    }else{
      move_uploaded_file($_FILES['fileUpload']['tmp_name'], 'img/'. $_FILES['fileUpload']['name']); 
      $img=$_FILES['fileUpload']['name'];
      return $this->select("UPDATE `loaidanhmuc` SET ten_loai = '$name',hide_show=$hide_show_con , menu_index=$vitri , mo_ta='$mota'  , img='$img' Where id_loai='$id'"); 
      
    }
  }
}

?>