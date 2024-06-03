<?php
include "../users/config.php";
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "DELETE FROM product where pro_id = $id";
    $result = mysqli_query($con,$query);
    header("location: products.php");   
}
?>