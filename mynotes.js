$(function(){
    
   //define variable
    var datatopost = $(this).serializeArray();
    var activeNote = 0;
    var editMode = false;
    //Ajax call for loadnotes.php
    $.ajax({
        url: "loadnotes.php",
        data: datatopost,
        success: function(data){
            $("#notes").html(data);
            clickonNote();
            clickonDelete();
            
        },
        error: function(){
            $('#alertContent').text("There was an error with the Ajax Call. Please try again later.");
                    $("#alert").fadeIn();
            }
    });
    
    //Ajax call for createnote.php
    $('#addNote').click(function(){
        $.ajax({
            url: "createnote.php",
            data: datatopost,
            success: function(data){
                if(data == 'error'){
                    $('#alertContent').text("There was an issue in inserting a new note.");
                    $('#alert').fadeIn();
                }
                else{
                    
                    //update activeNote to id of new note
                    activeNote = data;
                    $('textarea').val("");
                    
                    //show & hide elements
                    showHide(['#notePad','#allNote'], ['#addNote','#notes','#edit','#done']);
                    $("textarea").focus();
                }
            },
            error: function(){
            $('#alertContent').text("There was an error with the Ajax Call. Please try again later.");
                    $("#alert").fadeIn();
            }
        });
    });
    
    //ajax call for updatenote.php
    $('textarea').keyup(function(){
       
        //ajax call to update the task of activenote id
        $.ajax({
            url: "updatenote.php",
            type: "POST",
            //send current note content with its id to php file
            data: {
                note: $(this).val(),
                id: activeNote
            },
            success: function(datareturn){
                if(datareturn == 'error'){
                    $('#alertContent').text("There was an issue in updating the note in database!");
                    $("#alert").fadeIn();
                }
            },
            error: function(){
                 $('#alertContent').text("There was an error with the Ajax Call. Please try again later.");
                    $("#alert").fadeIn();
            }
        });
        
    });
    
    //click on All Note
    $('#allNote').click(function(){
       $.ajax({
          url: "loadnotes.php",
           success: function(data){
               $('#notes').html(data);
               showHide(['#notes','#addNote','#edit'], ['#allNote','#notePad']);
               clickonNote();
               clickonDelete();
           },
           error: function(){
               $('#alertContent').text("There was an error with the Ajax Call. Please try again later.");
                    $("#alert").fadeIn();
           }
           
       });
    });
    
    //to click on textarea to edit it
    function clickonNote(){
        $('.noteheader').click(function(){
       if(!editMode){
           
           //update activeNote variable
           activeNote = $(this).attr('id');
           
           //fill textarea
           $('textarea').val($(this).find('.text').text());
            showHide(['#notePad','#allNote'], ['#addNote','#notes','#edit','#done']);
             $("textarea").focus();
       }
        
        
    });
    }
    
    //click on delete
    function clickonDelete(){
        $('.delete').click(function(){
            var deleteButton = $(this);
            
            //send ajax call to deletenote.php
            $.ajax({
            url: "deletenote.php",
            type: "POST",
            //send id to php file to be deleted
            data: {
                id: deleteButton.next().attr('id')
            },
            success: function(datareturn){
                if(datareturn == 'error'){
                    $('#alertContent').text("There was an issue in deleting the note from database!");
                    $("#alert").fadeIn();
                }
                else{
                    
                    //remove containing div
                    deleteButton.parent().remove();
                    
                }
            },
            error: function(){
                 $('#alertContent').text("There was an error with the Ajax Call. Please try again later.");
                    $("#alert").fadeIn();
            }
        });
        });
    }
    
    
    //click on edit 
    $('#edit').click(function(){
        
        //switch to edit mode
        editMode = true;
        
        //reduce the width of note
        $('.noteheader').addClass("col-xs-7 col-sm-9");
        
        //show & hide elements
        showHide(['#done','.delete'],['#edit']);
        
    });
    
    //click on done button
    $('#done').click(function(){
        
        //switch to non edit mode
        editMode = false;
        $('.noteheader').removeClass("col-xs-7 col-sm-9");
        
        //show & hide elements
        showHide(['#edit'],[this,'.delete']);
    });
    
    
    //show hide element
    function showHide(array1, array2){
        for(i=0; i<array1.length; i++){
            $(array1[i]).show();
        }
        
        for(i=0; i<array2.length; i++){
            $(array2[i]).hide();
        }
    }
});
