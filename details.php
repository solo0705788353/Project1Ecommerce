<!DOCTYPE>
<?php 
include("functions/functions.php");

?>
<html>
	<head>
		<title>details</title>
		
		<link rel="stylesheet" href="styles/style.css" media="all">
	</head>

<body>
	<div class="main_wrapper">
		<div class="header_wrapper">
			<img id="logo"src="images/logo.png">
			<img id="banner" src="images/ad_banner.png">
			
		</div>
		
		<div class="menubar">
			<ul id="menu">
				<li><a href="index.php">Home</a></li>
				<li><a href="all_products.php">All products</a></li>
				<li><a href="customer/my_account.php">My Account</a></li>
				<li><a href="#">Sign Up</a></li>
				<li><a href="cart.php">Shopping Cart</a></li>
				<li><a href="#">Contact Us</a></li>
			</ul>
			<div id="form">
				<form method="get" action="results.php" enctype="multipart/form-data">
					<input type="text" name="user_query" placeholder="Search a product.." />
					<input type="submit" name="search" value="go"/>
				</form>
			</div>
			
			
		</div>

		<div class="content_wrapper">
			<div id="sidebar">
				<div id="sidebar_title">Categories</div>
				<ul id="cats">
					<?php getCats(); ?>
				</ul>
				
				<div id="sidebar_title">Brands</div>
				<ul id="cats">
					<?php getBrands(); ?>
				</ul>
			</div>
			
			
			<div id="content_area">
				<?php cart(); ?>
			
				<div id="shopping_cart">
					<span style="float:right; font-size:18px; padding:5px; line-height:40px;">
					Welcome guest! <b style="color:yellow;"> Shopping cart -</b>Total Items:<?php total_items(); ?> Total Price: Kshs. <?php total_price(); ?> <a href="cart.php" style="color:yellow;">Go To Cart</a>
					</span>
				</div>
				
				<div id="products_box">
				<?php 
				if(isset($_GET['pro_id'])){
				$product_id = $_GET['pro_id'];
				
				$get_pro = "select * from products where product_id='$product_id'";
				
				$run_pro = mysqli_query($con, $get_pro);
				
				while($row_pro=mysqli_fetch_array($run_pro)){
					$pro_id = $row_pro['product_id'];
					//$pro_cat = $row_pro['product_cat'];
					$pro_brand = $row_pro['product_brand'];
					$pro_title = $row_pro['product_title'];
					$pro_price = $row_pro['product_price'];
					$pro_image = $row_pro['product_image'];
					$pro_desc = $row_pro['product_desc'];
					
					echo "
						<div id='single_product'>
						
							<h3>$pro_title</h3>
							<img src='admin_area/product_images/$pro_image' width='400' height='400'/>
							<p><b> Price: Kshs. $pro_price </b></p>
							<p>$pro_desc</p>
							
							<a href='index.php'><button style='float:left;'>Go back</button></a>
							<a href='index.php?add_cart=$pro_id'><button style='float:right;'>Add to cart</button></a>
						</div>
					
					";
					}
				}

				
				
				
				?>	
					
				
				</div>
			</div>
		</div>
		
		<div id="footer"> 
		<h2 style="text-align:center; padding-top:30px;">&copy; <a href="#">Kibichii Washington</a></h2>
		
		</div>
	</div>
	
	
</body>
</html>