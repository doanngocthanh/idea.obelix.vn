
      <div class="container">
      <h3 class="pb-3 mb-4 font-italic border-bottom">
        <a href="index.php?">Trang Chủ / </a><a><?php 
        $loaiDanhMuc = new loaiDanhMuc();
        $baiViet = new baiViet();
     if(isset($_GET['search'])){
      echo 'Kết quả tìm kiếm';
     
     }else{
       $tendmuc=$loaiDanhMuc->getId($_GET['id-loai']);

       foreach ($tendmuc as $key => $value) {
           echo '<a>'.$value['ten_loai'].' /</a>';
       }
     }
        

        
        ?>
         <?php 
       if(isset($_GET['search'])){
      
       }else{
        echo '<a>';
        $danhmucct=  $danhMucBaiViet->GetListById($_GET['danh-muc']);
        $iddanhmuc='';
        foreach ($danhmucct as $key => $value) {
            echo $value['ten_danh_muc'] . '<script>document.title = "Idea Advertising.Print - '.$value['ten_danh_muc'].'";</script>';
            $iddanhmuc=$value['id_danh_muc'];
           
        }
        echo '</a>';
       }
       
        ?> 
      </h3>
    <div class="row mb-2">
<?php  
 if(isset($_GET['search'])){
  $listBaiViet = $baiviet->Search($_GET['search']);
  if(count($listBaiViet)!=0){
    foreach ($listBaiViet as $key => $value) {
        echo '
        <div class="col-md-6">
              <div class="card flex-md-row mb-4 box-shadow h-md-250">
                <div class="card-body d-flex flex-column align-items-start">
                  <h3 class="mb-0">
                    <a class="text-dark" href="index.php?danh-muc='.$value['id_danh_muc_bai_viet'].'&id-loai=&id-bai-viet='.$value['id_bai_viet'].'">'.$value['ten_bai_viet'].'</a>
                  </h3>
                 
                  <p class="card-text mb-auto">'.$value['mo_ta_bai_viet'].'</p>
                  <a  href="index.php?danh-muc='.$value['id_danh_muc_bai_viet'].'&id-loai=&id-bai-viet='.$value['id_bai_viet'].'">Chi Tiết</a>
                </div>
                <img class="card-img-right flex-auto d-none d-md-block"  style="width: 200px; height: 250px;" src="img/'.$value['hinh_bai_viet'].'"/>
              </div>
            </div>';
    }
    }
}else{
  $listBaiViet=$baiViet->getBaiVietByDanhMuc($iddanhmuc); 
  if(count($listBaiViet)!=0){
    foreach ($listBaiViet as $key => $value) {
        echo '
        <div class="col-md-6">
              <div class="card flex-md-row mb-4 box-shadow h-md-250">
                <div class="card-body d-flex flex-column align-items-start">
                  <h3 class="mb-0">
                    <a class="text-dark" href="index.php?danh-muc='.$iddanhmuc.'&id-loai='.$_GET['id-loai'].'&id-bai-viet='.$value['id_bai_viet'].'">'.$value['ten_bai_viet'].'</a>
                  </h3>
                 
                  <p class="card-text mb-auto">'.$value['mo_ta_bai_viet'].'</p>
                  <a href="index.php?danh-muc='.$iddanhmuc.'&id-loai='.$_GET['id-loai'].'&id-bai-viet='.$value['id_bai_viet'].'">Chi Tiết</a>
                </div>
                <img class="card-img-right flex-auto d-none d-md-block"  style="width: 200px; height: 250px;" src="img/'.$value['hinh_bai_viet'].'"/>
              </div>
            </div>';
    }
    } 
}


?>

    </div>
</div>