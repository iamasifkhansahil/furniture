<?php
include "header.php";
if (isset($_POST['searchInput'])) {
    $searchInput = trim($_POST['searchInput']);
    $query = "SELECT * FROM `category` WHERE cat_name LIKE '%$searchInput%';";
    $result = mysqli_query($con, $query);
} else {
    $query = "SELECT *FROM category";
    $result = mysqli_query($con, $query);
}
?>

<div class="container-fluid py-4">
    <div class="container top mb-3 d-flex justify-content-between align-items-center">
        <a href="add-category.php" class="btn btn-info mb-0">Add Categories</a>
        <div class=" d-flex align-items-center">
            <form class="input-group input-group-outline" method="post">
                <label class="form-label">Search here...</label>
                <input type="text" class="form-control" name="searchInput">
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card my-4 pb-5">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize bg-gradient-primary ps-3">Category table</h6>
                    </div>
                </div>
                <div class="card-body px-0 pb-2 mt-3">
                    <div class="container">

                        <div class="row">
                            <?php

                            while ($fetchdata = mysqli_fetch_assoc($result)) {


                            ?>
                                <div class="col-lg-2">
                                    <div class="cat-card" style="background-image: url(../assets/uploads/category/<?php echo $fetchdata['cat_img'] ?>);">
                                        <div class="cat-card-no"><?php echo $fetchdata['cat_id'] ?></div>
                                        <div class="cat-card-body">
                                            <h3><?php echo $fetchdata['cat_name'] ?></h3>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php
include "footer.php";
?>