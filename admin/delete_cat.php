<?php

require("includes/conn.php");
	$query ="delete from catagory where cat_id ='$id'";
	mysqli_query($conn,$query);

	$id=$_GET['id'];
	alert($id);
	$query2 ="delete from products where cat_id ='$id'";
	mysqli_query($conn,$query2);
alert($id);
	header("location:manage_category.php");

?>