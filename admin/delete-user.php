<?php  
include './config.php';

// if user role not admin the he cannot access this page
if($_SESSION['userrole'] == 0){
    header('location: post.php');
}

$ids = $_GET['Id'];

$sql = "DELETE FROM user WHERE user_id = $ids";

$result = mysqli_query($con, $sql) or die("Query Failed");

header('location: ./users.php');

mysqli_close($con);

?>