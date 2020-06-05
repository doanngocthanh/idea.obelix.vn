<?php
try {
  include_once("dashboard.php");
$target_dir = '../assets/img/';
if(isset($_POST['add'])){

   if($_POST['txtName']==''){
    echo '<div class="container alert alert-warning alert-dismissible fade show fixed-top" role="alert">
    <strong>Có điềm rồi ông giáo ạ!</strong> Ông giáo phải cho dữ liệu vào thì web mới có nội dung chứ!
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>';
   }else{
    if ($_FILES['fileUpload']['error'] > 0){
      echo '<div class="container alert alert-warning alert-dismissible fade show fixed-top" role="alert">
      <strong>Có điềm rồi ông giáo ạ!</strong> Ông giáo phải cho hình vào nữa chứ.
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>';
    }else {
        $new_str = utf8tourl(utf8convert($_POST['txtName']));

        move_uploaded_file($_FILES['fileUpload']['tmp_name'], $target_dir. $_FILES['fileUpload']['name']);

        $danhMucBaiViet->insertDanhMucBaiViet($new_str,$_POST['txtName'],$_FILES['fileUpload']['name'],$_POST['cboloai']);
        if(isset($danhMucBaiViet)){
        
    }else{
        echo '<div  class="container alert alert-warning alert-dismissible fade show fixed-top" role="alert" data-dismiss="alert">
  <strong>Có điềm rồi ông giáo ạ!</strong> Có vẻ đã có lỗi nhỏ gì đó xảy ra ở đây, ông giáo hãy thử lại sau nhé :((.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
    }}
   }
    

}elseif(isset($_POST['btActionMenu2'])){
  if ($_FILES['fileUpload']['error'] > 0){
    echo '<div class="container alert alert-warning alert-dismissible fade show fixed-top" role="alert">
    <strong>Có điềm rồi ông giáo ạ!</strong> Ông giáo phải cho hình vào nữa chứ.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>';
  }else {
      

      move_uploaded_file($_FILES['fileUpload']['tmp_name'], $target_dir. $_FILES['fileUpload']['name']);

      $danhMucBaiViet->updateIMGDanhMucBaiViet($_POST['txtId'],$_FILES['fileUpload']['name']);
      if(isset($danhMucBaiViet)){
        echo'<div class="container alert alert-success alert-dismissible fade show fixed-top" role="alert">
        <strong>Thành Công!</strong> Ảnh đã được cập nhật.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <script>document.getElementById("qlmn").click();</script>
      ';


}else{
    echo '<div  class="container alert alert-warning alert-dismissible fade show fixed-top" role="alert" data-dismiss="alert">
<strong>Có điềm rồi ông giáo ạ!</strong> Có vẻ đã có lỗi nhỏ gì đó xảy ra ở đây, ông giáo hãy thử lại sau nhé :((.
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>';
}
    }
}

} catch (\Throwable $th) {
 echo $th;
}
  
?>