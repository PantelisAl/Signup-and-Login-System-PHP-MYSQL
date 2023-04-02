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

          $query = "SELECT * 
                    FROM USERS 
                    where USER_NAME = '$user_name' limit 1";
          $result = mysqli_query($con, $query);

          if($result)
          {
              if($result && mysqli_num_rows($result) > 0)
              {

                  $user_data = mysqli_fetch_assoc($result);
                  
                  if($user_data['PASSWORD'] === $password)
                  {

                      $_SESSION['user_id'] = $user_data['USER_ID'];
                      header("Location: index.php");
                      die;
                  }
              }
          }
          
          echo "wrong username or password!";
      }else
      {
          echo "wrong username or password!";
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
    <title>Login</title>
  
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
       <div style="font-size:20px; margin:10px 0 10px 0; color:white;">Login</div>
        
       <label>Username</label><br>
       <input id="text" type="text" name="user_name"><br><br>
       <label>Password</label><br>
       <input id="text" type="password" name="password"><br><br>

       <input id="button" type="submit" value="Login"><br><br>
       <a href="signup.php">Click to Sign Up</a>
   </form>
</div>    
</body>
</html>