<?php
include_once('Model/baiViet.php');
include_once('Model/danhMucBaiViet.php');
$baiViet = new baiViet();
$listBaiViet = $baiViet->getAll();
$danhMucBaiViet = new danhMucBaiViet();
$listdmbv = $danhMucBaiViet->getAll();
$tieude = '';
$mota = '';
$danhmucbv = '';
$noidungbv = '';
if (isset($_POST['btnquanlybaiviet'])) {
    if ($_POST['btnquanlybaiviet'] == "add") {
        if (isset($_POST['txtTieuDe'])) {
            $tieude = $_POST['txtTieuDe'];
        }
        if (isset($_POST['txtMoTa'])) {
            $mota = $_POST['txtMoTa'];
        }
        if (isset($_POST['txtNoiDung'])) {
            $noidungbv = $_POST['txtNoiDung'];
        }

        if ($tieude == '' || $mota = '' || $noidungbv = '') {
            echo '
       <div class="container alert alert-warning alert-dismissible fade show" role="alert">
       <strong>Bạn cần điền đầy đủ thông tin!</strong>
       <button type="button" class="close" data-dismiss="alert" aria-label="Close">
         <span aria-hidden="true">&times;</span>
       </button>
     </div>';
        } else {
            $checked=0;
            if(isset($_POST['txtHide_show'])){
            $checked=1;
            }
            $check = $baiViet->insertBaiViet($tieude, $_POST['txtNoiDung'], $_POST['txtMoTa'], $_POST['cboDanhMuc'],$checked);
            if (isset($check)) {
                header("location:?btAction=qlbv");
            } else {
                echo '<div class="container alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Vui lòng cập nhập hình ảnh mới!</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>';
            }
        }
    } else if ($_POST['btnquanlybaiviet'] == "update") {
        $checked=0;
        if(isset($_POST['txtHide_show'])){
        $checked=1;
        }
        $check = $baiViet->updateBaiViet($_POST['txtId'],$_POST['txtTieuDe'], $_POST['txtNoiDung'], $_POST['txtMoTa'], $_POST['cboDanhMuc'],$checked);
        if (isset($check)) {
            header("admin_index.php?btAction=qlbv&edit=".$_POST['txtId']);
            echo'<div class="container alert alert-success alert-dismissible fade show" role="alert">
            <strong>Đã lưu bài Viết!</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>';
        } else {
            header("admin_index.php?btAction=qlbv&edit=".$_POST['txtId']);
            echo '<div class="container alert alert-warning alert-dismissible fade show" role="alert">
    <strong>Có lỗi xãy ra!</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>';
        }
    }
}
if (isset($_GET['edit'])) {
    $listbaiviet = $baiViet->getIdBaiViet($_GET['edit']);
    $id='';
    $tieude = '';
    $mota = '';
    $danhmucbv = '';
    $noidungbv = '';
    $img = '';
    $hide_show='';
    foreach ($listbaiviet as $key => $value) {
        # code...
        $id=$value['id_bai_viet'];
        $tieude = $value['ten_bai_viet'];
        $mota = $value['mo_ta_bai_viet'];
        $noidungbv = $value['noi_dung_bai_viet'];
        $danhmucbv = $value['id_danh_muc_bai_viet'];
        $img = $value['hinh_bai_viet'];
        $hide_show=$value['hide_show'];
    }
} else if (isset($_GET['delete'])) {
    $baiViet->deleteBaiviet($_GET['delete']);
}

