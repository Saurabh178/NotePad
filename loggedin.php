<?php
session_start();
if(!isset($_SESSION['user_id'])){
    header('location: index.php');
    
}

?>

<!DOCTYPE html>

<html>
<head lang="en">
    <title>My Notes</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <style>
        #container {
            margin-top: 120px;
        }
        
        #allNote, #done,#notePad,.delete {
            display: none;
        }
        
        .buttons {
            margin-bottom: 20px;
        }
        
        textarea {
            width: 100%;
            max-width: 100%;
            font-size: 16px;
            line-height: 1.5em;
            border-left-width: 20px;
            border-color: chartreuse;
            color: chartreuse;
            background-color: azure;
            padding: 10px;
        }
        
        .noteheader{
            border:1px solid grey;
            border-radius: 10px;
            background: white;
            margin-bottom: 10px;
            cursor: pointer;
            padding: 0px 10px;
            
        }
        .text{
            font-size: 20px;
            overflow: hidden;
            white-space: nowrap;
            text-overflow: ellipsis;
        }
        .timetext{
            overflow: hidden;
            white-space: nowrap;
            text-overflow: ellipsis;
        }
        
        
    </style>
    
</head>
    
<body>
    
    <!--Navigation Bar-->
    
    <nav role="navigation" class="navbar navbar-custom navbar-fixed-top">
    <div class="container-fluid">
            
    <div class="navbar-header">
        <a class="navbar-brand">Online Notes</a>
        <button type="button" class="navbar-toggle" data-target="#navbarCollapse" data-toggle="collapse">
            <span class="sr-only">Toggle Navigation</span>
            
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
    </div>
        
    <div class="navbar-collapse collapse" id="navbarCollapse">
        <ul class="nav navbar-nav">
            <li><a href="profile.php">Profile</a></li>
            <li><a href="#">Help</a></li>
            <li><a href="#">Contact us</a></li>
            <li class="active"><a href="#">My Notes</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li><a href="#">Logged in as <b>
                <?php 
                echo $_SESSION['username'];
                ?>
                </b></a></li>
            <li><a href="index.php?logout=1">Log out</a></li>
        </ul>
    </div>
        
    </div>
    </nav>
    
    <!--Container-->
    
    <div class="container" id="container">
        
        <!--alert message-->
        <div id="alert" class="alert alert-danger collapse">
        <a class="close" data-dismiss="alert">
        &times;    
        </a>
        <p id="alertContent"></p>
        </div>
        
        <div class="row">
            <div class="col-md-offset-3 col-md-6">
                <div class="buttons">
                    <button id="addNote" type="button" class="btn btn-info btn-lg">Add Notes</button>
                    <button id="edit" type="button" class="btn btn-info btn-lg pull-right">Edit</button>
                    <button id="done" type="button" class="btn btn- btn-lg green pull-right">Done</button>
                    <button id="allNote" type="button" class="btn btn-info btn-lg">All Notes</button>
                </div>
                
                <div id="notePad">
                    <textarea rows="10">
                    </textarea>
                </div>
                
                <div id="notes" class="notes">
                    
                </div>
            </div>
        </div>
    </div>
    
    <!--Footer-->
    
    <div class="footer">
        <div class="container">
            <p>onlinenotes.sau.com Copyright &copy; 2016-<?php $today = date("Y"); echo $today?>.</p>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="mynotes.js"></script>
    
</body>
</html>