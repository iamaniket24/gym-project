<?php
session_start();

include("db.php");

if($_SERVER['REQUEST_METHOD'] == "POST")
{
    $email= $_POST['email'];
	$pass= $_POST['pass'];

if(!empty($email) && !empty($pass) && !is_numeric($email))
{
    $query = "select*from register where email ='$email' limit 1";
    $result= mysqli_query($con, $query);

    if($result)
         {
            if($result && mysqli_num_rows($result) > 0)
            {
                $user_data= mysqli_fetch_assoc($result);

                if($user_data['pass']== $pass)
                {
                    header("location: index.php");
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
   <link rel="stylesheet" href="css/login.css">

</head>
<body>


</div>

<section class="form-container">

   <form action="" method="post" enctype="multipart/form-data">
      <h3>login now</h3>
      <p>your email <span>*</span></p>
      <input type="email" name="email" placeholder="enter your email" required maxlength="50" class="box">
      <p>your password <span>*</span></p>
      <input type="password" name="pass" placeholder="enter your password" required maxlength="20" class="box">
      <input type="submit" value="login now" name="submit" class="btn">
      <p> login to admin<a href="admin.php">login admin</a></p>
      <p> login to trainer<a href="trainer.php">login trainer</a></p>

   </form>

</section>

















   
</body>
</html>