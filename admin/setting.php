<?php include "header.php"; ?>
<div id="admin-content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="admin-heading">Website Setting</h1>
            </div>
            <div class="col-md-offset-3 col-md-6">
                <!-- Form -->
                <?php
                include './config.php';

                $sql = "SELECT * FROM settings";

                $result = mysqli_query($con, $sql) or die("Get all settings data query failed");

                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                        <form action="./save-settings.php" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="post_title">Website Name</label>
                                <input type="text" name="website_name" class="form-control" autocomplete="off"
                                    value="<?php echo $row['websitename']; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Website logo</label>
                                <input type="file" name="logo">
                                <img src="./images/<?php echo $row['logo']; ?>" alt="">
                                <input type="hidden" name="old_logo" value="<?php echo $row['logo']; ?>">
                            </div>
                            <input type="submit" name="submit" class="btn btn-primary" value="Save" required />
                        </form>
                    <?php }
                } ?>
                <!--/Form -->
            </div>
        </div>
    </div>
</div>
<?php include "footer.php"; ?>