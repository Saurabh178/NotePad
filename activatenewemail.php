<?php
session_start();
include("connection.php");

?>

<!DOCTYPE html>

<html>
<head lang="en">
    <title>Change Email</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <style>
        h1{
            color: blue;
            text-align: center;
        }
        .account{
            border: 2px solid black;
            margin-top: 50px;
            border-radius: 15px;
        }
        .act{
            text-align: center;
        }
        
        
    </style>
    
</head>
    
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-offset-1 col-sm-10 account">
                <h1>Email Avtivation</h1>
                <?php
                //checking email, newemail or activation key
if(!isset($_GET['email']) || !isset($_GET['key']) || !isset($_GET['email'])){
    echo "<div class='alert alert-danger act'><strong>ERROR: Please click on link to update email.</strong></div>";
    exit;
}

//setting variable and running query
$email = $_GET['email'];
$newemail = $_GET['newemail'];
$key = $_GET['key'];

$email = mysqli_real_escape_string($link, $email);
$newemail = mysqli_real_escape_string($link, $newemail);
$key = mysqli_real_escape_string($link, $key);

$sql = "UPDATE users SET email='$newemail',activation2='0' WHERE (email='$email' AND activation2='$key') LIMIT 1";
$result = mysqli_query($link, $sql);

//if query is successfull
if(mysqli_affected_rows($link) == 1){
    session_destroy();
    setcookie('rememberme','',time()-3600);
    echo "<div class='alert alert-success act'><strong>Email updated successfully.</strong></div>";
    echo "<div class='act'><a href='index.php' type= 'button' class='btn btn-lg'>Login</a></div>";
}
else{
    echo "<div class='alert alert-danger act'><strong>Your email can not be updated,Please try again later.</strong></div>";
}

                ?>
        </div>
    </div>
    </div>
    
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="index.js"></script>
</body>
</html>