<?php

require("includes/conn.php");
	
	$query ="delete from customer where customer_id ={$_GET['id']}";
	mysqli_query($conn,$query);

	header("location:manage_customer.php");

?>