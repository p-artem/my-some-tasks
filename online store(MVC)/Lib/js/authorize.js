$(document).ready(function() {
    $('#regAccount').on('click', function(e){
        e.preventDefault();
       
        $.post(
            '/authorize/register', 
            { 
                login:  $('input[name=loginReg]').val(),
                email:      $('input[name=emailReg]').val(), 
                password:   $('input[name=passwordReg]').val(),
            },
            function(data){
                if(data.error !== undefined) {
                    $('#errorReg').html(data.error);
                }
                else {
                    $('#personal').css('display','block');
                    $('#login-form-div').css('display','none');
                    $('#boxes').fadeOut(1000);
                    $('#mask').fadeOut(1000);
                    $('#error').empty();
                }
            },
            'json'
        );
    });
    
    $('#registerForm').click(function(e) {
    e.preventDefault();
    var id = $(this).attr('href');
    var maskHeight = $(document).height();
    var maskWidth = $(window).width();
    $('#mask').css({'width':maskWidth,'height':maskHeight});
    $('#mask').fadeIn(1000); 
    $('#mask').fadeTo("slow",0.6);
    $('#boxes').fadeIn(1000); 
    var winH = $(window).height();
    var winW = $(window).width();
    $(id).css('top',  winH/2-$(id).height()/2);
    $(id).css('left', winW/2-$(id).width()/2);
    $(id).fadeIn(2000); 
    });
    
    $('.window .close').click(function (e) { 
    e.preventDefault();
    $('#mask, .window').hide();
    }); 
    $('#mask').click(function () {
    $(this).hide();
    $('.window').hide();
    });
    
        
    $('#loginForm').on('click', 'input[name=login]', function(e){
        e.preventDefault();
        $.post(
            '/authorize/login', 
            { 
                email:      $('input[name=email]').val(), 
                password:   $('input[name=password]').val(),
                save:       $('#save_checkbox').is(':checked')
            },
            function(data){ 
                if(data.error !== undefined) {
                    $('#error').html(data.error);
                }
                else {
                    $('#personal').css('display','block');
                    $('#login-form-div').css('display','none');
                    $('#error').empty();
                   
                    if(data.role_id == 1) {
                         $('#admin_href').show();
                    }
                }
            },
            'json'
        );
    });
    
    $('body').on('click', '#logout', function(e) {
        e.preventDefault();
        $.post(
            '/authorize/exit/', 
            {
                
            },
            function(){ 
                //$('#logout').empty();
                $('#personal').css('display','none');
                $('#login-form-div').css('display','block');
                $('#admin_href').css('display','none');
                //$('#userEmail').empty();
            }
        ); 
    });
});