
<?php 

if(empty($_FILES['new-image']['name'])){
     $file_name = $_POST['old-image'];
}else{
    $errors = array();

    $file_name = $_FILES['new-image']['name'];
    $file_size = $_FILES['new-image']['size'];
    $file_temp = $_FILES['new-image']['tmp_name'];
    $file_type = $_FILES['new-image']['type'];
    $exp = explode('.', $file_name);
    $file_extension = end($exp);
    $extensions = array('jpeg', 'jpg', 'png');

    if(in_array($file_extension, $extensions) == false){
        $errors[] = 'Pls Upload Only jpeg, jpg or png files';
    }

    if($file_size > 2097152){
        $errors[] = 'Uploaded File Size Should Not Be More Than 2 MB';
    }

    // with the help of target image can not be ower write which image name are same
    $target =  "upload/". time() .$file_name;
    if(empty($errors)){
        move_uploaded_file($file_temp, $target);
    }else{
        print_r($errors);
        die();
    }
}


include './config.php';

 $sql = "UPDATE post SET title= '{$_POST['post_title']}', description = '{$_POST['postdesc']}', category = {$_POST['category']}, post_img = '{$file_name}' WHERE post_id={$_POST['post_id']}";

$result = mysqli_query($con, $sql) or die('Query Failed');

if($result){
    header('location: ./post.php');
}else{
    echo "Query Failed";
}


?>