<?php
session_start();
include('connection.php');
$missingUsername = '<p><strong>Please enter a username!</strong></p>';
$missingEmail = '<p><strong>Please enter a email!</strong></p>';
$InvalidEmail = '<p><strong>Please enter a valid email address!</strong></p>';
$missingPassword = '<p><strong>Please enter a Password!</strong></p>';
$InvalidPassword = '<p><strong>Please enter valid Password:It should include atleast one capital letter, one number and contain atleast 8 characters!</strong></p>';
$differentPassword = '<p><strong>Password didn\'t match!</strong></p>';
$missingPassword2 = '<p><strong>Confirm your Password</strong></p>';
$errors = '';

//<!--Get details: username, password, email-->
if(empty($_POST["username"])){
    $errors .= $missingUsername;
}
else{
    $username = filter_var($_POST["username"],FILTER_SANITIZE_STRING);
}
if(empty($_POST["email"])){
    $errors .= $missingEmail;
}
else{
    $email = filter_var($_POST["email"],FILTER_SANITIZE_EMAIL);
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $errors .= $InvalidEmail;
    }
}
if(empty($_POST["password"])){
    $errors .= $missingPassword;
}
elseif(!(strlen($_POST["password"])>7 and preg_match('/[A-Z]/',$_POST["password"]) and  preg_match('/[0-9]/',$_POST["password"]))){
    $errors .= $InvalidPassword;
}
else{
    $password = filter_var($_POST["password"],FILTER_SANITIZE_STRING);
    
    if(empty($_POST["password2"])){
        $errors .= $missingPassword2;
    }
    else{
        $password2 = filter_var($_POST["password2"],FILTER_SANITIZE_STRING);
        if($password !== $password2){
            $errors .= $differentPassword;
        }
    }
}

//<!--Print Errors-->
if($errors){
    $resultMessage = '<div class="alert alert-danger">' . $errors . '</div>';
    echo $resultMessage;
    exit;
}

//<!--variables for query and checking existence of record-->

$username = mysqli_real_escape_string($link,$username);
$email = mysqli_real_escape_string($link,$email);
$password = mysqli_real_escape_string($link,$password);
$password = hash('sha256', $password);

$sql = "SELECT * FROM users WHERE username = '$username'";
$result = mysqli_query($link,$sql);
if(!$result){
    echo "<div class='alert alert-danger'>Error in running query</div>";
}
$results = @mysqli_num_rows($result);
if($results){
    echo "<div class='alert alert-danger'>This username already exists, Do you want to login?</div>";
    exit;
}

$sql = "SELECT * FROM users WHERE email = '$email'";
$result = mysqli_query($link,$sql);
if(!$result){
    echo "<div class='alert alert-danger'>Error in running query</div>";
}
$results = @mysqli_num_rows($result);
if($results){
    echo "<div class='alert alert-danger'>This email already registered, Please use another email!</div>";
    exit;
}

//<!--create activation code-->
$activationKey = bin2hex(openssl_random_pseudo_bytes(16));

//<!--Enter details in table-->
$sql = "INSERT INTO users (username,email,password,activation) VALUES ('$username', '$email', '$password', '$activationKey')";

$result = mysqli_query($link, $sql);
if(!$result){
    echo "<div class='alert alert-danger'>Error in Inserting data in table</div>";
    exit;
}

//<!--send user mail for activation-->
$message = "Please click on this to activate your account:\n\n";
$message .= "http://localhost/saurabh/HTML/NotePad/activate.php?email=".urlencode($email)."&key=$activationKey";
if(mail($email, 'Confirm your Registraion', $message, 'From:'.'expert.saurabh178@gmail.com')){
    echo "<div class='alert alert-success'>Thank you for registering!<br>Confirmation email has been sent to ".$email.". Please activate account to proceed further.</div>";
}
else{
    echo "<div class='alert alert-danger'><strong>Failed to send, Please try again later!</strong></div>";
}


?>
