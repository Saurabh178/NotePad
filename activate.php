<?php
session_start();
include("connection.php");

?>

<!DOCTYPE html>

<html>
<head lang="en">
    <title>Account Activation</title>
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
                <h1>Account Activation Message</h1>
                <?php
                //checking email or activation key
if(!isset($_GET['email']) || !isset($_GET['key'])){
    echo "<div class='alert alert-danger act'><strong>ERROR: Please click on link to activate it.</strong></div>";
    exit;
}

//setting variable and running query
$email = $_GET['email'];
$key = $_GET['key'];

$email = mysqli_real_escape_string($link, $email);
$key = mysqli_real_escape_string($link, $key);

$sql = "UPDATE users SET activation='activated' WHERE (email='$email' AND activation='$key') LIMIT 1";
$result = mysqli_query($link, $sql);

//if query is successfull
if(mysqli_affected_rows($link) == 1){
    echo "<div class='alert alert-success act'><strong>Account has been activated.</strong></div>";
    echo "<div class='act'><a href='index.php' type= 'button' class='btn btn-lg'>Login</a></div>";
}
else{
    echo "<div class='alert alert-danger act'><strong>Your account can not be activated.</strong></div>";
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