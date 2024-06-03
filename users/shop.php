<?php 
include "header.php";
if (isset($_GET['id'])) {
	$id = $_GET['id'];
	$query = "SELECT * FROM product WHERE pro_category = $id";
	$result = mysqli_query($con,$query);
}else{
	$query = "SELECT * FROM product";
	$result = mysqli_query($con,$query);
}
?>
		<!-- Start Hero Section -->
			<div class="hero">
				<div class="container">
					<div class="row justify-content-between">
						<div class="col-lg-5">
							<div class="intro-excerpt">
								<h1>Shop</h1>
							</div>
						</div>
						<div class="col-lg-7">
							
						</div>
					</div>
				</div>
			</div>
		<!-- End Hero Section -->

		

		<div class="untree_co-section product-section before-footer-section">
		    <div class="container">
		      	<div class="row">

		      		<!-- Start Column 1 -->
					<?php
					while ($fetchdata = mysqli_fetch_assoc($result)) {
					
					?>
					<div class="col-12 col-md-4 col-lg-3 mb-5">
						<a class="product-item" href="shop-detail.php?id=<?php echo $fetchdata['pro_id']?>">
							<img src="../assets/uploads/product/<?php echo $fetchdata['pro_img']?>" height="200px" width="200px" class="img-fluid product-thumbnail">
							<h3 class="product-title"><?php echo $fetchdata['pro_name']?></h3>
							<strong class="product-price">$<?php echo $fetchdata['pro_price']?></strong>

							<span class="icon-cross">
								<img src="images/cross.svg" class="img-fluid">
							</span>
						</a>
					</div>
					
					<?php }?> 
					<!-- End Column 1 -->

		      	</div>
		    </div>
		</div>

		<?php 
include "footer.php";
?>