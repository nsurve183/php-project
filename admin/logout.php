

<?php 

// if user role not admin the he cannot access this page
if($_SESSION['userrole'] == 0){
    header('location: post.php');
}

include './config.php';

session_start();

// session_unset() use for remove all session variables
session_unset();

// to delete session
session_destroy();

// its directly run main file admin/index.php
header('location: index.php');


?>
