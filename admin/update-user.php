<?php include "header.php"; 

// if user role not admin the he cannot access this page
if($_SESSION['userrole'] == 0){
    header('location: post.php');
}
?>
  <div id="admin-content">
  <?php  

    if(isset($_POST['submit'])){

    include './config.php';

    // mysqli_real_escape_string this method use for not get any htmlentitycode from user
    $userid = $_GET['Id'];
    $fname = mysqli_real_escape_string($con, $_POST['f_name']);
    $lname =   mysqli_real_escape_string($con, $_POST['l_name']);
    $userData =  mysqli_real_escape_string($con, $_POST['username']);
    $role =  mysqli_real_escape_string($con, $_POST['role']);



    // for update data
    $sql = "UPDATE user SET first_name = '$fname', last_name = '$lname', username = '$userData', role = '$role' WHERE user_id = $userid";

        if(mysqli_query($con, $sql)){
            header('location: ./users.php');
        }
    }
?>
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                  <h1 class="admin-heading">Modify User Details</h1>
              </div>
              <div class="col-md-offset-4 col-md-4">
                  <!-- Form Start -->
                  <form  action="<?php $_SERVER['PHP_SELF']?>" method ="POST">
                    <?php 

                    include './config.php';

                    $userId = $_GET['Id'];

                    $sql = "SELECT * FROM user WHERE user_id = '$userId'";

                    $result = mysqli_query($con, $sql);

                    while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                      <div class="form-group">
                          <input type="hidden" name="user_id"  class="form-control" value="1" placeholder="" >
                      </div>
                          <div class="form-group">
                          <label>First Name</label>
                          <input type="text" name="f_name" class="form-control" value="<?php echo $row['first_name']?>" placeholder="" required>
                      </div>
                      <div class="form-group">
                          <label>Last Name</label>
                          <input type="text" name="l_name" class="form-control" value="<?php echo $row['last_name']?>" placeholder="" required>
                      </div>
                      <div class="form-group">
                          <label>User Name</label>
                          <input type="text" name="username" class="form-control" value="<?php echo $row['username']?>" placeholder="" required>
                      </div>
                      <div class="form-group">
                          <label>User Role</label>
                          <select class="form-control" name="role" value="<?php echo $row['role']?>">
                              <?php 
                              if($row['role'] == 1){
                                ?>
                            <option value="0" >normal User</option>
                              <option value="1" selected>Admin</option>
                              <?php }else{
                                ?>
                                <option value="0" selected>normal User</option>
                              <option value="1">Admin</option>
                              <?php 
                              }
                              ?>
                          </select>
                      </div>
                      <?php } ?>
                      <input type="submit" name="submit" class="btn btn-primary" value="Update" required />
                  </form>
                  <!-- /Form -->
              </div>
          </div>
      </div>
  </div>
<?php include "footer.php"; ?>
