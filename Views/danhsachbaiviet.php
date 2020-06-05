
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
if(count($listBaiviet)>0){
    echo'<ul class="thumbnails bootstrap-examples">';
    foreach ($listBaiviet as $bv) {
        echo '<li class="span3">
          <a class="thumbnail" href="index.php?page=danh-sach-bai-viet&danh-muc='.$bv['id_danh_muc_bai_viet'].'&id-loai='.$idloai.'&id-bai-viet='.$bv['id_bai_viet'].'">
          <img src="'.$base_url.'assets/img/'.$bv['hinh_bai_viet'].'" alt="'.$base_url.'assets/img/'.$bv['hinh_bai_viet'].'">
          </a>
          <h4>'.$bv['ten_bai_viet'].'</h4>
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
