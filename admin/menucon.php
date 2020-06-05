
<h3 class="col">
  Danh Sách Menu Cấp 2
</h3>
<table  class="table table-striped table-bordered table-sm" style="width:100%" id='exampletbl1'>
  <thead>
    <tr>
    <th scope="col"><button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#exampleModal2">
    <ion-icon size="small" name="add-outline"></ion-icon>Menu lv2
</button></th>
      <th scope="col">Tên Menu Cấp 2</th>
      <th scope="col">Hình</th>
      <th scope="col">Menu Cấp 1</th>
      <th scope="col">Lượt Click</th>
      <th scope="col">Thao Tác</th>
      
    </tr>
  </thead>
<tbody>
    
    <?php
    $url_this_page="http://".$_SERVER['SERVER_NAME'].dirname($_SERVER["REQUEST_URI"].'?').'/../assets/img';
    $u=0;
    foreach ($menucon as $key => $value) {
      $u++;
        $menucap1text='';
        $menucap1list= $loaiDanhMuc->getId($value['id_loai']);
        if(isset($menucap1list)){
            foreach ($menucap1list as $key1 => $value1) {
                $menucap1text=$value1['ten_loai'];
            }
        }
     echo'
     <tr>
     <td>'.$u.'</td>
     <td>'.$value["ten_danh_muc"].'</td>
     <td>
     <button class="btn btn-outline-dark"
     onclick="load3(\''.$value['id_danh_muc'].'\')"
     data-toggle="modal" data-target="#changeimg">Đổi Hình</button>
     <img style="width:150px" src="'.$url_this_page.'/'.$value["hinh_danh_muc"].'" alt="'.$url_this_page.'/'.$value["hinh_danh_muc"].'" class="img-thumbnail"/></td>
     <td>'.$menucap1text.'</td>
     <td>'.$value["so_luong_xem"].'</td>
     <td>
     <button class="btn btn-outline-primary" onclick="loadIdUpDateMenu(
      \''.$value['id_danh_muc'].'\',
      \''.$value['ten_danh_muc'].'\',
      \''.$value['id_loai'].'\'
     )" data-toggle="modal" data-target="#exampleModal3"><ion-icon name="create-outline"></ion-icon></button>
     <button class="btn btn-outline-danger" onclick="loadId2(\''.$value["id_danh_muc"].'\')" data-toggle="modal" data-target="#deletenenulv2"><ion-icon name="close-outline"></ion-icon></button>
     </td>
     </tr>';
}

    ?>

</tbody>
</table>
<div class="modal fade" id="changeimg" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="uploadimg.php" enctype="multipart/form-data">
            <div class="modal-body">
            <label for="hinhmna">Hình Menu <small style="color:red">Mẹo: nên giảm dung lượng ảnh để web được tối ưu hơn.</small></label>
         <input type='file' name="fileUpload" onchange="readURL2(this);" require/>
<img id="blah2" style=" max-width: 150px;max-height;150px;"  src="<?php echo $url_this_page.'/180.png'; ?>" alt="your image" require/>
      
            </div>
            <div class="modal-footer">
                
                    <input type="text" name="txtId" hidden id="txtid3">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                    <button type="submit" name="btActionMenu2" value="updateimg" class="btn btn-primary">Đồng Ý</button>
                
            </div>
            </form>
        </div>
    </div>
</div>



<div class="modal fade" id="deletenenulv2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h5>Bạn có chắc muốn xóa?</h5>
            </div>
            <div class="modal-footer">
                <form method="POST">
                    <input type="text" name="txtId" hidden id="txtid2">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                    <button type="submit" name="btActionMenu2" value="delete" class="btn btn-primary">Đồng Ý</button>
                </form>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
     <form method="POST" action="uploadimg.php" enctype="multipart/form-data">
            <label for="tenmn">Tên Menu</label>
         <input id="tenmn" name="txtName" type="text" class="form-control" require/>
         <label for="hinhmn">Hình Menu <small style="color:red">Mẹo: nên giảm dung lượng ảnh để web được tối ưu hơn.</small></label>
         <input type='file' name="fileUpload" onchange="readURL(this);" require/>
<img id="blah" style=" max-width: 150px;max-height;150px;"  src="<?php echo $url_this_page.'/180.png'; ?>" alt="your image" require/>
      
<label >Menu Cấp 1</label>
<select name="cboloai" class="custom-select" id="inputGroupSelect01">

<?php foreach ($listldm as $key => $value) {
  echo '<option value="'.$value['id_loai'].'">'.$value['ten_loai'].'</option>';
}
?>

  </select>
</div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
        <button  type="submit" name="add" value="Upload">Thêm</button>
      </div>
      </form>
    </div>
  </div>
</div>


<div class="modal fade" id="exampleModal3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post">
      <div class="modal-body">
      <label for="tenmenucon">Tên Menu Cấp 2</label>
         <input id="tenmenucon" name="txtName" type="text" class="form-control" require/>
         <input id="idmenucon" name="txtId" hidden type="text" class="form-control" require/>
         <label >Menu Cấp 1</label>
<select name="cboloai" class="custom-select" id="inputGroupSelect012">
<?php foreach ($listldm as $key => $value) {
  echo '<option value="'.$value['id_loai'].'">'.$value['ten_loai'].'</option>';
}


?>
</select>
</div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
        <button  type="submit" name="btActionMenu2" value="update">Thêm</button>
      </div>
    </div>
    </form>
  </div>
</div>



<script >
  function load3(id){
    document.getElementById("txtid3").value = id;
  }
         function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah')
                        .attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
        function readURL2(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah2')
                        .attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
        function loadIdUpDateMenu(id, ten,loai) {
                  document.getElementById("idmenucon").value = id;
                  document.getElementById("tenmenucon").value = ten;
                  document.getElementById("inputGroupSelect012").value = loai;
        
        }
</script>
