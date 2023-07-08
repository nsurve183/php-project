


<?php 

if(empty($_FILES['logo']['name'])){
     $file_name = $_POST['old_logo'];
}else{
    $errors = array();  

    $file_name = $_FILES['logo']['name'];
    $file_size = $_FILES['logo']['size'];
    $file_temp = $_FILES['logo']['tmp_name'];
    $file_type = $_FILES['logo']['type'];
    $exp = explode('.', $file_name);
    $file_extension = end($exp);
    $extensions = array('jpeg', 'jpg', 'png');

    if(in_array($file_extension, $extensions) == false){
        $errors[] = 'Pls Upload Only jpeg, jpg or png files';
    }

    if($file_size > 2097152){
        $errors[] = 'Uploaded File Size Should Not Be More Than 2 MB';
    }

    if(empty($errors)){
        move_uploaded_file($file_temp, "images/".$file_name);
    }else{
        print_r($errors);
        die();
    }
}


include './config.php';

 $sql = "UPDATE settings SET websitename= '{$_POST['website_name']}', logo = '{$file_name}'";

$result = mysqli_query($con, $sql) or die('Query Failed');

if($result){
    header('location: ./post.php');
}else{
    echo "Query Failed";
}


?>