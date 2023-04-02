<?php 
session_start();

  include("connection.php");
  include("functions.php");

  if($_SERVER['REQUEST_METHOD'] == "POST")
  {
    $user_name = $_POST['user_name'];
    $password = $_POST['password'];

    if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
    {
      
      $user_id = random_num(20);
      $query = "INSERT INTO USERS (USER_ID,USER_NAME,PASSWORD)
                VALUES('$user_id','$user_name','$password')";  

      mysqli_query($con,$query);

      header("Location:login.php");  
    }else
    {
      echo"Please enter some valid information";  
    }
  }
?>
 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Signup</title>
    <style>
      a{
        color:white;
        text-decoration: none;
       }
 </style>
</head>
<body>

<div id="box">
   <form method="POST" action="">
       <div style="font-size:20px; margin:10px 0 10px 0; color:white;">Sign Up</div>
        
       <label>Username</label><br>
       <input id="text" type="text" name="user_name"><br><br>
       <label>Password</label><br>
       <input id="text" type="password" name="password"><br><br>

       <input id="button" type="submit" value="Sign Up"><br><br>
       <a href="login.php" class="link">Click to Login</a>
   </form>
</div>
    
</body>
</html>