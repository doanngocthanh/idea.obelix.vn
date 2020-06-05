<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $_SESSION["pagetitle"] ?></title>
    <?php
 $base_url='Views/layouts/';
 ?>

<body data-spy="scroll" data-target=".bs-docs-sidebar" style="background-image:url('assets/img/bg-integrity-1-1.png');">
<?php
include("Views/layouts/link.php");
include("Views/layouts/menu.php");
include("Views/layouts/header.php");
//include("Views/layouts/banner.php");
?>


    <div class="container">
      
      <?php foreach ($loaiDM as $item) {
                $danhMucBaiViet= new danhMucBaiViet();
                $danhmuc=$danhMucBaiViet->getIdLoai($item['id_loai']);
               echo'<section class ="customer-logos" style>';
                if(count($danhmuc)!=0){
                  echo '<div class="page-header">
                  <h3>'.$item['ten_loai'].'</h3>
                </div>';
                    echo ' <ul class="thumbnails bootstrap-examples customer-box">';
                    $i=0;
                    foreach($danhmuc as $itemDM){
                       $i++;
                      
                     echo '<li class="span4 slide">
                     <a class="thumbnail" href="index.php?page=danh-sach-bai-viet&danh-muc='.$itemDM['id_danh_muc'].'&id-loai='.$item['id_loai'].'&id-bai-viet=">
                       <img src="'.$base_url.'assets/img/'.$itemDM['hinh_danh_muc'].'" alt="'.$base_url.'assets/img/'.$itemDM['hinh_danh_muc'].'">
                     </a>
                     <h4>'.$itemDM['ten_danh_muc'].'</h4>
                    
                   </li>';
                      }

                    echo '</ul>';
                    if(count($danhmuc)>2){
                       echo'<p align="center"><a  href="index.php?page=danh-sach-bai-viet&danh-muc=&id-loai='.$item['id_loai'].'&id-bai-viet=">Xem Thêm</a></p>';
                    }
                    echo'</section>';
                }
                
            }
            ?>


        
      
       
    </div>






    <?php
include("Views/layouts/footer.php");
?>


</body>

</html>