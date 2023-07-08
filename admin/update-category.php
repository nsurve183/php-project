<?php include "header.php"; 

// if user role not admin the he cannot access this page
if($_SESSION['userrole'] == 0){
  header('location: post.php');
}
?>
  <div id="admin-content">
      <div class="container">
        <?php

        if(isset($_POST['sumbit'])){
            include './config.php';

          $catid = $_GET['Id'];
          $catname = mysqli_real_escape_string($con, $_POST['cat_name']);
          $catpost =   mysqli_real_escape_string($con, $_POST['post']);

          $sql1 = "UPDATE category SET category_name = '$catname', post = $catpost WHERE category_id = $catid";

          $result1 = mysqli_query($con, $sql1) or die("Query Failed");  

          if($result1){
            header('location: category.php');
          }
        }
        ?>
          <div class="row">
              <div class="col-md-12">
                  <h1 class="adin-heading"> Update Category</h1>
              </div>
              <div class="col-md-offset-3 col-md-6">
                  <form action="<?php $_SERVER['PHP_SELF']?>" method ="POST">
                  <?php 

                    include './config.php';

                    $cat_id = $_GET['Id'];

                    $sql = "SELECT * FROM category WHERE category_id = $cat_id";
                    
                    $result = mysqli_query($con, $sql) or die('Query Failed');

                    while ($row = mysqli_fetch_assoc($result)) {
             
                  ?>
                      <div class="form-group">
                          <label>Category Name</label>
                          <input type="text" name="cat_name" class="form-control" value="<?php echo $row['category_name'] ?>"  placeholder="" required>
                      </div>
                      <div class="form-group">
                          <input type="number" name="post"  class="form-control" value="<?php echo $row['post'] ?>" placeholder="">
                        </div>
                    <?php  } 
                    ?>
                    <input type="submit" name="sumbit" class="btn btn-primary" value="Update" required />
                </form>
                </div>
              </div>
            </div>
          </div>
<?php include "footer.php"; ?>
