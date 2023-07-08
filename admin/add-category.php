<?php include "header.php"; ?>
<div id="admin-content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="admin-heading">Add New Category</h1>
            </div>
            <div class="col-md-offset-3 col-md-6">
                <?php
                include './config.php';

                if (isset($_POST['save'])) {


                    $catname = $_POST['cat'];
                    $catpost = $_POST['post'];
                    
                    $sql = "INSERT INTO category (category_name, post) VALUES ('{$catname}', '{$catpost}')";

                    $result = mysqli_query($con, $sql) or die("quey Failed");

                    header('location: ./category.php');
                }
                ?>
                <!-- Form Start -->
                <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" autocomplete="off">

                    <div class="form-group">
                        <label>Category Name</label>
                        <input type="text" name="cat" class="form-control" placeholder="Category Name" required>
                    </div>
                    <div class="form-group">
                        <label>Category Post</label>
                        <input type="text" name="post" class="form-control" placeholder="Category Name" required>
                    </div>
                    <input type="submit" name="save" class="btn btn-primary" value="Save" required />
                </form>
                <!-- /Form End -->
            </div>
        </div>
    </div>
</div>
<?php include "footer.php"; ?>