

<form class="form-signin" method="POST">
  <h2 class="form-signin-heading">Đăng Nhập</h2>
  <?php
include_once('Controller/adminController.php');
$adminController=new adminController();

if(isset($_POST['username'])&&isset($_POST['password'])){
$adminController ->login($_POST['username'],$_POST['password']);
}

?>
  <input type="text" name="username" class="input-block-level" placeholder="Tài Khoản">
  <input type="password" name="password" class="input-block`-level" placeholder="Mật Khẩu">
  <button class="btn btn-primary" type="submit">
    Xác Nhận
  </button>

</form>