

<?php 

include './config.php';

$post_id = $_GET['Id'];
$cat_id = $_GET['catid'];

// delete image from uplod folder when we delete user post
$sql1 = "SELECT * FROM post WHERE post_id = {$post_id};";
$result1 = mysqli_query($con, $sql1) or die("Query Failed : select");

$row = mysqli_fetch_assoc($result1);

// unlink use for delete image from folder
unlink("upload/".$row['post_img']);


$sql = "DELETE FROM post WHERE post_id = {$post_id};";
$sql .= "UPDATE category SET post = post - 1 WHERE category_id = {$cat_id}";

$result = mysqli_multi_query($con, $sql);

if($result){
    header('location: post.php');
}else{
    echo "Query Failed";
}
?>