<?php
include "header.php";
$id = $_SESSION['userid'];
$query = "SELECT * FROM regester where uid = $id";
$result = mysqli_query($con, $query);
$fetchdata = mysqli_fetch_assoc($result);
if (isset($_POST['submit'])) {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);
    $address = trim($_POST['address']);
    $info = trim($_POST['profileInfo']);
    $img = trim($_FILES['uimg']['name']);
    $tmpname = trim($_FILES['uimg']['tmp_name']);
    $folder = "../assets/uploads/users/" . $img;
    move_uploaded_file($tmpname, $folder);

    if ($tmpname == "") {
        $updatequery = "UPDATE `regester` SET `uname`='$name',`uemail`='$email',
    `uphone`='$phone',`uaddress`='$address',`profile_info`='$info' WHERE uid = $id";
    } else {
        $updatequery = "UPDATE `regester` SET `uname`='$name',`uemail`='$email',
    `uphone`='$phone',`uaddress`='$address',`profile_info`='$info', `uprofile_img`='$img' WHERE uid = $id";
    }
    $result = mysqli_query($con, $updatequery);
    if ($result) {
        echo "<script>alert('Profile Updated');
        window.location.href = 'profile.php';
        </script>";
    } else {
        echo "<script>alert('Profile not Updated')</script>";
    }
}
?>
<form role="form" class="mt-2" method="post" enctype="multipart/form-data">
    <section style="background-color: #eee;">
        <div class="container mt-5">
            <div class="row">
                <div class="col-lg-4">
                    <div class="card mb-4">
                        <div class="card-body text-center">
                            <label for="pimg">
                                <img src="../assets/uploads/users/<?php echo ($fetchdata['uprofile_img'] == '') ? 'user.jpg' : $fetchdata['uprofile_img'] ?>" alt="avatar" class="rounded-circle img-fluid" style="width: 120px; height: 120px; border-radius: 50%;">
                            </label>
                            <input type="file" id="pimg" name="uimg" style="visibility: hidden;">
                            <h5 class="my-3"><?php echo $fetchdata['uname'] ?></h5>
                            <p class="text-muted mb-1"><?php echo $fetchdata['profile_info'] ?></p>
                            <p class="text-muted mb-4"><?php echo $fetchdata['uaddress'] ?></p>
                        </div>
                    </div>
                    <div class="card mb-4 mb-lg-0">
                        <div class="card-body p-0">
                            <ul class="list-group list-group-flush rounded-3">
                                <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                    <i class="fas fa-globe fa-lg text-warning"></i>
                                    <p class="mb-0">https://mdbootstrap.com</p>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                    <i class="fab fa-github fa-lg" style="color: #333333;"></i>
                                    <p class="mb-0">mdbootstrap</p>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                    <i class="fab fa-twitter fa-lg" style="color: #55acee;"></i>
                                    <p class="mb-0">@mdbootstrap</p>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                    <i class="fab fa-instagram fa-lg" style="color: #ac2bac;"></i>
                                    <p class="mb-0">mdbootstrap</p>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                    <i class="fab fa-facebook-f fa-lg" style="color: #3b5998;"></i>
                                    <p class="mb-0">mdbootstrap</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7 col-md-12 mb-4" style="background-color: white;">
                    <div class="row">
                        <div class="col-lg-7 col-md-12">
                            <div class="row">
                                <div class="input-group input-group-outline mb-3">
                                    <p class="mt-3 me-4">Full Name</p>
                                    <input type="text" class="form-control" name="name" placeholder="Name" value="<?php echo $fetchdata['uname'] ?>">
                                </div>
                            </div>
                            <div class="input-group input-group-outline mb-3">
                                <p class="mt-3 me-5">Email</p>
                                <input type="email" class="form-control" name="email" placeholder="Email" value="<?php echo $fetchdata['uemail'] ?>">
                            </div>
                            <div class="input-group input-group-outline mb-3">
                                <p class="mt-3 me-5">Mobile</p>
                                <input type="number" class="form-control" name="phone" placeholder="Phone" value="<?php echo $fetchdata['uphone'] ?>">
                            </div>
                            <div class="input-group input-group-outline mb-3">
                                <p class="mt-3 me-5">Address</p>
                                <input type="text" class="form-control" name="address" placeholder="Address" value="<?php echo $fetchdata['uaddress'] ?>">
                            </div>
                            <div class="input-group input-group-outline mb-3">
                                <p class="mt-3 me-3">About User</p>
                                <input class="form-control" name="profileInfo" placeholder="Profile Info" value="<?php echo $fetchdata['profile_info'] ?>">
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn bg-gradient-primary mb-5" name="submit">Save Changes</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</form>
<?php
include "footer.php";
?>