<!DOCTYPE>

<?php 
include("includes/db.php");

?>

<html>
	<head>
		<title>Inserting Product</title>
		<script src="js/tinymce.min.js"></script>
		<script>tinymce.init({ selector:'textarea' });</script>
	</head>
	<body bgcolor="skyblue">
		<form action="insert_product.php" method="post" enctype="multipart/form-data">
		
			<table align="center" width="800" border="2" bgcolor="orange">
			
				<tr align="center">
					<td colspan="7"><h2>Insert New Product Here</h2></td>
				</tr>
				<tr>
				<td align="right">Product Title:</td>
				<td><input type="text" name="product_title" size="60" required /></td>
				</tr>
				<tr>
				<td align="right">Product Category:</td>
				<td>
					<select name="product_cat">
						<option>Select a category</option>
						<?php
						
	
						$get_cats = "select * from categories";         
						$run_cats = mysqli_query($con, $get_cats);
	
						while ($row_cats=mysqli_fetch_array($run_cats)){
	
							$cat_id = $row_cats['cat_id'];
							$cat_title = $row_cats['cat_title'];
	
						echo "<option value='$cat_id'>$cat_title</option>";
	
						}
						?>
					</select>
				</td>
				</tr>
				<tr>
				<td align="right">Product Brand:</td>
				<td>
				<select name="product_brand">
					<option>Select a Brand</option>
					<?php 
					
						$get_brands = "select * from brands";         
						$run_brands = mysqli_query($con, $get_brands);
	
						while ($row_brands=mysqli_fetch_array($run_brands)){
	
						$brand_id = $row_brands['brand_id'];
						$brand_title = $row_brands['brand_title'];
	
						echo "<option value='$brand_id'>$brand_title</option>";
	
						}
					
					
					?>
				</select>
				</td>
				
				</tr>
				<tr>
				<td align="right">Product Image:</td>
				<td><input type="file" name="product_image" required /></td>
				</tr>
				<tr>
				<td align="right">Product Price:</td>
				<td><input type="text" name="product_price" required/></td>
				</tr>
				<tr>
				<td align="right">Product Description:</td>
				<td><textarea name="product_desc" cols="30" rows="10"> </textarea></td>
				</tr>
				<tr>
				<td align="right">Product Keywords:</td>
				<td><input type="text" name="product_keywords" size="50" required/></td>
				</tr>
				<tr align="center">
				<td colspan="7"><input type="submit" name="insert_post" value="insert product now"/></td>
				</tr>
			</table>
			
		</form>
	
	</body>


</html>
<?php
	
	if(isset($_POST['insert_post'])){
		
		//getting data from fields
		$product_title = $_POST['product_title'];
		$product_cat = $_POST['product_cat'];
		$product_brand = $_POST['product_brand'];
		$product_price = $_POST['product_price'];
		$product_desc = $_POST['product_desc'];
		$product_keywords = $_POST['product_keywords'];
		
		//getting the image from the field
		$product_image = $_FILES['product_image']['name'];
		$product_image_tmp = $_FILES['product_image']['tmp_name'];
		
		//uploading the image to root directory
		move_uploaded_file($product_image_tmp,"product_images/$product_image");
		
		$insert_product = "insert into products (product_cat, product_brand, product_title, product_price, product_desc, product_image, product_keywords) values ('$product_cat','$product_brand','$product_title','$product_price','$product_desc','$product_image','$product_keywords')";
		//query to insert product to database
		$insert_pro = mysqli_query($con, $insert_product);
		
		//notifies the admin that product has been added
		if($insert_pro){
			echo "<script>alert('Info: product has been added!')</script>";
			//redirects admin to same page to prevent redundancy
			echo "<script>window.open('insert_product.php','_self')</script>";
		}
		
	}

?>