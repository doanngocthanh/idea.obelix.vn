<div class="container">
<?php 
$baiviet=new baiViet();
$danhmuc=new danhMucBaiViet();
if(isset($_GET['id-bai-viet'])){
  
}
  $loadbaiviet = $baiviet->getIdBaiViet($_GET['id-bai-viet']);
 
  if(count($loadbaiviet)==0){
    $loadbaiviet = $baiviet->getBaiVietByDanhMuc($_GET['danh-muc']);
  }
  if(isset($loadbaiviet)){
    $listdanhmuc=$danhmuc->GetListById($_GET['danh-muc']);
    

    $textdanhmuc='';
    foreach ($listdanhmuc as $key => $value) {
      $textdanhmuc=$value['ten_danh_muc'];
      $danhmuc->UpdateSoLuongXem($_GET['danh-muc']);
    }
      foreach ($loadbaiviet as $key => $value) {
        
        if($value['hide_show']==0){
          echo'<h3 class="pb-3 mb-4 font-italic border-bottom">
          <a href="index.php?">Trang Chủ / <a>'.$textdanhmuc.'</a> / </a>'.$value['ten_bai_viet'].'
          </h3>
          <div class="row"><div class="col">'
          .$value['noi_dung_bai_viet'].'</div> 
          </div>';
          echo'<script>document.title = "Idea Advertising.Print - '.$value['ten_bai_viet'].'";</script>';
        }
      
      }
  }
?>

</div>