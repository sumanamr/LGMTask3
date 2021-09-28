<?php
include_once 'connection.php';

	if(!empty($_POST['username']) && !empty($_POST['password'])) {  
	   $username=$_POST['username'];  
	   $password=$_POST['password'];  
	
	   $query=mysqli_query($conn,"SELECT * FROM admin WHERE username='".$username."' AND password='".$password."'");  
	   $numrows=mysqli_num_rows($query);  
	   if($numrows!=0)  
	   {  
	   while($row=mysqli_fetch_assoc($query))  
	   {  
	   $dbusername=$row['username'];  
	   $dbpassword=$row['password'];  
	   }  
	 
	   if($username == $dbusername && $password == $dbpassword)  
	   {  
		echo "<script>alert('Login Succesfull!!');window.location.href='admin_home.php';</script>";  
	 }  
	   } else {  
		echo "<script>alert('Invalid username or password');window.location.href='admin_login.php';</script>";
	   }  
	 
   } else {  
	   echo "<script>alert('All fields are required!');window.location.href='admin_login.php';</script>";  
   }  
?>