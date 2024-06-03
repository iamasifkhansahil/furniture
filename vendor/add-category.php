<?php
include "header.php";
if (isset($_POST['submit'])) {
  $name = trim($_POST['cname']);

  $img = trim($_FILES['cimg']['name']);
  $tmpimage = trim($_FILES['cimg']['tmp_name']);
  $folder = "../assets/uploads/category/".$img;
  move_uploaded_file($tmpimage, $folder);
  $query = "INSERT INTO `category`(`cat_name`, `cat_img`) VALUES ('$name','$img')";
  $result = mysqli_query($con, $query);
  if ($result) {
    echo "<script>alert('Category Uploaded');
    window.location.href = 'category.php';
    </script>";
  }else{
    echo "<script>alert('Category not Uploaded')</script>";
  }
}
?>

<main class="main-content  mt-0">
  <div class="page-header align-items-start min-vh-80">

    <div class="container my-auto">
      <div class="row">
        <div class="col-lg-4 col-md-8 col-12 mx-auto">
          <div class="card z-index-0 fadeIn3 fadeInBottom">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
                <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">Add Categories</h4>

              </div>
            </div>
            <div class="card-body">
              <form role="form" class="text-start" method="post" enctype="multipart/form-data">
                <div class="input-group input-group-outline my-3">
                  <label class="form-label">Enter Category Name.</label>
                  <input type="text" class="form-control" name="cname">
                </div>
                <div class="input-group input-group-outline mb-3">
                  <input type="file" class="form-control" name="cimg">
                </div>
                <div class="text-center">
                  <button type="submit" name="submit" class="btn bg-gradient-primary w-100 my-4 mb-2">Add Category</button>
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