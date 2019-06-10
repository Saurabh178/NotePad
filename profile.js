
//ajax call for updateusername.php
$("#updateusernameform").submit(function(event){
    event.preventDefault();
    var datatopost = $(this).serializeArray();
    $.ajax({
        url: "updateusername.php",
        type: "POST",
        data: datatopost,
        success: function(data){
            if(data){
                $("#updateusernamemessage").html(data);
            }
            else{
                location.reload();
            }
        },
        error: function(){
             $("#updateusernamemessage").html("<div class='alert alert-danger'>There was error, Please try again later.</div>");
        }
    });
});


//ajax call for updatepassword.php
$("#updatepasswordform").submit(function(event){
    event.preventDefault();
    var datatopost = $(this).serializeArray();
    $.ajax({
        url: "updatepassword.php",
        type: "POST",
        data: datatopost,
        success: function(data){
            if(data){
                $("#updatepasswordmessage").html(data);
            }
        },
        error: function(){
             $("#updatepasswordmessage").html("<div class='alert alert-danger'>There was error, Please try again later.</div>");
        }
    });
});


//ajax call for updateemail.php
$("#updateemailform").submit(function(event){
    event.preventDefault();
    var datatopost = $(this).serializeArray();
    $.ajax({
        url: "updateemail.php",
        type: "POST",
        data: datatopost,
        success: function(data){
            if(data){
                $("#updateemailmessage").html(data);
            }
        },
        error: function(){
             $("#updateemailmessage").html("<div class='alert alert-danger'>There was error, Please try again later.</div>");
        }
    });
});