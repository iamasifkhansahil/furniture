<?php
include "header.php";
$id = $_GET['id'];
if (isset($_POST['submit'])) {
  $name = trim($_POST['pname']);
  $desc = trim($_POST['pdesc']);
  $cat = trim($_POST['pcat']);
  $price = trim($_POST['pprice']);
  $qty = trim($_POST['pqty']);
  $img = trim($_FILES['pimg']['name']);
  $tmpimage = trim($_FILES['pimg']['tmp_name']);
  $folder = "../assets/uploads/product/" . $img;
  move_uploaded_file($tmpimage, $folder);
  if ($tmpimage != "") {
    $query = "UPDATE `product` SET `pro_name`='$name',`pro_desc`='$desc',`pro_category`='$cat',`pro_price`='$price',
    `pro_qty`='$qty',`pro_img`='$img' WHERE pro_id = $id";  
  }else{
    $query = "UPDATE `product` SET `pro_name`='$name',`pro_desc`='$desc',`pro_category`='$cat',`pro_price`='$price',
  `pro_qty`='$qty' WHERE pro_id = $id";
  }
  
  $result = mysqli_query($con,$query);
  if ($result) {
    echo "<script>alert('Product Updated');
    window.location.href = 'products.php';
    </script>";
  } else {
    echo "<script>alert('Product not Updated')</script>";
  }
}
$showQuery = "SELECT * FROM category";
$showResult = mysqli_query($con, $showQuery);

$proQuery = "SELECT * FROM product where pro_id = $id";
$proResult = mysqli_query($con, $proQuery);
$proRow = mysqli_fetch_assoc($proResult);
?>

<main class="main-content  mt-0">
  <div class="page-header align-items-start min-vh-80">

    <div class="container my-auto">
      <div class="row">
        <div class="col-lg-4 col-md-8 col-12 mx-auto">
          <div class="card z-index-0 fadeIn3 fadeInBottom">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
                <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">Update Products</h4>

              </div>
            </div>
            <div class="card-body">
              <form role="form" class="text-start" method="post" enctype="multipart/form-data">
                <div class="input-group input-group-outline my-3">
                  <input type="text" class="form-control" name="pname" value="<?php echo $proRow['pro_name']; ?>">
                </div>
                <div class="input-group input-group-outline my-3">
                  <input type="text" class="form-control" name="pdesc" value="<?php echo $proRow['pro_desc']; ?>">
                </div>
                <div class="input-group input-group-outline my-3">
                  <select name="pcat" class="form-control">
                    <option value="">Select any category</option>
                    <?php
                    while ($fetchdata = mysqli_fetch_assoc($showResult)) {
                    ?>
                      <option value="<?php echo $fetchdata['cat_id'] ?>" <?php echo ($fetchdata['cat_id'] == $proRow['pro_category']) ? "selected" : "" ?>><?php echo $fetchdata['cat_name'] ?></option>
                    <?php
                    }
                    ?>
                  </select>
                </div>
                <div class="input-group input-group-outline my-3">
                  <input type="text" class="form-control" name="pprice" value="<?php echo $proRow['pro_price']; ?>">
                </div>
                <div class="input-group input-group-outline my-3">
                  <input type="text" class="form-control" name="pqty" value="<?php echo $proRow['pro_qty'];?>">
                </div>
                <div class="input-group input-group-outline mb-3">
                  <input type="file" class="form-control" name="pimg">
                </div>
                <img src="../assets/uploads/product/<?php echo $proRow['pro_img']?>" height="100px">
                <div class="text-center">
                  <button type="submit" name="submit" class="btn bg-gradient-primary w-100 my-4 mb-2">Add Product</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>

<?php
include "footer.php";
?>