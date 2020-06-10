<div class="container">
    <div class="row">
<?php 
$baiviet=new baiViet();
  $loadbaiviet = $baiviet->getIdBaiViet($_GET['id-bai-viet']);
  if(isset($loadbaiviet)){
      foreach ($loadbaiviet as $key => $value) {
        echo'<h3 class="pb-3 mb-4 font-italic border-bottom">
        <a href="index.php?">Trang Chủ / </a>'.$value['ten_bai_viet'].'
      </h3>
      <div class="blog-post">
      '.$value['noi_dung_bai_viet'].'
      </div>';
      $_SESSION["title"]=$value['ten_bai_viet'];
      }
  }
?>
</div>
</div>