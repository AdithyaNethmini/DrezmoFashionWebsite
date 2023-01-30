<?php

    include ("connection.php");
        $username=$_GET["username"];
        $password=$_GET["password"];
		
        
   
    include ("connection.php");

	$id="";$usertype="";
	
    $query="SELECT user_id,user_password,user_type FROM user WHERE user_name='$username'";
    $result = mysqli_query($sql_connection,$query);
        while($row = mysqli_fetch_assoc($result)){
            $id = $row['user_id'];
			$pwd=$row['user_password'];
			$usertype=$row['user_type'];
        }
        
		if($id==""){
			echo "wrong username";
		}elseif($password != $pwd){
			echo "wrong password";
		}else{
			session_start();
			$_SESSION["loggedin"] = true;
            $_SESSION["id"] = $id;
            $_SESSION["username"] = $username;
			
			if($usertype=="admin"){
				echo "admin";
			}elseif($usertype=="customer"){
				echo "customer";
			}else{
				echo "staff";
			}
		}
		
		
		
	
    mysqli_close($sql_connection);

?>