<div class="container">
    <h3 class="col">
        Danh Sách Menu 
    </h3>
    <?php 
  include_once("Model/loaiDanhMuc.php");
  include_once("Model/danhMucBaiViet.php");
  $loaiDanhMuc=new loaiDanhMuc();
  $danhMucBaiViet= new danhMucBaiViet();
    try {
    if(isset($_POST['btActionMenu'])){
        $hide='off';
        if(isset($_POST['txtHide_show'])){
            $hide=$_POST['txtHide_show'];
        }
        if($_POST['btActionMenu']=="add"){
                $new_str = utf8tourl(utf8convert($_POST['txtName']));
                $success= $loaiDanhMuc->insertLoaiDanhMuc($new_str,$_POST['txtName'],$hide);
                
        }else if($_POST['btActionMenu']=='delete'){
            $loaiDanhMuc->deleteLoaiDanhMuc($_POST['txtId']);
        }else if($_POST['btActionMenu']=='update'){
            $loaiDanhMuc->updateLoaiDanhMuc($_POST['txtId'],$_POST['txtName'],$hide);
        }
        header("Location:"."http://".$_SERVER['SERVER_NAME'].dirname($_SERVER["REQUEST_URI"].'?').'/'."index.php");
      
    }elseif(isset($_POST['btActionMenu2'])){
        if($_POST['btActionMenu2']=='delete'){
            $danhMucBaiViet->deleteDanhMucBaiViet($_POST['txtId']);
        }elseif($_POST['btActionMenu2']=='update'){
          try {
                 $danhMucBaiViet->updateDanhMucBaiViet($_POST['txtId'],$_POST['txtName'],$_POST['cboloai']);
                 echo'<div class="container alert alert-success alert-dismissible fade show fixed-top" role="alert">
                 <strong>Thành Công!</strong> Ngon rồi ông giáo ạ.
                 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                   <span aria-hidden="true">&times;</span>
                 </button>
               </div>';
              } catch (\Throwable $th) {
                echo'<div class="container alert alert-warning alert-dismissible fade show fixed-top" role="alert">
          <strong>Toang rồi ông giáo ạ!</strong> Vui lòng kiểm tra lại dữ liệu ông giáo nhé!.
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>';
              }
        }
      }

            
    
    } catch (\Throwable $th) {
        echo 'Xảy ra 1 chút sự cố vui lòng kiểm tra dữ liệu và xin thử lại lần nữa, Cảm Ơn!';
    }
    ?>
    <table class="table table-striped table-bordered table-sm" style="width:100%" id='exampletbl'>
        <thead>
            <tr>
                <th scope="col">
                    <button type="button" class="btn btn-outline-success" data-toggle="modal"
                        data-target="#exampleModal">
                        <ion-icon size="small" name="add-outline"></ion-icon>Thêm Menu
                    </button></th>
                <th scope="col">Tên Menu</th>
                <th scope="col">Danh Mục</th>
                <th scope="col">Vị Trí Xuất Hiện</th>
                <th scope="col">Trạng Thái</th>
                <th scope="col">Thao Tác</th>


            </tr>
        </thead>
        <tbody>

            <?php 
        
        $listldm=$loaiDanhMuc->getAll();
        $listldanhmucbaiviet=$danhMucBaiViet->getAll();
        $i=0;
        foreach ($listldm as $key => $value) {
              $i++;
            $listDanhMuc=$danhMucBaiViet->getIdLoai($value["id_loai"]);
            $trangthai='Đang Chạy';
            if($value["hide_show"]!=0){
                $trangthai='Đã Ngưng Chạy';
        }
        
            
         echo'
         <tr>
         <td>'.$i.'</td>
         <td><a href="index.php?btAction=qlmn&menu='.$value["id_loai"].'#exampletbl1">'.$value["ten_loai"].'</a></td>
         <td>'.count($listDanhMuc).'</td>
         <td>'.$value["menu_index"].'</td>
         <td>'.$trangthai.'</td>
         <td>
         <button class="btn btn-outline-primary" onclick="loadIdUpDate(
          \''.$value['id_loai'].'\',
          \''.$value['ten_loai'].'\',
          '.$value['hide_show'].'
         )" data-toggle="modal" data-target="#updatemenu" ><ion-icon name="create-outline"></ion-icon></button>
         <button class="btn btn-outline-danger" onclick="loadId(\''.$value["id_loai"].'\')" data-toggle="modal" data-target="#deletenenu"><ion-icon name="close-outline"></ion-icon></button>
         </td>
         </tr>';
    }
        ?>
        <tfoot>
            <tr align="center">
                <td colspan="6"> <a href="?btAction=qlmn&menu=#exampletbl1"> Xem Tất Cả Menu Con</a></td>
            </tr>

        </tfoot>
        </tbody>
    </table>

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST">
                    <div class="modal-body">

                        <label for="addip">Tên Menu</label>
                        <input id="addip" name="txtName" type="text" class="form-control" />
                        <div class="custom-control custom-switch">
                            <input type="checkbox" name="txtHide_show" class="custom-control-input" id="customSwitch1">
                            <label class="custom-control-label" for="customSwitch1">Ẩn Menu</label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                        <button type="submit" name="btActionMenu" value="add" class="btn btn-primary">Thêm</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="deletenenu" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                        <input type="text" name="txtId" hidden id="txtid">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                        <button type="submit" name="btActionMenu" value="delete" class="btn btn-primary">Đồng Ý</button>
                    </form>
                </div>
            </div>
        </div>
    </div>




    <div class="modal fade" id="updatemenu" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST">
                    <div class="modal-body">
                        <label>Tên Menu</label>
                        <input name="txtId" hidden id="txtIdUpdate" type="text" class="form-control" />
                        <input name="txtName" id="txtNameUpdate" type="text" class="form-control" />

                        <div class="custom-control custom-switch">
                            <input type="checkbox" name="txtHide_show" class="custom-control-input" id="customSwitch2">
                            <label class="custom-control-label" for="customSwitch2">Ẩn Menu</label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                        <button type="submit" name="btActionMenu" value="update" class="btn btn-primary">Thêm</button>
                    </div>
                </form>
            </div>
        </div>
    </div>




    <script>
        function loadId(id) {
            document.getElementById('txtid').value = id;
        }
        function loadId2(id) {
            document.getElementById('txtid2').value = id;
        }
        function loadIdUpDate(id, noidung, checked) {
            console.log(id, noidung, checked);
            if (checked != 0) {
                document.getElementById('customSwitch2').checked = true;
            }
            document.getElementById('txtIdUpdate').value = id;
            document.getElementById('txtNameUpdate').value = noidung;


        }

    </script>
    <?php 
    if(isset($_GET['menu'])){
       if($_GET['menu']==''){
        $menucon= $danhMucBaiViet->GetAll();
       }else{
        $menucon= $danhMucBaiViet->GetListByIdFK($_GET['menu']);
       }
    
    
    }else{
        $menucon= $danhMucBaiViet->GetAll();
    }
    include('menucon.php');
    ?>
  
</div>