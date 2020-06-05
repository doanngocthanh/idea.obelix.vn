<!DOCTYPE html>
<html lang="vi" >

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
<script src="https://unpkg.com/ionicons@5.0.0/dist/ionicons.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css"/>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4-4.1.1/datatables.min.css"/>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
 
 
</head>

<body>  

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <p class="navbar-brand">Idea - Manager Web</p>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
               
                    <li class="nav-item">
                        <a class="nav-link" id='qlmn' href="?btAction=qlmn">Quản Lý Menu</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id='qlbv' href="?btAction=qlbv">Quản Lý Bài Viết</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id='qltk' href="?btAction=qltk">Quản Lý Tài Khoản</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id='logout' href="?btAction=logout">Đăng Xuất</a>
                    </li>
                     
                </ul>
            </div>
        </div>
    </nav>


    
        <?php
        function utf8convert($str) {

            if(!$str) return false;

            $utf8 = array(

        'a'=>'á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ|Á|À|Ả|Ã|Ạ|Ă|Ắ|Ặ|Ằ|Ẳ|Ẵ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',

        'd'=>'đ|Đ',

        'e'=>'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ|É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',

        'i'=>'í|ì|ỉ|ĩ|ị|Í|Ì|Ỉ|Ĩ|Ị',

        'o'=>'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ|Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',

        'u'=>'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự|Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',

        'y'=>'ý|ỳ|ỷ|ỹ|ỵ|Ý|Ỳ|Ỷ|Ỹ|Ỵ',);

            foreach($utf8 as $ascii=>$uni) $str = preg_replace("/($uni)/i",$ascii,$str);

return $str;
                                        }
                                        function utf8tourl($text){
                                            $text = strtolower(utf8convert($text));
                                            $text = str_replace( "ß", "ss", $text);
                                            $text = str_replace( "%", "", $text);
                                            $text = preg_replace("/[^_a-zA-Z0-9 -] /", "",$text);
                                            $text = str_replace(array('%20', ' '), '-', $text);
                                            $text = str_replace("----","-",$text);
                                            $text = str_replace("---","-",$text);
                                            $text = str_replace("--","-",$text);
                                    return $text;
                                    }

include_once('Controller/adminController.php');

$adminController=new adminController();
$adminController-> checksession();

if(isset($_GET['btAction'])){
    if($_GET['btAction']=='logout'){
        $adminController->logout();
    }else if($_GET['btAction']=='qlmn'){
        include('quanlymenu.php');
    }else if($_GET['btAction']=='qlbv'){
        include('quanlybaiviet.php');
    }else if($_GET['btAction']=='qltk'){
        echo 'quản lý tài khoản';
    }
}else{
    include('quanlymenu.php');
}

?>

    


   
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.21/datatables.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#exampletbl').DataTable();
            $('#exampletbl1').DataTable();
            $('#exampletbl3').DataTable();
        });
    </script>
</body>

</html>