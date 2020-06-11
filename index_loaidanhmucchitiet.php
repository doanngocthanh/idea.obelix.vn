
      <div class="container">
      <h3 class="pb-3 mb-4 font-italic border-bottom">
        <a href="index.php?">Trang Chủ / </a><a><?php 
        $loaiDanhMuc = new loaiDanhMuc();
        $tendmuc=$loaiDanhMuc->getId($_GET['id-loai']);
        foreach ($tendmuc as $key => $value) {
            echo $value['ten_loai'];
            echo '<script>document.title = "Idea Advertising.Print - '.$value['ten_loai'].'";</script>';

        }
        ?></a>
      </h3>
    <div class="row mb-2">
<?php  $listdanhmuc=$danhMucBaiViet->GetListByIdFK($_GET['id-loai']);  
if(count($listdanhmuc)!=0){
foreach ($listdanhmuc as $key => $value) {
    echo '
    <div class="col-md-6">
          <div class="card flex-md-row mb-4 box-shadow h-md-250">
            <div class="card-body d-flex flex-column align-items-start">
              <h3 class="mb-0">
                <a class="text-dark" href="index.php?danh-muc='.$value['id_danh_muc'].'&id-loai='.$_GET['id-loai'].'&id-bai-viet=">'.$value['ten_danh_muc'].'</a>
              </h3>
              <div class="mb-1 text-muted">Lượt Xem: '.$value['so_luong_xem'].'</div>
              <p class="card-text mb-auto">'.$value['mo_ta_danh_muc'].'</p>
              <a href="index.php?danh-muc='.$value['id_danh_muc'].'&id-loai='.$_GET['id-loai'].'&id-bai-viet=">Chi Tiết</a>
            </div>
            <img class="card-img-right flex-auto d-none d-md-block"  style="width: 200px; height: 250px;" src="img/'.$value['hinh_danh_muc'].'"/>
          </div>
        </div>';
}
}
?>

    </div>
</div>