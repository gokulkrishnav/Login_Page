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
    <title>My website</title>
</head>
<body>


<h1>Welcome to the index page</h1>
<br>
<div><h2>Hello,</h2> <h1><?php echo $user_data['user_name']; ?></h1></div>
<br><br>

<a href="logout.php"><button>Logout</button> </a>
    
</body>
</html>