<?php
include "header.php";

$id = $_GET['id'];
if (isset($_POST['submit'])) {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);
    $address = trim($_POST['address']);
    $info = trim($_POST['profileInfo']);
    $img = trim($_FILES['pimg']['name']);
    $tmpimage = trim($_FILES['pimg']['tmp_name']);
    $folder = "../assets/uploads/users/".$img;
    move_uploaded_file($tmpimage, $folder);

    if ($tmpimage != "") {
        $query = "UPDATE `regester` SET `uname`='$name',`uemail`='$email',
    `uphone`='$phone',`uaddress`='$address',`profile_info`='$info', `uprofile_img`='$img' WHERE uid = $id";
    } else {
        $query = "UPDATE `regester` SET `uname`='$name',`uemail`='$email',
    `uphone`='$phone',`uaddress`='$address',`profile_info`='$info' WHERE uid = $id";
    }
    $result = mysqli_query($con,$query);
    if ($result) {
        echo "<script>alert('Profile Updated');
        window.location.href = 'profile.php';
        </script>";
      } else {
        echo "<script>alert('Profile not Updated')</script>";
      }
}


$showQuery = "SELECT * FROM regester where uid = $id";
$showResult = mysqli_query($con, $showQuery);
$fetchdata = mysqli_fetch_assoc($showResult);
?>
<main class="main-content  mt-0">
    <div class="page-header align-items-start min-vh-80">

        <div class="container my-auto">
            <div class="row">
                <div class="col-lg-8 col-md-12 col-12 mx-auto">
                    <div class="card z-index-0 fadeIn3 fadeInBottom">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                            <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
                                <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">Update Profile</h4>

                            </div>
                        </div>
                        <div class="card-body">
                            <form role="form" method="post" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-lg-5 col-md-12 d-flex justtify-content-center align-items-center gap-4" style="flex-direction: column">
                                        <img src="../assets/uploads/users/<?php echo $fetchdata['uprofile_img'] ?>" width="100%" style="border-radius: 20px">
                                        <input type="file" name="pimg">
                                    </div>
                                    <div class="col-lg-7 col-md-12">
                                        <div class="input-group input-group-outline mb-3">
                                            <input type="text" class="form-control" name="name" placeholder="Name" value="<?php echo $fetchdata['uname'] ?>">
                                        </div>
                                        <div class="input-group input-group-outline mb-3">
                                            <input type="email" class="form-control" name="email" placeholder="Email" value="<?php echo $fetchdata['uemail'] ?>">
                                        </div>
                                        <div class="input-group input-group-outline mb-3">
                                            <input type="number" class="form-control" name="phone" placeholder="Phone" value="<?php echo $fetchdata['uphone'] ?>">
                                        </div>
                                        <div class="input-group input-group-outline mb-3">
                                            <input type="text" class="form-control" name="address" placeholder="Address" value="<?php echo $fetchdata['uaddress'] ?>">
                                        </div>
                                        <div class="input-group input-group-outline mb-3">
                                            <input class="form-control" name="profileInfo" placeholder="Profile Info" value="<?php echo $fetchdata['profile_info'] ?>">
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-lg bg-gradient-primary btn-lg w-100 mt-4 mb-0" name="submit">Update Profile</button>
                                        </div>
                                    </div>
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