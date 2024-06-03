<?php
include "../users/config.php";
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $status = $_GET['status'];

    if ($status == 1) {
        $status = 0;
    }else{
        $status = 1;
    }
    $query = "UPDATE product SET pro_status = $status where pro_id = '$id'";
    $result = mysqli_query($con,$query);
    header("location: products.php");
}

?>