<?php
session_start();
include('connection.php');

//get user_id and time
$user_id = $_SESSION['user_id'];
$time = time();

//run query to create new note
$sql = "INSERT INTO notes (user_id, note, time) VALUES ('$user_id', '', '$time')";
$result = mysqli_query($link, $sql);
if(!$result){
    echo "error";
}
else{
    
    //mysqli_insert_id returns auto generated id used in last query
    echo mysqli_insert_id($link);
}

?>