?>
<div class="container">
    <h3 class="col">
        Thêm Bài Viết Mới
    </h3>
    <form method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label>Tiêu Đề Bài Viết</label>
            <input type="text" hidden name="txtId" value="
            <?php if (isset($id)) {
                                            echo $id;
                                        } ?>
            "/>
            <input type="text" value="<?php if (isset($tieude)) {
                                            echo $tieude;
                                        } ?>" name="txtTieuDe" class="form-control">
        </div>
        <div class="form-group">
            <label>Mô Tả Bài Viết</label>
            <textarea type="text" class="form-control" name="txtMoTa"><?php if (isset($mota)) {
                                                echo $mota;
                                            } ?> </textarea>
        </div>
        <div class="form-group">
        <div class="custom-control custom-switch">
                <input type="checkbox" name="txtHide_show"
                <?php 
                if (isset($hide_show)) {
                    if($hide_show==1){
                        echo'checked';
                    }
                }
                ?>
                class="custom-control-input" id="customSwitch1">
                <label class="custom-control-label" for="customSwitch1">Ẩn Bài Viết</label>
            </div>
        </div>
      

            <div class="form-group">
                <label>Hình Bài Viết</label>

                <input type='file' name="txtFile" class="form-control" onchange="loadImg(this)" require />
                <img class="showimage" style=" max-width: 150px;max-height:150px;" src="<?php try {
                    if(isset($img)==""){
                        echo "img/placeholder.jpg";
                    }else{
                        echo "img/" . $img;
                    }
                                                                                           
                                                                                        } catch (\Throwable $th) {
                                                                                            echo $th;
                                                                                        } ?>" alt="your image" require />

            </div>
            <div class="form-group">
                <label>Danh Mục Bài Viết</label>
                <select name="cboDanhMuc" class="custom-select">

                    <?php foreach ($listdmbv as $key => $value) {

                        if ($danhmucbv != "") {
                            if ($danhmucbv == $value['id_danh_muc']) {
                                echo '<option selected value="' . $value['id_danh_muc'] . '">' . $value['ten_danh_muc'] . '</option>';
                            } else {
                                echo '<option value="' . $value['id_danh_muc'] . '">' . $value['ten_danh_muc'] . '</option>';
                            }
                        } else {
                            echo '<option value="' . $value['id_danh_muc'] . '">' . $value['ten_danh_muc'] . '</option>';
                        }
                    }
                    ?>

                </select>

            </div>
            <textarea id="content" class="form-control ckeditor" name="txtNoiDung">

            <?php
            try {
                echo $noidungbv;
            } catch (\Throwable $th) {
            }

            ?>
            </textarea>
            <button type="submit" name="btnquanlybaiviet" value="add" class="btn btn-outline-success">Thêm</button>
            <button type="submit" name="btnquanlybaiviet" value="update" class="btn btn-outline-primary">Cập Nhập</button>

    </form>


    <h3 class="col">
        Danh Sách Bài Viết
    </h3>

    <table class="table" id='exampletbl3'>
        <thead>
            <tr>
                <th scope="col">Tên Bài Viết</th>
                <th scope="col">Danh Mục Bài Viết</th>
                <th scope="col">Trạng Thái</th>
                <th scope="col">Thao Tác</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($listBaiViet as $key => $value) {
                $danhMuc = $danhMucBaiViet->GetListById($value['id_danh_muc_bai_viet']);
                $tendanhmuc = '';
                foreach ($danhMuc as $key1 => $value1) {
                    $tendanhmuc = $value1['ten_danh_muc'];
                }
                $trangthai = "Đang Chạy";
                if ($value['hide_show'] != 0) {
                    $trangthai = "Đang Ẩn";
                }
                echo '<tr>
            <td>' . $value['ten_bai_viet'] . '</td>
            <td>' .  $tendanhmuc  . '</td>
            <td>' . $trangthai . '</td>
            <td>
            
            <a class="btn btn-default" href="?btAction=qlbv&edit=' . $value['id_bai_viet'] . '">Chỉnh Sửa</a>
            <a class="btn btn-default" href="?btAction=qlbv&delete=' . $value['id_bai_viet'] . '">Xóa</a>
            </td>
        </tr>';
            }
            ?>
        </tbody>

    </table>

    <script>
        CKEDITOR.replace('content', {
            filebrowserUploadUrl: "admin_upload.php",
        });

        function loadImg(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('.showimage')
                        .attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }

        function showImg(input) {

        }
    </script>

</div>