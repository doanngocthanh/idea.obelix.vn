<?php

//upload.php
$target_dir = 'img/';
if(isset($_FILES['upload']['name']))
{
 $file = $_FILES['upload']['tmp_name'];
 $file_name = $_FILES['upload']['name'];
 $file_name_array = explode(".", $file_name);
 $extension = end($file_name_array);
 $new_image_name = rand() . '.' . $extension;
 chmod('upload', 0777);
 $allowed_extension = array("jpg", "gif", "png");
 if(in_array($extension, $allowed_extension))
 {
  move_uploaded_file($file, $target_dir . $new_image_name);
  $function_number = $_GET['CKEditorFuncNum'];
  $url = $target_dir .$new_image_name;
  $message = '';
  echo "<script type='text/javascript'>console.log('ok'); window.parent.CKEDITOR.tools.callFunction($function_number, '$url', '$message');</script>";
 }
}

?>