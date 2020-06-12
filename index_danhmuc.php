<div class="container">
  <h3 class="pb-3 mb-4 font-italic border-bottom">
    <a>Trang Chủ</a>
  </h3>

  <?php
  foreach ($listLoaiDanhMuc as $item) {
    $danhMucBaiViet = new danhMucBaiViet();
    $danhmuc = $danhMucBaiViet->getIdLoaiClient($item['id_loai']);
    $TEXT = '';

    if (count($danhmuc) != 0) {

      if (count($danhmuc)==1) {
        
      }else{
        
      //start div slick =>css and js config in js/js.js 
      $TEXT .= '<div class="slick">';
      foreach ($danhmuc as $itemDM) {
        $baiviet = new baiViet();
        $listbaiviet = $baiviet->getBaiVietByDanhMucClient($itemDM['id_danh_muc']);
        if (count($listbaiviet) == 1) {
          $idbaiviet = '';
          foreach ($listbaiviet as $key => $value) {
            $idbaiviet = $value['id_bai_viet'];
          }
          $TEXT .= '<div>
            <div class="cldiv2">
              <a href="index.php?danh-muc=' . $itemDM['id_danh_muc'] . '&id-loai=' . $item['id_loai'] . '&id-bai-viet=' . $idbaiviet . '"> <img class="img-slick" style="max-height: 170px;" src="img/' . $itemDM['hinh_danh_muc'] . '"/> 
               <h5>' . $itemDM['ten_danh_muc'] . '</h5></a>
            </div>
      </div>';
        } else {
          $TEXT .= '<div>
            <div class="cldiv2">
              <a href="index.php?danh-muc=' . $itemDM['id_danh_muc'] . '&id-loai=' . $item['id_loai'] . '&id-bai-viet="> <img class="img-slick" style="max-height: 170px;" src="img/' . $itemDM['hinh_danh_muc'] . '"/> 
               <h5>' . $itemDM['ten_danh_muc'] . '</h5></a>
            </div>
      </div>';
        }
      }
      $TEXT .= '</div>';
      //end div slick

      echo '
        <div class="col">
          <div class="card flex-md-row mb-4 box-shadow h-md-250">
            <div class="card-body d-flex flex-column align-items-start">
         
              <h3 class="mb-0">
                <a class="text-dark" >' . $item['ten_loai'] . '</a>
              </h3>
            
              <p class="card-text mb-auto">' . $item['mo_ta'] . '</p>
             
           
            </div>
            <img class="card-img-right flex-auto d-none d-md-block" src="img/' . $item['img'] . '"  style="width: 200px; height: 250px;">
          </div>
          <div class="card-text mb-auto">
          ' . $TEXT . '
          <button class="button"><span><a style="color:white" href="index.php?danh-muc=&id-loai=' . $item['id_loai'] . '&id-bai-viet="> Xem Tất Cả </a></span></button>
          </div>
        </div>
        ';
    }
  }
}
  echo '<script>document.title = "Idea Advertising.Print";</script>';
  


  ?>
</div>