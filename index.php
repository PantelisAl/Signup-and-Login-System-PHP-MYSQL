<?php 
    session_start();

    include("connection.php");
    include("functions.php");
  
    $user_data = check_login($con);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>My website</title>
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
       <div style="font-size:20px; margin:10px 0 10px 0; color:white;">Hello,<?php echo $user_data['USER_NAME']; ?></div>
        
      
       <a href="logout.php">Click to Logout</a>
   </form>
</div>
    
</body>
</html>