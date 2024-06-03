<?php
include "header.php";
if (isset($_POST['searchInput'])) {
    $searchInput = trim($_POST['searchInput']);
    $query = "SELECT * FROM `regester` WHERE uname LIKE '%$searchInput%' AND role = 0;";
    $result = mysqli_query($con, $query);
} else {
    $query = "SELECT * FROM `regester` WHERE role = 0";
    $result = mysqli_query($con, $query);
}
?>

<div class="container-fluid py-4">
    <div class="top mb-2">
        <form class="input-group input-group-outline w-100" style="position: relative; left: 890px;" method="post">
            <label class="form-label">Search here...</label>
            <input type="text" class="form-control" name="searchInput">
        </form>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize bg-gradient-primary ps-3">Users table</h6>
                    </div>
                </div>
                <div class="card-body px-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-md font-weight-bolder opacity-7">
                                        Users</th>
                                    <th class="text-center text-uppercase text-secondary text-md font-weight-bolder opacity-7">
                                        Phone Number</th>
                                    <th class="text-center text-uppercase text-secondary text-md font-weight-bolder opacity-7">
                                        Status</th>
                                    <th class="text-center text-uppercase text-secondary text-md font-weight-bolder opacity-7">
                                        Created Date</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                while ($fetchdata = mysqli_fetch_assoc($result)) {
                                ?>
                                    <tr>
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div>
                                                    <img src=" ../assets/uploads/users/<?php echo $fetchdata['uprofile_img'] ?>" class="avatar avatar-sm me-3 border-radius-lg" alt="user1">
                                                </div>
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm"><?php echo $fetchdata['uname'] ?></h6>
                                                    <p class="text-xs text-secondary mb-0"><?php echo $fetchdata['uemail'] ?></p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            <span class="text-sm text-secondary mb-0"><?php echo $fetchdata['uphone'] ?></span>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            <a href="visiusers.php?id=<?php echo $fetchdata['uid'] ?>&status=<?php echo $fetchdata['status'] ?>" class="button-30 <?php echo ($fetchdata['status'] == 1) ? 'bg-success' : 'bg-danger' ?>" role="button"><?php echo ($fetchdata['status'] == 1 ? "Active" : "Deactive") ?></a>
                                        </td>
                                        <td class="align-middle text-center">
                                            <span class="text-secondary text-xs font-weight-bold"><?php echo $fetchdata['created_date'] ?></span>
                                        </td>

                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<?php
include "footer.php";
?>