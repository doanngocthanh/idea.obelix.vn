<?php
include_once("Model/database.php");
class baiViet extends DB
{
  function getAll()
  {
    return $this->select("SELECT * FROM `baiviet`");
  }
  function getAllClient()
  {
    return $this->select("SELECT * FROM `baiviet` where hide_show=0");
  }

  function getIdBaiViet($id)
  {
    return $this->select("SELECT * FROM `baiviet` WHERE id_bai_viet='$id'");
  }

  function Search($search)
  {
    return $this->select("SELECT * FROM `baiviet` WHERE ten_bai_viet LIKE '%$search%' and hide_show=0");
  }

  function getBaiVietByDanhMucClient($id_danhmuc){
    return $this->select("SELECT * FROM `baiviet` WHERE id_danh_muc_bai_viet='$id_danhmuc' and hide_show=0");
  }
  

  function getBaiVietByDanhMuc($id_danhmuc)
  {
    return $this->select("SELECT * FROM `baiviet` WHERE id_danh_muc_bai_viet='$id_danhmuc'");
  }
  function insertBaiViet($ten_bai_viet, $noi_dung_bai_viet, $mo_ta_bai_viet, $id_danh_muc_bai_viet, $hide_show)
  {
    $id_bai_viet = utf8tourl(utf8convert($ten_bai_viet));
    $img = '';
    $thoigian = date('Y/m/d H:m:s');
    if ($_FILES['txtFile']['error'] > 0) {
      $img = '';
    } else {

      move_uploaded_file($_FILES['txtFile']['tmp_name'], 'img/' . $_FILES['txtFile']['name']);
      $img = $_FILES['txtFile']['name'];
      return $this->select("INSERT INTO `baiviet` (`id_bai_viet`, `ten_bai_viet`, `noi_dung_bai_viet`,`mo_ta_bai_viet`,`hinh_bai_viet`,`id_danh_muc_bai_viet`,`thoi_gian_dang_bai`,`ten_nguoi_dang`,`hide_show`) VALUES ('$id_bai_viet','$ten_bai_viet', '$noi_dung_bai_viet','$mo_ta_bai_viet','$img','$id_danh_muc_bai_viet','$thoigian','admin','$hide_show')");
    }
  }

  public function deleteBaiviet($id)
  {
    # code...
    return $this->select("DELETE FROM `baiviet` where `id_bai_viet`='$id'");
  }
  public function updateBaiViet($id_bai_viet,$ten_bai_viet, $noi_dung_bai_viet, $mo_ta_bai_viet, $id_danh_muc_bai_viet, $hide_show)
  {
  $id=trim($id_bai_viet," ");
   
      $thoigian = date('Y/m/d H:m:s');
      if ($_FILES['txtFile']['error'] > 0) {
        return $this->select("UPDATE baiviet SET ten_bai_viet='$ten_bai_viet', noi_dung_bai_viet='$noi_dung_bai_viet',mo_ta_bai_viet='$mo_ta_bai_viet',id_danh_muc_bai_viet='$id_danh_muc_bai_viet',thoi_gian_dang_bai='$thoigian',hide_show='$hide_show' WHERE `id_bai_viet`='$id'");  
      }else{
        move_uploaded_file($_FILES['txtFile']['tmp_name'], 'img/' . $_FILES['txtFile']['name']);
        $img = $_FILES['txtFile']['name'];
        return $this->select("UPDATE `baiviet` SET `ten_bai_viet`='$ten_bai_viet', `noi_dung_bai_viet`='$noi_dung_bai_viet',`mo_ta_bai_viet`='$mo_ta_bai_viet',`id_danh_muc_bai_viet`='$id_danh_muc_bai_viet',`thoi_gian_dang_bai`='$thoigian',`hinh_bai_viet`='$img',`hide_show`='$hide_show' WHERE `id_bai_viet`='$id'");  
      
      } 
   
    # code...
  }

  public function GetListByIdFK($pk)
  {
    # load danh mục theo loại menu
    return $this->select("SELECT * FROM `danhmucbaiviet` where id_loai='$pk'");
  }



  function utf8convert($str)
  {
    if (!$str) return false;

    $utf8 = array(

      'a' => 'á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ|Á|À|Ả|Ã|Ạ|Ă|Ắ|Ặ|Ằ|Ẳ|Ẵ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',

      'd' => 'đ|Đ',

      'e' => 'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ|É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',

      'i' => 'í|ì|ỉ|ĩ|ị|Í|Ì|Ỉ|Ĩ|Ị',

      'o' => 'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ|Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',

      'u' => 'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự|Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',

      'y' => 'ý|ỳ|ỷ|ỹ|ỵ|Ý|Ỳ|Ỷ|Ỹ|Ỵ',
    );

    foreach ($utf8 as $ascii => $uni) $str = preg_replace("/($uni)/i", $ascii, $str);
    return $str;
  }
  function utf8tourl($text)
  {
    $text = strtolower(utf8convert($text));
    $text = str_replace("ß", "ss", $text);
    $text = str_replace("%", "", $text);
    $text = preg_replace("/[^_a-zA-Z0-9 -] /", "", $text);
    $text = str_replace(array('%20', ' '), '-', $text);
    $text = str_replace("----", "-", $text);
    $text = str_replace("---", "-", $text);
    $text = str_replace("--", "-", $text);
    return $text;
  }
}
