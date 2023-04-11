<?php

session_start();

include("connection.php");
include("functions.php");

if($_SERVER['REQUEST_METHOD'] == "POST"){
    //SOMETHING WAS POSTED
    $user_name = $_POST['user_name'];
    $password = $_POST['password'];

    if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
    {
        //Read from database
        
        $query = "select * from users where user_name = '$user_name' limit 1";
        // to save
        $result = mysqli_query($con, $query);

        if($result)
        {
            if($result && mysqli_num_rows($result) > 0)
             {
               $user_data = mysqli_fetch_assoc($result);
               if($user_data['password'] === $password)
               {
                $_SESSION['user_id'] = $user_data['user_id'];
                header("Location: index.php");     //if input info is correct in loginpage we enter index page
                die;

               }
   
             }
        }
        echo " Wrong user name or password!";
        
    } else
    {
        echo " Please enter some valid information";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div id="box">

    <form method="post">
        <div style="font-size: 20px; margin :10px; color:white">Login</div>
        <input id="text" type="text" name="user_name"><br><br>
        <input id="text" type="password" name = "password"><br><br>
        <input id="button" type="submit" value="Login"><br><br>
        
        <a href="signup.php">Click to Signup</a><br><br>
    </form>
    </div>
    
</body>
</html>