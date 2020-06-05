<?php
include_once("Model/loaiDanhMuc.php");
include_once("Model/danhMucBaiViet.php");
include_once("Model/baiViet.php");
class Controller {
     public function DanhSachCtroller($page,$danhmuc,$idloai,$idbaiviet){
      $danhMucBaiViet= new danhMucBaiViet();
      $baiViet= new baiViet();      
      $loaiDanhMuc=new loaiDanhMuc();
      $loaiDM=$loaiDanhMuc->getAll();
     if($danhmuc==''){
      $listDanhMuc=$danhMucBaiViet->GetListByIdFK($idloai);
      include 'Views/danhsachdanhmuc.php';
     }else if($idbaiviet==''){

     $listBaiviet=$baiViet->getBaiVietByDanhMuc($danhmuc); 
     include 'Views/danhsachbaiviet.php';
     }else if($idbaiviet!=""){
      $baiviet=$baiViet->getIdBaiViet($idbaiviet);
      include 'Views/baiviet.php';
     }
    
    }
    public function index()
    {
      $loaiDanhMuc=new loaiDanhMuc();
      $loaiDM=$loaiDanhMuc->getAll();
       $_SESSION["pagetitle"] = "Idea - Quảng Cáo Ý Tưởng";
    include 'Views/danhMucBaiViet.php';
    }
    public function lienhe()
    {
  
    include 'Views/lienhe.php';
    }
    public function pageEror($er){
      $danhMucBaiViet= new danhMucBaiViet();
      $baiViet= new baiViet();      
      $loaiDanhMuc=new loaiDanhMuc();
      $loaiDM=$loaiDanhMuc->getAll();
      include 'Views/404.php';
    }
   
	
   
}