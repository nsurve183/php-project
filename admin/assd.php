<?php 

// include './config.php';

// // uploading image
// if(isset($_FILES['fileToUpload'])){

//     $errors = array();

//     $file_name = $_FILES['fileToUpload']['name'];
//     $file_size = $_FILES['fileToUpload']['size'];
//     $file_temp = $_FILES['fileToUpload']['tmp_name'];
//     $file_type = $_FILES['fileToUpload']['type'];
//     $file_extension = explode('.', $file_name); 
//     $extensions = array('jpeg', 'jpg', 'png');

//     if(in_array($file_extension, $extensions) === false){
//         $errors[] = 'Pls Upload Only jpeg, jpg or png files';
//     }

//     // calculation of 2mb
//     // 1kb = 1024 bytes * 1mb = 1024 kb * 2mb
//     if($file_size > 2097152){
//         $errors[] = 'Uploaded File Size Should Not Be More Than 2 MB';
//     }


//     if(empty($errors) == true){ 
//         move_uploaded_file($file_temp,"upload/".$file_name);
//        // move_uploaded_file($file_temp, "upload/". $file_name);
//       // first paramter is temp file name and 2 were wont to upload uploaded file
//     }else{
//         print_r($errors);
//     }
// }

// session_start();
// $title = mysqli_real_escape_string($con, $_POST['post_title']);
// $description = mysqli_real_escape_string($con, $_POST['postdesc']);
// $category = mysqli_real_escape_string($con, $_POST['category']);
// $date = date("d M, Y");

// // this user_id use from users table
// $author = $_SESSION['user_id'];


// $sql = "INSERT INTO post(title, description, category, post_date, author, post_img) VALUES ('{$title}', '{$description}', {$category}, '{$date}', {$author}, '{$file_name}');";

 
// // this command use for whenever we add data in category post is increment by one
// $sql .= "UPDATE category SET post = post + 1 WHERE category_id = {$category}";

// if(mysqli_multi_query($con, $sql)){
//     header('location: ./post.php'); 
// }else{
//     echo "<div class='alert alert-danger'>Query Failed</div>";
// }

?>

<?php 
                             include './config.php';

                             $sql = "SELECT category_id, category_name FROM category";

                             $result = mysqli_query($con, $sql) or die("Query Failed");

                             if(mysqli_num_rows($result)){

                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo "<option value='{$row['category_id']}'>{$row["category_name"]}</option>";
                                }
                            }
                             ?>