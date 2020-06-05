<div class="navbar navbar-fixed-top" style="background-image:url('<?php echo $base_url?>assets/img/bg-integrity-1-1.png') !important;">
    <div class="navbar-inner">
        <div class="container">
            <button  type="button" id="navbtn" class="btn btn-navbar"  style="position: fixed; right: 0; margin:0;z-index:8"  onclick="nav()">
         
            </button>
            <div class="nav-collapse collapse">
                
                <ul class="nav">
                    <li>
                        <a href="<?php echo $base_url?>">Trang Chủ</a>
                    </li>
                    <?php foreach ($loaiDM as $item) {
                $danhMucBaiViet= new danhMucBaiViet();
                $danhmuc=$danhMucBaiViet->getIdLoai($item['id_loai']);
                if(count($danhmuc)!=0){
                    echo '<li> <a href="index.php?page=danh-sach-bai-viet&danh-muc=&id-loai='.$item['id_loai'].'&id-bai-viet=">'.$item['ten_loai'].'</a><ul>';
                    echo '</ul></li>';
                }

                // if(count($danhmuc)!=0){
                //     echo '<li class="dropdown"> <a href="index.php?page=danh-muc-bai-viet&danh-muc=test" class="dropdown-toggle" data-toggle="dropdown">'.$item['ten_loai'].'<b class="caret"></b></a><ul class="dropdown-menu">';
                //     foreach($danhmuc as $itemDM){
                //         echo '<li><a href="index.php?page=danh-muc-bai-viet&danh-muc='.$itemDM['id_danh_muc'].'">'.$itemDM['ten_danh_muc'].'</a></li>';
                //         //echo json_encode($info);
                //       }
                //     echo '</ul></li>';
                // }else if($danhmuc==0){
                //     //echo " <li><a href='index.php?page=danhmucbaiviet?danhmuc=".$item['url']."'>".$item['ten_loai']."</a></li>";
                // }
                
            }
            ?>

                    <li class="">
                        <a href="./plus.html">Liên Hệ</a>
                    </li>
                    <li class="">
                        <a href="./javascript.html">Tuyển Dụng</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<nav class="w3-sidebar w3-bar-block w3-card w3-top w3-xlarge w3-animate-left" onclick="nav()" style="display:none;z-index:10;width:40%;min-width:250px;background-color:black;color:white" id="mySidebar">
<a class="w3-bar-item w3-button" href="<?php echo $base_url?>">Trang Chủ</a>
<?php foreach ($loaiDM as $item) {
                $danhMucBaiViet= new danhMucBaiViet();
                $danhmuc=$danhMucBaiViet->getIdLoai($item['id_loai']);
                if(count($danhmuc)!=0){ 
                    echo '<a class="w3-bar-item w3-button" href="index.php?page=danh-sach-bai-viet&danh-muc=&id-loai='.$item['id_loai'].'&id-bai-viet=">'.$item['ten_loai'].'</a>';
                }
            }
                
?>
  <a class="w3-bar-item w3-button" href="./plus.html">Liên Hệ</a>
  <a class="w3-bar-item w3-button" href="./plus.html">Tuyển Dụng</a>
</nav>