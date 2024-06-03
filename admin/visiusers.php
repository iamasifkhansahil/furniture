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
    $query = "UPDATE `regester` SET `status` = '$status' where `regester`.`uid` = $id;";
    $result = mysqli_query($con,$query);
    header("location: users.php");
}

?>