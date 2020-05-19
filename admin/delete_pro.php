<?php

require("includes/conn.php");
	
	$query ="delete from products where pro_id ={$_GET['id']}";
	mysqli_query($conn,$query);

	header("location:manage_product.php");

?>