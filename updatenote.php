<?php
session_start();
include('connection.php');

//get the id of note from ajax call
$id = $_POST['id'];
$note = $_POST['note'];
$time = time();

//query to update the notes table
$sql = "UPDATE notes SET note='$note',time='$time' WHERE id='$id'";
$result = mysqli_query($link, $sql);
if(!$result){
    echo 'error';
}

?>