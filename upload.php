<?php
if(isset($_POST["submit"]) && isset($_FILES["image"])){
  include "db_conn.php";
  echo "<pre> " ;
  print_r($_FILES["image"]);
  echo "</pre>";
  $img_name=$_FILES["image"]["name"];
  $img_type=$_FILES["image"]["type"];
  $img_size=$_FILES["image"]["size"];
  $tmp_path=$_FILES["image"]["tmp_name"];
  $img_err=$_FILES["image"]["error"];
  if($img_err === 0){
    if ($img_size > 125000) {
      $em = "Sorry, your file is too large.";
      header("Location: index.php?error=$em");
    }
    else{
      $img_extension_mrn=pathinfo($img_name, PATHINFO_EXTENSION);
      $img_extension=strtolower($img_extension_mrn);
      $allowed_exetinsion=array("jpg","jpeg","png");
      if (in_array($img_extension,$allowed_exetinsion)){
        $new_img_name=uniqid("IMG-", true).'.'.$img_extension;
        $img_upload_path="uploads/".$new_img_name;
        move_uploaded_file($tmp_path,$img_upload_path);

        $sql="INSERT INTO images (image_url) VALUES ('$new_img_name')";
        mysqli_query($connect, $sql);
        header("Location: view.php");
      }
      else{
        $em="This type of file not allowed";
        header("Location: index.php?error=$em");
      }
    }
}else{
  $em="unexpected error";
  header("Location: index.php?error=$em");
}
}else{
header("Location: index.php");
}
?>