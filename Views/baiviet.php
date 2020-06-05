
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
<div class="row">
<section id="examples">

<?php 
if(count($baiviet)>0){
    
    foreach ($baiviet as $bv) {
    echo '<div class="page-header">
    <h1>'.$bv['ten_bai_viet'].'</h1>
  </div>'.$bv['noi_dung_bai_viet'];
    }
} 
 else{
    $controller = new Controller();
    $controller->pageEror("Bài viết này chưa có nội dung.");
}


?>

</div>
</div>


<?php include("Views/layouts/footer.php");?>
</body>

</html>
