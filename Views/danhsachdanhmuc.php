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
<div class="row"><section id="examples">

<?php 
if(count($listDanhMuc)>0){
    echo'<ul class="thumbnails bootstrap-examples">';
    foreach ($listDanhMuc as $danhmuc) {
        echo '<li class="span3">
          <a class="thumbnail" href="index.php?page=danh-sach-bai-viet&danh-muc='.$danhmuc['id_danh_muc'].'&id-loai='.$danhmuc['id_loai'].'&id-bai-viet=">
          <img src="'.$base_url.'assets/img/'.$danhmuc['hinh_danh_muc'].'" alt="'.$base_url.'assets/img/'.$danhmuc['hinh_danh_muc'].'">
          </a>
          <h4>'.$danhmuc['ten_danh_muc'].'</h4>
          
        </li>
      ';
        
    }
    echo'</ul>';
}else{
    $controller = new Controller();
    $controller->pageEror("Không tìm thấy danh mục này!");
}


?>

</div>
</div>


<?php include("Views/layouts/footer.php");?>
</body>

</html>
