<?php

use InstagramScraper\Model\Location;

include_once("Model/database.php");?>
<!doctype html>
<html lang="vi">

<head>

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title id="title">Idea Advertising.Print </title>
    <?php include "includes/links.php" ?>
</head>
<?php
include_once("Model/baiViet.php");
include_once("Model/danhMucBaiViet.php");
include_once("Model/loaiDanhMuc.php");
include_once("Model/nguoiDung.php");
$baiViet = new baiViet();
$danhMucBaiViet = new danhMucBaiViet();
$loaiDanhMuc = new loaiDanhMuc();
$listLoaiDanhMuc = $loaiDanhMuc->getAll();
include "includes/header.php";
?>

<body>

    <?php
    if (isset($_GET['danh-muc']) || isset($_GET['id-loai']) || isset($_GET['id-bai-viet'])) {
        if (isset($_GET['danh-muc']) && isset($_GET['id-bai-viet'])) {
            $baiviet = new baiViet();
            $listbaiviet = $baiviet->getBaiVietByDanhMucClient($_GET['danh-muc']);
           if($_GET['danh-muc']==''){
               include("index_loaidanhmucchitiet.php");
           }else{
            if ($_GET['id-bai-viet'] == "") {
                $baiviet = new baiViet();
                $listbaiviet = $baiviet->getBaiVietByDanhMucClient($_GET['danh-muc']);
                if (count($listbaiviet) == 0) {
                    include("404.php");
                } else if (count($listbaiviet) == 1) {
                    include("index_baiviet.php");
                } else  if (count($listbaiviet) >= 2){
                    include("index_listbaiviet.php");
              
                }
            }
            if($_GET['id-bai-viet']!=""){
                include("index_baiviet.php"); 
            }
            
           }
            // if ($_GET['id-bai-viet'] == "") {
            //     $baiviet = new baiViet();
            //     $listbaiviet = $baiviet->getBaiVietByDanhMuc($_GET['danh-muc']);
            //     if (count($listbaiviet) == 0) {
            //         include("404.php");
            //     } else if (count($listbaiviet) == 1) {
            //         include("index_baiviet.php");
            //     } else {
            //         include("index_danhmucchitiet.php");
            //     }
            // } else {
            //     include("index_baiviet.php");
            // }
        }
    }elseif(isset($_GET['search'])){
        $baiviet = new baiViet();
        $listbaiviet = $baiviet->Search($_GET['search']);
        if(count($listbaiviet)>0){
            include("index_listbaiviet.php");
        }else{
            include('404.php');
        }
    } else {
        include("index_danhmuc.php");
    }

    ?>
</body>
<?php include "includes/footer.php"; ?>
<script>
$(window).resize(function() {
    var width = $(window).width();
    console.log(width);
    if (width <= 768) {
        document.getElementById('site-logo').src = 'img/logo-bg.jpg';
        document.getElementById('Pcsc').hidden==true;
        document.getElementById('Mbsc').hidden==false;

    } else {
        document.getElementById('site-logo').src = 'img/logo-idea.svg';
        document.getElementById('Mbsc').hidden==true;
        document.getElementById('Pcsc').hidden==false;
    Mbsc
    }
});

</script>

</html>