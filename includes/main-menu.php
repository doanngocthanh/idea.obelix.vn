<!-- ngocthanhdoan-loadmenu  START-->
<div class="container custummerdiv">
    <div class="navbarctm">
        <div class="dropdownctm">
            <button class="dropbtn">
            <a href="?index.php">Trang Chủ</a>
            </button>
            <div class="dropdownctm-content">
            </div>
        </div>

     
        <?php foreach ($listLoaiDanhMuc as $item) {
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


        ?>
    </div>
</div>
<!-- ngocthanhdoan-loadmenu  END-->