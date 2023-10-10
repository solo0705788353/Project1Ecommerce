<!DOCTYPE>
<?php 
include("functions/functions.php");

?>
<html>
	<head>
		<title>Results for search:
		<?php 
		//fetches the name for user search
		if(isset($_GET['search'])){
				
				$search_query = $_GET['user_query'];
				echo $search_query;
			}
		
		
		?>
		
		</title>
		
		<link rel="stylesheet" href="styles/style.css" media="all">
	</head>

<body>
	<div class="main_wrapper">
		<div class="header_wrapper">
			<a href="index.php"><img id="logo"src="images/logo.png"></a>
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
			
				<div id="shopping_cart">
					<span style="float:right; font-size:18px; padding:5px; line-height:40px;">
					Welcome guest! <b style="color:yellow;"> Shopping cart -</b>Total Items:<?php total_items(); ?> Total Price: Kshs. <?php total_price(); ?> <a href="cart.php" style="color:yellow;">Go To Cart</a>
					</span>
				</div>
				
				<div id="products_box">
				<?php 
				if(isset($_GET['search'])){
				
				$search_query = $_GET['user_query'];
				
				$get_pro = "select * from products where product_keywords like '%$search_query%'";
	
				$run_pro = mysqli_query($con, $get_pro);
				
				//shows no product of such keyword available
				$count_pro_search = mysqli_num_rows($run_pro);
						
					
					if ($count_pro_search==0){
							echo "<h2 style='padding:20px;'> $count_pro_search  $search_query products found! Try searching using another keyword...</h2>
							<img src='images/404.png' height='180' width='180'>
							";
						}
				
				
	
				while($row_pro=mysqli_fetch_array($run_pro)){
				$pro_id = $row_pro['product_id'];
				$pro_cat = $row_pro['product_cat'];
				$pro_brand = $row_pro['product_brand'];
				$pro_title = $row_pro['product_title'];
				$pro_price = $row_pro['product_price'];
				$pro_image = $row_pro['product_image'];
				
				echo "
					<div id='single_product'>
					
						<h3>$pro_title</h3>
						<img src='admin_area/product_images/$pro_image' width='180' height='180'/>
						<p><b> Kshs. $pro_price </b></p>
						
						<a href='details.php?pro_id=$pro_id'><button style='float:left;'>Details</button></a>
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