<div class="container">
    <h3 class="col">
        Danh Sách Menu
    </h3>
    <?php


    include_once("Model/loaiDanhMuc.php");
    include_once("Model/danhMucBaiViet.php");
    $loaiDanhMuc = new loaiDanhMuc();
    $danhMucBaiViet = new danhMucBaiViet();
    try {
        if (isset($_POST['btActionMenu'])) {
            $hide = 'off';
            if (isset($_POST['txtHide_show'])) {
                $hide = $_POST['txtHide_show'];
            }
            if ($_POST['btActionMenu'] == "add") {
                $new_str = utf8tourl(utf8convert($_POST['txtName']));
                $success = $loaiDanhMuc->insertLoaiDanhMuc($new_str, $_POST['txtName'], $hide);
            } else if ($_POST['btActionMenu'] == 'delete') {
                $loaiDanhMuc->deleteLoaiDanhMuc($_POST['txtId']);
            } else if ($_POST['btActionMenu'] == 'update') {
                $loaiDanhMuc->updateLoaiDanhMuc($_POST['txtId'], $_POST['txtName'], $hide);
            }
            header("Location:" . "http://" . $_SERVER['SERVER_NAME'] . dirname($_SERVER["REQUEST_URI"] . '?') . '/' . "admin_index.php");
        } elseif (isset($_POST['btActionMenu2'])) {
            if ($_POST['btActionMenu2'] == 'delete') {
                $danhMucBaiViet->deleteDanhMucBaiViet($_POST['txtId']);
            } elseif ($_POST['btActionMenu2'] == 'update') {
                try {
                    $danhMucBaiViet->updateDanhMucBaiViet($_POST['txtId'], $_POST['txtName'], $_POST['cboloai']);
                    echo '<div class="container alert alert-success alert-dismissible fade show fixed-top" role="alert">
                 <strong>Đã cập nhập!</strong>
                 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                   <span aria-hidden="true">&times;</span>
                 </button>
               </div>';
                } catch (\Throwable $th) {
                    echo '<div class="container alert alert-warning alert-dismissible fade show fixed-top" role="alert">
          <strong>Xãy ra lỗi!</strong> ' . $th . '
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>';
                }
            } elseif ($_POST['btActionMenu2'] == 'add') {
                //echo' <script>alert("helo");</script>';
                if ($_POST['txtName'] == '' || $_FILES['fileUpload']['error'] > 0) {
                    echo '<div class="container alert alert-warning alert-dismissible fade show fixed-top" role="alert">
                    <strong>Hãy điền đầy đủ dữ liệu tên, hình ảnh.!</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>';
                } else {

                    $new_str = utf8tourl(utf8convert($_POST['txtName']));
                    move_uploaded_file($_FILES['fileUpload']['tmp_name'], 'img/' . $_FILES['fileUpload']['name']);
                    $checkey = $danhMucBaiViet->insertDanhMucBaiViet($new_str, $_POST['txtName'], $_FILES['fileUpload']['name'], $_POST['cboloai']);


                    if (isset($checkey)) {
                        echo '<div class="container alert alert-success alert-dismissible fade show fixed-top" role="alert">
                        <strong>Đã Thêm!</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>';
                    } else {
                        echo '<div class="container alert alert-warning alert-dismissible fade show fixed-top" role="alert">
                        <strong>Dữ liệu đã được lưu.</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>';
                    }
                }
            } elseif ($_POST['btActionMenu2'] == 'updateimg') {

                if ($_FILES['fileUpload']['error'] > 0){

                }
                else {
                move_uploaded_file($_FILES['fileUpload']['tmp_name'], 'img/'. $_FILES['fileUpload']['name']); 
                $danhMucBaiViet->updateIMGDanhMucBaiViet($_POST['txtId'], $_FILES['fileUpload']['name']);
                }
              
                
            }
        }
    } catch (\Throwable $th) {
        echo 'Xảy ra 1 chút sự cố vui lòng kiểm tra dữ liệu và xin thử lại lần nữa, Cảm Ơn!';
        echo $th;
    }
    ?>
    <table class="table table-striped table-bordered table-sm" style="width:100%" id='exampletbl'>
        <thead>
            <tr>
                <th>
                    <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#exampleModal">
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

            $listldm = $loaiDanhMuc->getAll();
            $listldanhmucbaiviet = $danhMucBaiViet->getAll();
            $i = 0;
            foreach ($listldm as $key => $value) {
                $i++;
                $listDanhMuc = $danhMucBaiViet->getIdLoai($value["id_loai"]);
                $trangthai = 'Đang Chạy';
                if ($value["hide_show"] != 0) {
                    $trangthai = 'Đã Ngưng Chạy';
                }


                echo '<tr>
                        <td>' . $i . '</td>
                        <td><a href="?btAction=qlmn&menu=' . $value["id_loai"] . '">' . $value["ten_loai"] . '</a></td>
                        <td>' . count($listDanhMuc) . '</td>
                        <td>' . $value["menu_index"] . '</td>
                        <td>' . $trangthai . '</td>
                        <td>
                        <button class="btn btn-outline-primary" onclick="loadIdUpDate(
                        \'' . $value['id_loai'] . '\',
                        \'' . $value['ten_loai'] . '\',
                        ' . $value['hide_show'] . '
                        )" data-toggle="modal" data-target="#updatemenu" ><ion-icon name="create-outline"></ion-icon></button>
                        <button class="btn btn-outline-danger" onclick="loadId(\'' . $value["id_loai"] . '\')" data-toggle="modal" data-target="#deletenenu"><ion-icon name="close-outline"></ion-icon></button>
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

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
    <div class="modal fade" id="deletenenu" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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




    <div class="modal fade" id="updatemenu" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
    if (isset($_GET['menu'])) {
        if ($_GET['menu'] == '') {
            $menucon = $danhMucBaiViet->GetAll();
        } else {
            $menucon = $danhMucBaiViet->GetListByIdFK($_GET['menu']);
        }
    } else {
        $menucon = $danhMucBaiViet->GetAll();
    }
    ?>
    <h3 class="col">
        Quản Lý Danh Mục
    </h3>
    <table class="table table-striped table-bordered table-sm" style="width:100%" id='exampletbl1'>
        <thead>
            <tr>
                <th><button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#exampleModal2">
                        <ion-icon size="small" name="add-outline"></ion-icon>Thêm Danh Mục
                    </button></th>
                <th scope="col">Danh Mục</th>
                <th scope="col">Hình</th>
                <th scope="col">Menu hiển thị</th>
                <th scope="col">Lượt Click</th>
                <th scope="col">Thao Tác</th>

            </tr>
        </thead>
        <tbody>

            <?php
            $url_this_page = "http://" . $_SERVER['SERVER_NAME'] . dirname($_SERVER["REQUEST_URI"] . '?') . '/img';
            $u = 0;

            foreach ($menucon as $key => $value) {
                $u++;
                $menucap1text = '';
                $menucap1list = $loaiDanhMuc->getId($value['id_loai']);
                if (isset($menucap1list)) {
                    foreach ($menucap1list as $key1 => $value1) {
                        $menucap1text = $value1['ten_loai'];
                    }
                }
                echo '<tr>
                        <td>' . $u . '</td>
                        <td>' . $value["ten_danh_muc"] . '</td>
                        <td>
                        <button class="btn btn-outline-dark"
                        onclick="load3(\'' . $value['id_danh_muc'] . '\')"
                        data-toggle="modal" data-target="#changeimg">Đổi Hình</button>
                        <img style="width:150px" src="' . $url_this_page . '/' . $value["hinh_danh_muc"] . '" alt="' . $url_this_page . '/' . $value["hinh_danh_muc"] . '" class="img-thumbnail"/></td>
                        <td>' . $menucap1text . '</td>
                        <td>' . $value["so_luong_xem"] . '</td>
                        <td>
                        <button class="btn btn-outline-primary" onclick="loadIdUpDateMenu(
                        \'' . $value['id_danh_muc'] . '\',
                        \'' . $value['ten_danh_muc'] . '\',
                        \'' . $value['id_loai'] . '\'
                        )" data-toggle="modal" data-target="#exampleModal3"><ion-icon name="create-outline"></ion-icon></button>
                        <button class="btn btn-outline-danger" onclick="loadId2(\'' . $value["id_danh_muc"] . '\')" data-toggle="modal" data-target="#deletenenulv2"><ion-icon name="close-outline"></ion-icon></button>
                        </td>
                        </tr>';
            }

            ?>

        </tbody>
    </table>
    <div class="modal fade" id="changeimg" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                        <label for="hinhmna">Hình Menu <small style="color:red">Mẹo: nên giảm dung lượng ảnh để web được tối ưu hơn.</small></label>
                        <input type='file' name="fileUpload" onchange="readURL2(this);" require />
                        <img id="blah2" style=" max-width: 150px;max-height:150px;" src="<?php echo $url_this_page . '/180.png'; ?>" alt="your image" require />

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



    <div class="modal fade" id="deletenenulv2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                    <form method="POST" enctype="multipart/form-data">
                        <label for="tenmn">Tên Menu</label>
                        <input id="tenmn" name="txtName" type="text" class="form-control" require />
                        <label for="hinhmn">Hình Menu <small style="color:red">Mẹo: nên giảm dung lượng ảnh để web được tối ưu hơn.</small></label>
                        <input type='file' name="fileUpload" onchange="readURL(this);" require />
                        <img id="blah" style=" max-width: 150px;max-height:150px;" src="<?php echo $url_this_page . '/180.png'; ?>" alt="your image" require />

                        <label>Menu Cấp 1</label>
                        <select name="cboloai" class="custom-select" id="inputGroupSelect01">

                            <?php foreach ($listldm as $key => $value) {
                                echo '<option value="' . $value['id_loai'] . '">' . $value['ten_loai'] . '</option>';
                            }
                            ?>

                        </select>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                    <button type="submit" name="btActionMenu2" value="add">Thêm</button>
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
                        <input id="tenmenucon" name="txtName" type="text" class="form-control" require />
                        <input id="idmenucon" name="txtId" hidden type="text" class="form-control" require />
                        <label>Menu Cấp 1</label>
                        <select name="cboloai" class="custom-select" id="inputGroupSelect012">
                            <?php foreach ($listldm as $key => $value) {
                                echo '<option value="' . $value['id_loai'] . '">' . $value['ten_loai'] . '</option>';
                            }


                            ?>
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                        <button type="submit" name="btActionMenu2" value="update">Cập Nhập</button>
                    </div>
            </div>
            </form>
        </div>
    </div>



    <script>
        function load3(id) {
            document.getElementById("txtid3").value = id;
        }

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#blah')
                        .attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }

        function readURL2(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#blah2')
                        .attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }

        function loadIdUpDateMenu(id, ten, loai) {
            document.getElementById("idmenucon").value = id;
            document.getElementById("tenmenucon").value = ten;
            document.getElementById("inputGroupSelect012").value = loai;

        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.21/datatables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#exampletbl').DataTable();
            $('#exampletbl1').DataTable();
            $('#exampletbl3').DataTable();
        });
    </script>
</div>