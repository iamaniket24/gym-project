<?php
	
	session_start();

	include("db.php");

	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		$name=$_POST['name'];
		$email=$_POST['email'];
		$pass=$_POST['pass'];
		$c_pass=$_POST['c_pass'];
		
		
		if(!empty($email)&& !empty($pass)&& !is_numeric($email))
		{
			$query="insert into register(name,email,pass,c_pass)values('$name','$email','$pass','$c_pass')";
            mysqli_query($con,$query);
			echo "<script type='text/javascript'> alert('Successfully Registered')</script>";
		}
		else
		{
			echo "<script type='text/javascript'> alert('Please Enter some Valid Information')</script>";
		}
	}
?>











<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>register</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/register.css">

</head>
<body>

<?php

	include'condb.php';

if(isset($_POST['submit'])){
	$name=mysqli_real_escape_string($con,$_POST['name']);
	$email=mysqli_real_escape_string($con,$_POST['email']);
	$pass=mysqli_real_escape_string($con,$_POST['pass']);
	$c_pass=mysqli_real_escape_string($con,$_POST['c_pass']);



	

	$emailquery="select * from register where email='$email'";
	$query=mysqli_query($con,$emailquery);
	$emailcount=mysqli_num_rows($query);


 
		$insertquery="insert into users(name,email,pass,c_pass)
		 values('$name','$email','$pass','$c_pass')";
	  

		$iquery=mysqli_query($con,$insertquery);
	   
		 
}

?>



<section class="form-container">

   <form action="" method="post" enctype="multipart/form-data">
      <h3>register now</h3>
      <p>your name <span>*</span></p>
      <input type="text" name="name" placeholder="enter your name" required maxlength="50" class="box">
      <p>your email <span>*</span></p>
      <input type="email" name="email" placeholder="enter your email" required maxlength="50" class="box">
      <p>your password <span>*</span></p>
      <input type="password" name="pass" placeholder="enter your password" required maxlength="20" class="box">
      <p>confirm password <span>*</span></p>
      <input type="password" name="c_pass" placeholder="confirm your password" required maxlength="20" class="box">
     
      <input type="submit" value="register now" name="submit" class="btn">
    <p>already have an account <a href="login.php">login</a></p>
   </form>

</section>
















   
</body>
</html>