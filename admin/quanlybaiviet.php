<?php
include_once('Model/baiViet.php');
include_once('Model/danhMucBaiViet.php');
$baiViet=new baiViet();
$listBaiViet=$baiViet->getAll();
$danhMucBaiViet =new danhMucBaiViet();
?>
        <div class="container">

    <h3 class="col">
        Danh Sách Bài Viết
    </h3>
    <form action="" method="post">

    </form>

    <table class="table table-striped table-bordered table-sm" style="width:100%" id='exampletbl3'>
        <thead>
            <tr>
                <th scope="col">
                    <button type="button" class="btn btn-outline-success" data-toggle="modal"
                        data-target="#exampleModal">
                        <ion-icon size="small" name="add-outline"></ion-icon>Menu lv1
                    </button></th>
                <th scope="col">Tên Bài Viết</th>
                <th scope="col">Hình Bài Viết</th>
                <th scope="col">Danh Mục Bài Viết</th>
                <th scope="col">Trạng Thái</th>
                <th scope="col">Thao Tác</th>


            </tr>
            
        </thead>
        <tbody>
        <?php
foreach ($listBaiViet as $key => $value) {
$danhMuc=$danhMucBaiViet->GetListById($value['id_danh_muc_bai_viet']);
$tendanhmuc='';
foreach ($danhMuc as $key1 => $value1) {
    $tendanhmuc=$value1['ten_danh_muc'];
}
$trangthai="Đang Chạy";
if($value['hide_show']!=0){
    $trangthai="Đang Ẩn";
}
   echo'<tr>
   <td></td>
            <td>'.$value['ten_bai_viet'].'</td>
            <td>'.$value['hinh_bai_viet'].'</td>
            <td>'.$value['ten_bai_viet'].'</td>
            <td>'. $tendanhmuc.'</td>
            <td>'.$trangthai.'</td>
        </tr>';
}
?>
        </tbody>
        
    </table>
    <textarea name="content" id="content" class="form-control ckeditor"></textarea>
    <script>
    CKEDITOR.replace('content', {
        height: 300,
        filebrowserUploadUrl: "upload.php"
    });
</script>

    </div>