<?php

//start session
session_start();
include('connection.php');

//get details 
$id = $_SESSION['user_id'];
$username = $_POST['username'];

//run query and update username
$sql = "UPDATE users SET username='$username' WHERE user_id='$id'";
$result = mysqli_query($link, $sql);
if(!$result){
    echo "<div class='alert alert-danger'><strong>There was an error in updating new username in database</strong></div>";
}

?>