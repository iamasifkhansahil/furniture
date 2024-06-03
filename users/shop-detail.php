<?php
include "header.php";
$id = $_GET['id'];
$query = "SELECT p.pro_id, p.pro_name, p.pro_desc, p.pro_price, p.pro_qty, p.pro_img, c.cat_name FROM product p
JOIN category c 
on p.pro_category = c.cat_id
WHERE pro_id = $id;";
$result = mysqli_query($con,$query);
$row = mysqli_fetch_assoc($result);
?>


<!-- content -->
<section class="py-5 mb-5">
    <div class="container">
        <div class="row gx-5">
            <aside class="col-lg-6">
                <div class="border rounded-4 mb-3 d-flex justify-content-center">
                    <img style="max-width: 100%; max-height: 70vh; margin: auto;" class="rounded-4 fit" src="../assets/uploads/product/<?php echo $row['pro_img']?>">
                </div>
            </aside>
            <main class="col-lg-6">
                <div class="ps-lg-3">
                    <h4 class="title text-dark">
                        <?php
                        echo $row['pro_name'] , "<br>" , $row['cat_name']
                        ?>
                    </h4>
                    <div class="d-flex flex-row my-3">
                        <span class="text-muted"><i class="fas fa-shopping-basket fa-sm mx-1"></i><?php echo $row['pro_qty']?></span>
                        <span class="text-<?php echo ($row['pro_qty'] > 0)?"success":"danger"?> ms-2"><?php echo ($row['pro_qty'] > 0)?"In Stock":"Out of Stock"?></span>
                    </div>

                    <div class="mb-3">
                        <span class="h5">$<?php echo $row['pro_price']?></span>
                        <span class="text-muted">/per box</span>
                    </div>

                    <p>
                    <?php echo $row['pro_desc']?>
                    </p>

                    <hr>

                    <div class="row mb-4">
                        <!-- col.// -->
                        <div class="col-md-4 col-6 mb-3">
                            <label class="mb-2 d-block">Quantity</label>
                            <div class="input-group mb-3" style="width: 170px;">
                                <button class="btn btn-white border border-secondary px-3" type="button" id="button-addon1" data-mdb-ripple-color="dark">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <input type="text" class="form-control text-center border border-secondary" placeholder="14" aria-label="Example text with button addon" aria-describedby="button-addon1" />
                                <button class="btn btn-white border border-secondary px-3" type="button" id="button-addon2" data-mdb-ripple-color="dark">
                                    <i class="fas fa-plus"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <a href="#" class="btn btn-primary shadow-0"> <i class="me-1 fa fa-shopping-basket"></i> Add to cart </a>
                </div>
            </main>
        </div>
    </div>
</section>
<!-- content -->
<?php
include "footer.php";
?>