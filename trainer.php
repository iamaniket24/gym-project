<?php
session_start();

include("db.php");

if($_SERVER['REQUEST_METHOD'] == "POST")
{
    $username= $_POST['username'];
	$password= $_POST['password'];

if(!empty($username) && !empty($password) && !is_numeric($username))
{
    $query = "select*from trainer where username ='$username' limit 1";
    $result= mysqli_query($con, $query);

    if($result)
         {
            if($result && mysqli_num_rows($result) > 0)
            {
                $user_data= mysqli_fetch_assoc($result);

                if($user_data['password']== $password)
                {
                    header("location: t_dashboard.html");
                    die;
                }
            }
         }
         echo "<script type='text/javascript'> alert('Wrong username or password')</script>";

    }
    else{
        echo "<script type='text/javascript'> alert('Wrong username or password')</script>";
    }
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>login</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/admin.css">

</head>
<body>

<section class="form-container">

   <form action="" method="post" enctype="multipart/form-data">
      <h3>trainer Login </h3>
      <p>your username <span>*</span></p>
      <input type="text" name="username" placeholder="enter your username" required maxlength="50" class="box">
      <p>your password <span>*</span></p>
      <input type="password" name="password" placeholder="enter your password" required maxlength="20" class="box">
      <input type="submit" value="login now" name="submit" class="btn">
      <p>login to user...<a href="login.php">user Login</a></p>
      <p>login to admin...<a href="admin.php">admin Login</a></p>



     
   </form>

</section>















   
</body>
</html>