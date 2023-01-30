<?php
	session_start();
	include ("connection.php");
?>

<?php

	//show cart body with data
	$status=$_GET['status'];
	$userid=$_SESSION['id'];
	
	$arr=[];
	
	$query="SELECT orders.order_id, orders.order_quentity, orders.order_total_price, orders.order_date, product.product_name, product.product_image, product.product_id FROM orders,product WHERE orders.order_user_id='$userid' AND orders.order_status='$status' AND orders.order_product_id=product.product_id";
	$result=mysqli_query($sql_connection,$query);
	while($row=mysqli_fetch_assoc($result)){
		$orderid=$row['order_id'];
		$image=$row['product_image'];
		$details="Product: ".$row['product_name']."<br>Quantity: ".$row['order_quentity']."<br>Total Price: LKR. ".$row['order_total_price']."<br>Order Date/Time: ".$row['order_date'];
		$proid=$row['product_id'];
		array_push($arr, [
		  'image'   => $image,
		  'orderid' => $orderid,
		  'details' => $details,
		  'proid' => $proid
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
		
		if($_GET['operation']== "delete"){
			$getorderid=$_GET['orderid'];
			
			$query3="DELETE FROM orders WHERE order_id='$getorderid'";
			$run3=mysqli_query($sql_connection,$query3);
		}
		
		if($_GET['operation']== "received"){
			$getorderid=$_GET['orderid'];
			
			$query4="UPDATE orders set order_status='received' WHERE order_id='$getorderid'";
			$run4=mysqli_query($sql_connection,$query4);
		}
	}
	


	if(isset($_GET['comment'])){
		$productid=$_GET['productid'];
		$rate=$_GET['rate'];
		$comment=$_GET['comment'];
		
		$query5="INSERT INTO feedback (feedback_product_id,feedback_user_id,feedback_comment,feedback_ratings) VALUES ('$productid','$userid','$comment','$rate')";
		$run5=mysqli_query($sql_connection,$query5);
		
	}
	
	
	
	
?>

