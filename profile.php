<?php
session_start();
if(!isset($_SESSION['user_id'])){
    header('location: index.php');
    
}

include('connection.php');
$user_id = $_SESSION['user_id'];

//run query to get username and email
$sql = "SELECT * FROM users WHERE user_id='$user_id'";
$result = mysqli_query($link, $sql);

$count = mysqli_num_rows($result);
if($count == 1){
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $username = $row['username'];
    $email = $row['email'];
}
else{
    echo "There was an error in getting username and email from database";
}

?>

<!DOCTYPE html>

<html>
<head lang="en">
    <title>Profile</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <style>
        #container {
            margin-top: 100px;
        }
        
        #allNote, #done,#notePad {
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
        
        tr {
            cursor: pointer;
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
            <li class="active"><a href="#">Profile</a></li>
            <li><a href="#">Help</a></li>
            <li><a href="#">Contact us</a></li>
            <li ><a href="loggedin.php">My Notes</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li><a href="#">Logged in as <b>
                <?php 
                echo $username;
                ?>
                </b></a></li>
            <li><a href="index.php?logout=1">Log out</a></li>
        </ul>
    </div>
        
    </div>
    </nav>
    
    <!--Container-->
    
    <div class="container" id="container">
        <div class="row">
            <div class="col-md-offset-3 col-md-6">
                <h2>User Profile:</h2>
                <div class="table-reponsive">
                    <table class="table table-hover table-condensed table-bordered">
                        <tr data-target="#updateusername" data-toggle="modal">
                            <td>Username</td>
                            <td>
                            <?php
                                echo $username;
                            ?>
                            </td>
                        </tr>
                        <tr data-target="#updateemail" data-toggle="modal">
                            <td>Email</td>
                            <td>
                            <?php 
                            echo $email;
                            ?>
                            </td>
                        </tr>
                        <tr data-target="#updatepassword" data-toggle="modal">
                            <td>Password</td>
                            <td>Hidden</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
    
    <!--Update Username-->
    
    <form method="post" id="updateusernameform">
      <div class="modal" id="updateusername" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button class="close" data-dismiss="modal">
                &times;
              </button>
              <h4 id="myModalLabel">
                Edit Username
              </h4>
          </div>
          <div class="modal-body">
              
              <!--update username message-->
              <div class="updateusernamemessage"></div>
              
            <div class="form-group">
                <label for="username" >Username:</label>
                <input class="form-control" type="text" name="username" id="username" maxlength="30" value="<?php echo $username; ?>">
            </div>
             
              
          <div class="modal-footer">
              <input class="btn green" name="signup" type="submit" value="Submit">
            <button type="button" class="btn btn-default" data-dismiss="modal">
              Cancel
            </button>
          </div>
      </div>
  </div>
  </div>
  </div>
    </form>
    
    <!--Update Email-->
    
    <form method="post" id="updateemailform">
      <div class="modal" id="updateemail" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button class="close" data-dismiss="modal">
                &times;
              </button>
              <h4 id="myModalLabel">
                Enter new Email:
              </h4>
          </div>
          <div class="modal-body">
              
            <!--update email message-->
              <div id="updateemailmessage"></div>
              
            <div class="form-group">
                <label for="email" >Email:</label>
                <input class="form-control" type="email" name="email" id="email" maxlength="50" value="<?php echo $email; ?>">
            </div>
             
              
          <div class="modal-footer">
              <input class="btn green" name="signup" type="submit" value="Submit">
            <button type="button" class="btn btn-default" data-dismiss="modal">
              Cancel
            </button>
          </div>
      </div>
  </div>
  </div>
  </div>
    </form>
    
    
    <!--Update Password-->
    
    <form method="post" id="updatepasswordform">
      <div class="modal" id="updatepassword" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button class="close" data-dismiss="modal">
                &times;
              </button>
              <h4 id="myModalLabel">
                Enter Current and New Password:
              </h4>
          </div>
          <div class="modal-body">
              
            <!--update password message-->
              <div id = "updatepasswordmessage"></div>
              
            <div class="form-group">
                <label for="currentpassword" class="sr-only">Your Current Password:</label>
                <input class="form-control" type="password" name="currentpassword" id="password" maxlength="30" placeholder="Your Current Password">
            </div>
              <div class="form-group">
                <label for="password" class="sr-only">Choose a Password:</label>
                <input class="form-control" type="password" name="password" id="password" maxlength="30" placeholder="Choose a Password">
            </div>
              <div class="form-group">
                <label for="password2" class="sr-only">Confirm Password:</label>
                <input class="form-control" type="password" name="password2" id="password2" maxlength="30" placeholder="Confirm Password">
            </div>
             
              
          <div class="modal-footer">
              <input class="btn green" name="signup" type="submit" value="Submit">
            <button type="button" class="btn btn-default" data-dismiss="modal">
              Cancel
            </button>
          </div>
      </div>
  </div>
  </div>
  </div>
    </form>
    
    
    <div class="footer">
        <div class="container">
            <p>onlinenotes.sau.com Copyright &copy; 2016-<?php $today = date("Y"); echo $today?>.</p>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="profile.js">
    </script>
</body>
</html>