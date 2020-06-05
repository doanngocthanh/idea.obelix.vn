<?php
include_once("Model/database.php");
class danhMucBaiViet extends DB {
  function getAll(){
    return $this->select("SELECT * FROM `danhmucbaiviet`");
  }
  function getIdLoai($id){
    return $this->select("SELECT * FROM `danhmucbaiviet` WHERE id_loai='$id'");
  }
  function insertLoaiDanhMuc($ten_loai,$hide_show,$menu_index){
    return $this->select("INSERT INTO `loai_danh_muc` (`ten_loai`, `hide_show`, `menu_index`) VALUES ('$ten_loai','$hide_show','$menu_index')"); 
  }
  public function GetListByIdFK($pk)
  {
    # load danh mục theo loại menu
    return $this->select("SELECT * FROM `danhmucbaiviet` where id_loai='$pk'");
  }


}

?>