$(document).ready(function() {
    
    $('body').on('click', '#logout', function(e){
        e.preventDefault();
        $.post(
            '/authorize/exit/', 
            {
                
            },
            function(){ 
                //$('#logout').empty();
                $('#personal').css('display','none');
                $('#login-form-div').css('display','block');
                $('#userEmail').empty();
                
            }
        ); 
        window.location = '/';
    });
    
    $(".fancybox").fancybox();
    
 /*-------------Product---------------------------*/ 
   
   
    $('.update-prod').on('click',(function(e){
        e.preventDefault();
       
     $('.updateProd').click(function(){
         
       $('#data span[id=id]').html($(this).find('td:eq(0)').text());
       $('#data input[id=name]').val($(this).find('td:eq(1)').text());
       $('#data input[id=price]').val($(this).find('td:eq(4)').text());
       $('#data input[id=total]').val($(this).find('td:eq(5)').text());
       $('#data textarea').val($(this).find('td:eq(2)').text());
      }); 
  }));  
      
   $('#data input[id=saveChange]').on('click',(function(e){
    e.preventDefault();

   $.post(
        '/admin/updateProd', 
        { 
            id:  $('#data span[id=id]').text(),
            name: $('#data input[id=name]').val(),
            description: $('#data textarea').val(),
            price: $('#data input[id=price]').val(),
            total: $('#data input[id=total]').val(),
        },
        function(data){
            if(data.error !== undefined) {
                $('#error').html(data.error);
            }
            else {
                 var $changeStr = $('.base tr#' + data.id +'');
                 $changeStr.each(function(indx){
                        $(this).find('td:eq(1)').text(data.name);
                        $(this).find('td:eq(2)').text(data.description);
                        $(this).find('td:eq(4)').text(data.price);
                        $(this).find('td:eq(5)').text(data.total);
                 });
                 $.fancybox.close();
            }
        },
        'json'
   );
}));
 
 
 $('a#deleteProd').on('click',(function(e){
       e.preventDefault();
       var href = $(this).attr('href');
       var lastIndex = href.lastIndexOf('/');
       var idNum = href.substring(lastIndex+1); 

    $('.deleteProd').click(function(){
        
       var currentStr = $(this);  
       $.post(
            '/admin/deleteProd', 
            { 
                id: idNum, 
            },
            function(data){
                if(data.error !== undefined) {
                    $('#error').html(data.error);
                }
                else if(data == true)
                {   
                   currentStr.remove();
                   $('#error').empty();
                }
            },
            'json'
        );
    }); 
}));   
 
 /*-------------User---------------------------*/
 
   $('#editUser').on('click',(function(e){
      e.preventDefault();
        $.post(
            '/admin/updateUser', 
            { 
                id: $('#userId').text(),
                firstName: $('input[name=firstName]').val(),
                sureName: $('input[name=sureName]').val(),
                lastName: $('input[name=lastName]').val(),
                login: $('input[name=login]').val(),
                password: $('input[name=password]').val(),
                email: $('input[name=email]').val(),
                phone: $('input[name=phone]').val(),
                address: $('input[name=address]').val(),
                role_id: $("#idRole option:selected").val(),
            },
            function(data){
                if(data.error !== undefined) {
                    $('#error').html(data.error);
                }
                else if(data == true)
                {  
                   window.location = '/admin/users';
                }
            },
            'json'
        );
   }));
   
$('a#deleteUser').on('click',(function(e){
       e.preventDefault();
       var href = $(this).attr('href');
       var lastIndex = href.lastIndexOf('/');
       var idNum = href.substring(lastIndex+1); 

    $('.deleteUser').click(function(){
        
       var currentStr = $(this);  
       $.post(
            '/admin/deleteUser', 
            { 
                id: idNum, 
            },
            function(data){
                if(data.error !== undefined) {
                    $('#error').html(data.error);
                }
                else if(data == true)
                {   
                   currentStr.remove();
                   $('#error').empty();
                }
            },
            'json'
        );
    }); 
}));
        
/*------------------News---------------------------*/  
 
    $('#addNews').on('click',(function(e){
      e.preventDefault();
        $.post(
            '/admin/addNewsFunc', 
            { 
                title: $('input[name=title]').val(),
                keywords: $('input[name=keywords]').val(),
                description: $('input[name=description]').val(),
                anons: $('textarea[name=anons]').val(),
                text: $('textarea[name=text]').val(),
                date: $('input[name=date]').val(),
            },
            function(data){
                if(data.error !== undefined) {
                    $('#error').html(data.error);
                }
                else if(data == true)
                {  
                   window.location = '/admin/news';
                }
            },
            'json'
        );
   }));
   
$('a#deleteNews').on('click',(function(e){
       e.preventDefault();
       var href = $(this).attr('href');
       var lastIndex = href.lastIndexOf('/');
       var idNum = href.substring(lastIndex+1); 

    $('.deleteNews').click(function(){
        
       var currentStr = $(this);  
       $.post(
            '/admin/deleteNews', 
            { 
                id: idNum, 
            },
            function(data){
                if(data.error !== undefined) {
                    $('#error').html(data.error);
                }
                else if(data == true)
                {   
                   currentStr.remove();
                   $('#error').empty();
                }
            },
            'json'
        );
    }); 
}));    
});
