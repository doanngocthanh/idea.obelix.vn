<!-- ngocthanhdoan-loadmenu  START-->


<div class="container custummerdiv" id="Pcsc">


    <div class="navbarctm">
        <div class="dropdownctm">
            <button class="dropbtn">
            <a href="?index.php">Trang Chủ</a>
            </button>
            <div class="dropdownctm-content">
            </div>
        </div>

     
        <?php foreach ($listLoaiDanhMuc as $item) {
            if($item['hide_show']!=0){

            }else{
                $danhMucBaiViet = new danhMucBaiViet();
                $danhmuc = $danhMucBaiViet->getIdLoai($item['id_loai']);
                if (count($danhmuc) != 0) {
                    echo '  <div class="dropdownctm">
                                <button class="dropbtn">
                                   <a href="index.php?danh-muc=&id-loai=' . $item['id_loai'] . '&id-bai-viet="> ' . $item['ten_loai'] . '<i class="fa fa-caret-down"></i></a>
                                </button>
                                <div class="dropdownctm-content">';
                    foreach ($danhmuc as $itemDM) {
                        echo '<a href="?danh-muc=' . $itemDM['id_danh_muc'] . '&id-loai=' . $item['id_loai'] . '&id-bai-viet=">' . $itemDM['ten_danh_muc'] . '</a>';
                    }
                    echo '</div></div>';
                }
                }
            }
        ?>
    </div>
</div>
<!-- ngocthanhdoan-loadmenu  END-->
<div id="Mbsc">
<input type="checkbox" id="menu-toggle" />
<label for="menu-toggle" class="menu-icon"><i class="fa fa-bars"></i></label>
<div class="slideout-sidebar"  style="z-index: 999;">
  <ul>
    <li><a href="?index.php">Trang Chủ</a></li>
    <?php foreach ($listLoaiDanhMuc as $item) {
            if($item['hide_show']!=0){

            }else{
                $danhMucBaiViet = new danhMucBaiViet();
                $danhmuc = $danhMucBaiViet->getIdLoai($item['id_loai']);
                if (count($danhmuc) != 0) {
                    echo '<li>    <a href="index.php?danh-muc=&id-loai=' . $item['id_loai'] . '&id-bai-viet="> ' . $item['ten_loai'] . '</a></li>';
                }
            }
    
            }
        ?>
  </ul>
</div>
</div>