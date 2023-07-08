
<?php 

// if user role not admin the he cannot access this page
if($_SESSION['userrole'] == 0){
    header('location: post.php');
}

include './config.php';

$cat_id = $_GET['Id'];

$sql = "DELETE FROM category WHERE category_id = '$cat_id'";

$result = mysqli_query($con, $sql);

header('location: category.php');

mysqli_close($con);
?>