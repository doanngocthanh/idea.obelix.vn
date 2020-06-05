<?php
include_once("Model/database.php");
class baiViet extends DB {
  function getAll(){
    return $this->select("SELECT * FROM `baiviet`");
  }
  function getIdBaiViet($id){
    return $this->select("SELECT * FROM `baiviet` WHERE id_bai_viet='$id'");
  }
  function getBaiVietByDanhMuc($id_danhmuc){
    return $this->select("SELECT * FROM `baiviet` WHERE id_danh_muc_bai_viet='$id_danhmuc'");
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