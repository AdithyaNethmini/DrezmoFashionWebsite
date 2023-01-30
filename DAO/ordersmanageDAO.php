<?php
	session_start();
	include ("connection.php");
?>

<?php


	$status=$_GET['status'];
	$userid=$_SESSION['id'];
	
	$arr=[];
	
	$query="SELECT * FROM orders WHERE order_status='$status'";
	$result=mysqli_query($sql_connection,$query);
	while($row=mysqli_fetch_assoc($result)){
        $orderid=$row['order_id'];
		$productdetails="Product: ".$row['order_product_id']."<br>Size: ".$row['order_product_size']."<br>Quentity: ".$row['order_quentity']."<br>Total Price: LKR.".$row['order_total_price']."<br>Date: ".$row['order_date'];
		$shippingdetails="Customer ID: ".$row['order_user_id']."<br>Name: ".$row['order_shipping_name']."<br>Address:".$row['order_shipping_address']."<br>Contact: ".$row['order_shipping_contact'];
		array_push($arr, [
		  'orderid' => $orderid,
		  'productdetails' => $productdetails,
		  'shippingdetails' => $shippingdetails
		]);
	}
	
	echo json_encode($arr);
	
?>

<?php

	if(isset($_GET['operation'])){
		if($_GET['operation']== "cancel"){
			$getorderid=$_GET['orderid'];
			
			$query2="UPDATE orders set order_status='canceled' WHERE order_id='$getorderid'";
			$run2=mysqli_query($sql_connection,$query2);
		}

        if($_GET['operation']== "ship"){
			$getorderid=$_GET['orderid'];
			
			$query2="UPDATE orders set order_status='shipped' WHERE order_id='$getorderid'";
			$run2=mysqli_query($sql_connection,$query2);
		}
		
	}
	


	
	
	
	
	
?>

