
//Ajax call for Signup Form
$("#signupform").submit(function(event){
    event.preventDefault();
    var datatopost = $(this).serializeArray();
    $.ajax({
        url: "signup.php",
        type: "POST",
        data: datatopost,
        success: function(data){
            if(data){
                $("#signupmessage").html(data);
            }
        },
        error: function(){
                $("#signupmessage").html("<div class='alert alert-danger'>There was error, Please try again later.</div>");
        }
    });
});

//Ajax call for Login Form
$("#loginform").submit(function(event){
    event.preventDefault();
    var datatopost = $(this).serializeArray();
    $.ajax({
        url: "login.php",
        type: "POST",
        data: datatopost,
        success: function(data){
            if(data == "success"){
                window.location="loggedin.php";
            }
            else{ $("#loginmessage").html(data);
            }
        },
        error: function(){
                $("#loginmessage").html("<div class='alert alert-danger'>There was error, Please try again later.</div>");
        }
    });
    
});

//Ajax call for Forgot Password
$("#forgotpasswordform").submit(function(event){
    event.preventDefault();
    var datatopost = $(this).serializeArray();
    $.ajax({
        url: "forgot-password.php",
        type: "POST",
        data: datatopost,
        success: function(data){
            $("#forgotpasswordmessage").html(data);
        },
        error: function(){
                $("#forgotpasswordmessage").html("<div class='alert alert-danger'>There was error, Please try again later.</div>");
        }
    });
    
});