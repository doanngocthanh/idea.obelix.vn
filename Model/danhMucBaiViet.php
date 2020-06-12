<?php
include_once("Model/database.php");
class danhMucBaiViet extends DB {
  function getAll(){
    return $this->select("SELECT * FROM `danhmucbaiviet` order by so_luong_xem DESC");
  }
  function getIdLoai($id){
   
    return $this->select("SELECT * FROM `danhmucbaiviet` WHERE id_loai='$id' order by so_luong_xem DESC");
  }
  function getIdLoaiClient($id){
   
    return $this->select("SELECT * FROM `danhmucbaiviet` WHERE id_loai='$id' order by so_luong_xem DESC");
  }
  function deleteDanhMucBaiViet($id){
    return $this->select("DELETE FROM `danhmucbaiviet`
    WHERE id_danh_muc = '$id'"); 
  }

  function insertDanhMucBaiViet($id,$ten,$img,$idloai){
    $datetoday= date('Y/m/d');
    //echo $datetoday;
    //echo "INSERT INTO `danhmucbaiviet` (`id_danh_muc`, `ten_danh_muc`, `hinh_danh_muc`,`ngay_them`) VALUES ('$id','$ten','$img',$datetoday";
    return $this->select("INSERT INTO `danhmucbaiviet` (`id_danh_muc`, `ten_danh_muc`, `hinh_danh_muc`,`id_loai`,`ngay_them`) VALUES ('$id','$ten','$img','$idloai',$datetoday)");

  }
  function updateIMGDanhMucBaiViet($id,$img){
    return $this->select("UPDATE `danhmucbaiviet`
    SET hinh_danh_muc = '$img' Where id_danh_muc='$id'"); 
  }
  function updateDanhMucBaiViet($id,$name,$loai){
    return $this->select("UPDATE `danhmucbaiviet`
    SET ten_danh_muc = '$name',id_loai='$loai' Where id_danh_muc='$id'"); 
  }
 public function GetListByIdFK($pk)
  {
    # load danh mục theo loại menu
    return $this->select("SELECT * FROM `danhmucbaiviet` where id_loai='$pk'");
  }
  public function GetListById($iddanhmuc)
  {
    # load danh mục theo loại menu
    return $this->select("SELECT * FROM `danhmucbaiviet` where id_danh_muc='$iddanhmuc'");
  }

  public function UpdateSoLuongXem($id)
  {
    # load danh mục theo loại menu
    return $this->select("UPDATE `danhmucbaiviet` set so_luong_xem = so_luong_xem +1 where id_danh_muc='$id'");
  }

}

?>