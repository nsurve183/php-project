<?php include "header.php"; 

// if user role not admin the he cannot access user page
if($_SESSION['userrole'] == 0){
    header('location: post.php');
}

?>
  <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-10">
                  <h1 class="admin-heading">All Users</h1>
              </div>
              <div class="col-md-2">
                  <a class="add-new" href="add-user.php">add user</a>
              </div>
              <div class="col-md-12">
                <?php 
                   include './config.php';

                   $limit  = 3;
                   if(isset($_GET['page'])){
                    $page = $_GET['page'];
                   }else{
                    $page = 1;
                   }
                  
                   $offset = ($page - 1) * $limit;

                   $sql = "SELECT * FROM user ORDER BY user_id ASC LIMIT {$offset}, {$limit}";    

                   $result = mysqli_query($con, $sql);

                   if(mysqli_num_rows($result) > 0){

                ?>
                  <table class="content-table" style="text-align: center;">
                      <thead>
                          <th>S.No.</th>
                          <th>Full Name</th>
                          <th>User Name</th>
                          <th>Role</th>
                          <th>Edit</th>
                          <th>Delete</th>
                      </thead>
                      <tbody>
                        <?php 
                        while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                          <tr>
                              <td class='id'><?php echo $row['user_id'] ?></td>
                              <td><?php echo $row['first_name']. " ".  $row['last_name'] ?></td>
                              <td><?php echo $row['username']?></td>
                              <td><?php echo ($row['role'] == 1)? "Admin" : "Normal User" ?></td>
                              <td class='edit'><a href='update-user.php?Id=<?php echo $row['user_id']?>'><i class='fa fa-edit'></i></a></td>
                              <td class='delete'><a href='delete-user.php?Id=<?php echo $row['user_id']?>'><i class='fa fa-trash-o'></i></a></td>
                          </tr>
                         <?php } ?>
                      </tbody>
                  </table>
                  <?php } 
                  
                //   for pegination 

                $sql1 = "SELECT * FROM user";

                $result1 = mysqli_query($con, $sql1);
              
                if(mysqli_num_rows($result1)){
                    $total_records = mysqli_num_rows($result1);
                
                    $total_pages = ceil($total_records / $limit);

                    echo "<ul class='pagination admin-pagination'>";
                    // for previous page link
                    if($page > 1){
                        echo '<li><a <a href="./users.php?page='.($page - 1).'">Prev</a></li>';
                    }
                    for ($i=1; $i <= $total_pages; $i++) {
                        // condition fro active class
                        if($i == $page){
                            $active = 'active';
                        }else{
                            $active = '';
                        } 
                       echo '<li class="'.$active.'" ><a href="./users.php?page='.$i.'">'.$i.'</a></li>';
                    }

                    // for next page link
                    if($total_pages > $page){
                        echo '<li><a href="./users.php?page='.($page + 1).'">Next</a></li>';
                    }
                    echo '</ul>'; 
                }
                  ?>
              </div>
          </div>
      </div>
  </div>
<?php include "footer.php"; ?>