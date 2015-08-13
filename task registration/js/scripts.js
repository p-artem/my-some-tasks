$(document).ready(function() {
        
    $('#resetBtn').click(function() {
        $('#defaultForm').data('bootstrapValidator').resetForm(true);
        $('select[name=country] :selected').attr('selected',false);
        $('select[name=city]').empty();
        $('#alertContainer').hide();
    });
    
});

function getval(val){
    var select = val.value;
    if(select === 'none'){
        $('select[name=city]').empty();
    }else{  
        $.get(
            '/ajax.php', 
            "country_id=" + val.value,
            function(data){
                console.log(data);
                if(data == false) {
                    
                    $('#alertContainer')
                            .addClass('alert-warning').attr('style','padding:5px 15px')
                            .html('Предупреждение. Ошибка вывода данных по городам')
                            .show();
                }
                else {
                    $('select[name="city"]').html(data);
                }
            },
         'json'
        );
    }
                    
};

//function checkLogin(login) {
//    $.post(
//        '/ajax.php', 
//        { 
//            check_login: login,
//        },
//        function(data){
//            if(data == false) {
//                console.log('ошибка логина');
//                $('input[name=username]').parent().parent().addClass('has-success');
//                //$('#errorReg').html(data.error);
//            }
//            else {
//                console.log(data);
//                $('input[name=username]').parent().parent().addClass('has-error');
//            }
//        }
//    );
//}

$(document).ready(function() {
    $('#defaultForm').bootstrapValidator({
        message: 'This value is not valid',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            username: {
                message: 'The username is not valid',
                validators: {
                    notEmpty: {
                        message: 'Поле обязательно для заполенния'
                    },
                        remote: {
                        type: 'POST',
                        url: 'ajax.php',
                        message: 'Такой логин существует',
                        delay: 2000,
                    },
                    stringLength: {
                        min: 6,
                        max: 30,
                        message: 'Поле должно содержать от 6 до 20 символов'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z0-9]+$/,
                        message: 'Поле может содержать только буквы латинского алфавита и цифры.'
                    }
                }
            },
            password: {
                validators: {
                    notEmpty: {
                        message: 'Поле обязательно для заполенния'
                    },
                    stringLength: {
                        min: 6,
                        max: 20,
                        message: 'Поле должно содержать от 6 до 20 символов'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z0-9]+$/,
                        message: 'Поле может содержать только буквы и цифры латинского алфавита'
                    }
                }
            },
            confirmPassword: {
                validators: {
                    notEmpty: {
                        message: 'Поле обязательно для заполенния'
                    },
                    identical: {
                        field: 'password',
                        message: 'Пароли не совпадают'
                    },
                }
            },
            phoneNumber: {
                validators: {
                    notEmpty: {
                        message: 'Поле обязательно для заполенния'
                    },
                    regexp: {
                        regexp: /^(\+[3,8]{2}( )\(\d{3}\)( )(\d{3}-\d{2}-\d{2}))|(^((\(\d{3}\)|\d{3})( )(\d{3} \d{2} \d{2})))$/g,
                        message: 'Формат +38 (ХХХ) ХХХ-ХХ-ХХ, (ХХХ) ХХХ ХХ ХХ, ХХХ ХХХ ХХ ХХ'
                    }
                }
            },
            invite: {
                message: 'The username is not valid',
                validators: {
                    notEmpty: {
                        message: 'Поле обязательно для заполенния'
                    },
                    regexp: {
                        regexp: /^[0-9]{6}$/,
                        message: 'Поле может содержать только цифры длиной 6 символов'
                    }
                }
            },
        }
    })
    .on('success.form.bv', function(e) {
            e.preventDefault();

            var $form = $(e.target);
            var bv = $form.data('bootstrapValidator');

            $.post(
            $form.attr('action'), 
            { 
                login: $('input[name=username]').val(),
                pass: $('input[name=password]').val(),
                repeat_pass: $('input[name=confirmPassword]').val(),
                phone: $('input[name=phoneNumber]').val(),
                country: $('select[name="country"]').val(),
                city: $('select[name="city"').val(),
                invite: $('input[name=invite]').val(),
            },
            function(data){
                console.log(data);
                if(!data) {
                    $('#alertContainer')
                            .addClass('alert-danger').attr('style','padding:5px 15px')
                            .html('Ошибка регистрации')
                            .show();
                }
                else {
                    $('#myModalBox').modal({
                                backdrop: false,
                                keyboard: true
                            });
                            $("#myModalBox").modal('show');
                            setTimeout(function(){$("#myModalBox").modal('hide')},1800);
                }
                $form.bootstrapValidator('resetForm', true);
                $('select[name=country] :selected').attr('selected',false);
                $('select[name=city]').empty();
                }
            );
        });
        
});
