
<?php 
include './config.php';
// base name function give basename of the url
$page = basename($_SERVER['PHP_SELF']);
switch ($page) {
    case 'category.php':
        if(isset($_GET['cid'])){
            $sql = "SELECT * FROM category WHERE category_id = {$_GET['cid']}";
            $result = mysqli_query($con, $sql);
            $row_title = mysqli_fetch_assoc($result);
            $page_title = $row_title['category_name'];
        }else{
            $page_title = "No Category Found";
        }
        break;

        case 'author.php':
            if(isset($_GET['aid'])){
                $sql = "SELECT * FROM user WHERE user_id = {$_GET['aid']}";
                $result = mysqli_query($con, $sql);
                $row_title = mysqli_fetch_assoc($result);
                $page_title = $row_title['first_name']. " ".  $row_title['last_name'];
            }else{
                $page_title = "No Author Found";
            }
            break;

            case 'single.php':
                if(isset($_GET['id'])){
                    $sql = "SELECT * FROM post WHERE post_id = {$_GET['id']}";
                    $result = mysqli_query($con, $sql);
                    $row_title = mysqli_fetch_assoc($result);
                    $page_title = $row_title['title'];
                }else{
                    $page_title = "No Title Found";
                }
                break;

                case 'search.php':
                    if(isset($_GET['search'])){
                        $page_title = $_GET['search'];
                    }else{
                        $page_title = "No Title Found";
                    }
                    break;
    
    default:
        $page_title = "News";
        break;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <?php 
    
    ?>
    <title><?php echo $page_title; ?></title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="css/font-awesome.css">
    <!-- Custom stlylesheet -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<!-- HEADER -->
<div id="header">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <!-- LOGO -->
            <div class=" col-md-offset-4 col-md-4">
                <a href="index.php" id="logo"><img src="images/news.jpg"></a>
            </div>
            <!-- /LOGO -->
        </div>
    </div>
</div>
<!-- /HEADER -->
<!-- Menu Bar -->
<div id="menu-bar">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php 
                include './config.php';

                 // (isset($_GET['cid'])) condition for remove header error when no cat_id pass
                if(isset($_GET['cid'])){
                    $cat_id = $_GET['cid'];
                }
            
                $sql = "SELECT * FROM category WHERE post > 0";

                $result = mysqli_query($con, $sql) or die('Category Query Failed');

                if(mysqli_num_rows($result) > 0){
                
                 // (isset($_GET['cid'])) condition for remove header error when no cat_id pass
                $active = "";
                ?>
                <ul class='menu'>
                    <li><a href="./index.php">Home</a></li>
                    <?php 
                    while ($row = mysqli_fetch_assoc($result)){
                        // (isset($_GET['cid'])) condition for remove header error when no cat_id pass
                        if(isset($_GET['cid'])){
                            if($row['category_id'] == $cat_id){
                                $active = "active";
                            }else{
                                $active = "";
                            }
                        }
                        echo "<li><a class='{$active}' href='category.php?cid={$row['category_id']}'>{$row['category_name']}</a></li>";
                    } ?>
                    <li><a href="./admin/index.php">Log In</a></li>
                </ul>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
<!-- /Menu Bar -->
