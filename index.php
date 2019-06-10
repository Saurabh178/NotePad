<?php
session_start();
include('connection.php');

//logout
include('logout.php');

//call rememberme
include('remember.php');

?>


<!DOCTYPE html>

<html>
<head lang="en">
    <title>Online Notes</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    
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
            <li class="active"><a href="#">Home</a></li>
            <li><a href="#">Help</a></li>
            <li><a href="#">Contact us</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li><a href="#loginModal" data-toggle="modal">Login</a></li>
        </ul>
    </div>
        
    </div>
    </nav>
    
    <div class="jumbotron" id="myContainer">
        <h1>Online Notes Website</h1>   
        <p>Your Notes with you wherever you go.</p>
        <p>Easy to use, protects all your notes!</p>
        <button type="button" class="btn btn-lg green signup" data-target="#signupModal" data-toggle="modal">Sign up-It's free</button>
    </div>
    
    <!--Sign Up Form-->
    
    <form method="post" id="signupform">
      <div class="modal" id="signupModal" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button class="close" data-dismiss="modal">
                &times;
              </button>
              <h4 id="myModalLabel">
                Sign up today and Start using our Online Notes App! 
              </h4>
          </div>
          <div class="modal-body">
              
              
              <!--Signup Message using PHP-->
              <div id="signupmessage"></div>
              
            <div class="form-group">
                <label for="username" class="sr-only">Username:</label>
                <input class="form-control" type="text" name="username" id="username" placeholder="Username" maxlength="30">
            </div>
             <div class="form-group">
                <label for="email" class="sr-only">Email:</label>
                <input class="form-control" type="email" name="email" id="email" placeholder="Email" maxlength="50">
            </div>
            <div class="form-group">
                <label for="password" class="sr-only">Choose a Password:</label>
                <input class="form-control" type="password" name="password" id="password" placeholder="Choose a Password" maxlength="30">
            </div>
             <div class="form-group">
                <label for="password2" class="sr-only">Confirm Password:</label>
                <input class="form-control" type="password" name="password2" id="password2" placeholder="Confirm Username" maxlength="30">
          </div>
              
          <div class="modal-footer">
              <input class="btn green" name="signup" type="submit" value="Sign Up">
            <button type="button" class="btn btn-default" data-dismiss="modal">
              Cancel
            </button>
          </div>
      </div>
  </div>
  </div>
  </div>
    </form>
    
    <!--Login Form-->
    <form method="post" id="loginform">
      <div class="modal" id="loginModal" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button class="close" data-dismiss="modal">
                &times;
              </button>
              <h4 id="myModalLabel">
                Login: 
              </h4>
          </div>
          <div class="modal-body">
              
              
              <!--Login Message using PHP-->
              <div id="loginmessage"></div>
              
            <div class="form-group">
                <label for="email" class="sr-only">Email:</label>
                <input class="form-control" type="email" name="loginemail" id="loginemail" placeholder="Email" maxlength="50">
            </div>
             <div class="form-group">
                <label for="password" class="sr-only">Password:</label>
                <input class="form-control" type="password" name="loginpassword" id="loginpassword" placeholder="Password" maxlength="30">
            </div>
            <div class="checkbox">
                <label>
                    <input type="checkbox" name="rememberme" id="rememberme">Remember me
                </label> 
                <a class="pull-right" style="cursor:pointer" href="#forgotpasswordModal" data-toggle="modal" data-dismiss="modal">
                    Forgot Password?   
                </a>
            </div>
              
          <div class="modal-footer">
              
              <input class="btn green" name="login" type="submit" value="Login">
            <button type="button" class="btn btn-default" data-dismiss="modal">
              Cancel
            </button>
              <button type="button" class="btn btn-default pull-left" data-dismiss="modal" data-target="#signupModal" data-toggle="modal">
              Register
            </button>
          </div>
      </div>
  </div>
  </div>
  </div>
    </form>
    
    
    <!--Forgot Password-->
    <form method="post" id="forgotpasswordform">
      <div class="modal" id="forgotpasswordModal" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button class="close" data-dismiss="modal">
                &times;
              </button>
              <h4 id="myModalLabel">
                Forgot Password?Enter your Email Address: 
              </h4>
          </div>
          <div class="modal-body">
              
            <!--Forgot Message using PHP-->
              <div id="forgotpasswordmessage"></div>
              
            <div class="form-group">
                <label for="email" class="sr-only">Email:</label>
                <input class="form-control" type="email" name="forgotemail" id="forgotemail" placeholder="Email" maxlength="50">
            </div>
              
          <div class="modal-footer">
              
              <input class="btn green" name="forgotpassword" type="submit" value="Submit">
            <button type="button" class="btn btn-default" data-dismiss="modal">
              Cancel
            </button>
              <button type="button" class="btn btn-default pull-left" data-dismiss="modal" data-target="#signupModal" data-toggle="modal">
              Register
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
    <script src="index.js"></script>
</body>
</html>