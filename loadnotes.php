<?php
session_start();
include('connection.php');

//get user_id
$user_id = $_SESSION['user_id'];

//run query to delete empty note
$sql = "DELETE FROM notes WHERE note=''";
$result = mysqli_query($link, $sql);
if(!$result){
    echo "<div class='alert alert-warning><strong>Error: An error occured.></strong></div>";
    exit;
}

//query for notes corresponding to user_id
$sql = "SELECT * FROM notes WHERE user_id='$user_id' ORDER BY time DESC";
$result = mysqli_query($link, $sql);
if($result){
    
    if(@mysqli_num_rows($result) > 0){
        
    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
        
        //storing variable
        $note_id = $row['id'];
        $note = $row['note'];
        $time = $row['time'];
        $time = date("F d,Y h:i:s A", $time);
        
        echo "
            <div class='note'>
            <div class='col-xs-5 col-sm-3 delete'>
                <button class='btn-lg btn-danger' style='100%'>Delete</button>
            </div>
            <div class='noteheader' id='$note_id'>
            <div class='text'>$note</div>
            <div class='timetext'>$time</div>
            </div>
            </div>";
        }
    }
    else{
        echo "<div class='alert alert-warning'><strong>You have not created any note yet.</strong></div>";
        exit;
        }
}
else{
    echo "<div class='alert alert-warning><strong>An Error occured.></strong></div>";
    exit;
}



?>