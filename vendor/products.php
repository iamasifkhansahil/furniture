<?php
include "header.php";
if (isset($_POST['searchInput'])) {
    $searchInput = trim($_POST['searchInput']);
    $query = "SELECT * FROM `product` WHERE pro_name LIKE '%$searchInput%';";
    $result = mysqli_query($con, $query);
} else {
    $query = "SELECT *FROM product";
    $result = mysqli_query($con, $query);
}
if (isset($_POST['trun'])) {
    $trunQuery = "TRUNCATE table product";
    $trnresult = mysqli_query($con, $trunQuery);
}
?>

<div class="container-fluid py-4">
    <div class="container top mb-3 d-flex justify-content-between align-items-center">
        <a href="add-products.php" class="btn btn-info mb-0">Add Products</a>
        <div class="d-flex align-items-center">
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
                        <h6 class="text-white text-capitalize bg-gradient-primary ps-3">Products table</h6>
                    </div>
                </div>
                <form method="POST" class="clear">
                    <input type="submit" class="btn bg-gradient-primary ms-5 mt-3" name="trun" value="Clear All" onclick="return confirm('Are you sure you want to clear this table?');">
                </form>
                <div class="card-body px-0 pb-2 mt-3">
                    <div class="container">

                        <div class="row">
                            <?php
                            while ($fetchdata = mysqli_fetch_assoc($result)) {

                            ?>
                                <div class="col-lg-3">
                                    <div class="product-card p-3">
                                        <a href="visi.php?id=<?php echo $fetchdata['pro_id'] ?>&status=<?php echo $fetchdata['pro_status'] ?>">
                                            <i class="material-icons opacity-10 eye text-dark"><?php echo ($fetchdata['pro_status'] == 1) ? "visibility" : "visibility_off"; ?></i>
                                        </a>
                                        <div class="product-card-img">
                                            <img src="../assets/uploads/product/<?php echo $fetchdata['pro_img'] ?>" alt="" class="my-img">
                                        </div>
                                        <div class="product-card-body mt-2">
                                            <h3 class="title"><?php echo $fetchdata['pro_name'] ?></h3>
                                            <p class="price">Price: $<?php echo $fetchdata['pro_price'] ?></p>
                                            <p class="qty">Quantity: <?php echo $fetchdata['pro_qty'] ?></p>
                                            <div class="icons">
                                                <a href="delete-product.php?id=<?php echo $fetchdata['pro_id'] ?>" onclick="return confirm('Are you sure you want to delete this product?');">
                                                    <i class="material-icons opacity-10 my-2 text-danger">delete</i>
                                                </a>
                                                <a href="update-products.php?id=<?php echo $fetchdata['pro_id'] ?>">
                                                    <i class="material-icons opacity-10 text-info">edit</i>
                                                </a>
                                            </div>
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