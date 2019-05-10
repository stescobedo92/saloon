jQuery(function($){
    $("#salones_rating").bind( "rated", function(){
        $(this).rateit( "readonly", true );

        var form                    =   {
            action:                     "r_rate_salones",
            rid:                        $(this).data('rid'),
            rating:                     $(this).rateit( 'value' )
        };

        $.post( salones_obj.ajax_url, form, function(data){

        });
    });

    $("#salones-form").on( "submit", function(e){
        e.preventDefault();

        $(this).hide();
        $("#salones-status").html('<div class="alert alert-info text-center">Please wait!</div>');

        var form                =   {
            action:                 "r_submit_user_salones",
            content:                tinymce.activeEditor.getContent(),
            title:                  $("#r_inputTitle").val(),
            precio:            $("#r_inputPrecio").val(),
            capacidad:               $("#r_inputCapacidad").val(),
            servicios:                  $("#r_inputServicios").val(),
            localizacion:              $("#r_inputLocalizacion").val()
        };

        $.post( salones_obj.ajax_url, form ).always(function(data){
            if( data.status == 2 ){
                $('#salones-status').html('<div class="alert alert-success">salones submitted successfully!</div>');
            }else{
                $('#salones-status').html(
                    '<div class="alert alert-danger">Unable to submit salones. Please fill in all fields.</div>'
                );
                $("#salones-form").show();
            }
        });
    });

    $("#register-form").on( 'submit', function(e){
        e.preventDefault();

        $("#register-status").html(
            '<div class="alert alert-info">Please wait while your account is being created.</div>'
        );
        $(this).hide();

        var form                =   {
            action:                                     "salones_create_account",
            name:                                       $("#register-form-name").val(),
            username:                                   $("#register-form-username").val(),
            email:                                      $("#register-form-email").val(),
            pass:                                       $("#register-form-password").val(),
            confirm_pass:                               $("#register-form-repassword").val(),
            _wpnonce:                                   $("#_wpnonce").val()
        };

        $.post( salones_obj.ajax_url, form ).always(function(response){
            if( response.status == 2 ){
                $("#register-status").html('<div class="alert alert-success">Account created!</div>');
                location.href           =   salones_obj.home_url;
            }else{
                $("#register-status").html(
                    '<div class="alert alert-danger">' +
                    'Unable to create an account. Please try again with a different username/email.' +
                    '</div>'
                );
                $("#register-form").show();
            }
        });
    });

    $('#login-form').on( 'submit', function(e){
        e.preventDefault();

        $("#login-status").html('<div class="alert alert-info">Please wait while we log you in.</div>');
        $(this).hide();

        var form                                    =   {
            _wpnonce:                                   $("#_wpnonce").val(),
            action:                                     "salones_user_login",
            username:                                   $("#login-form-username").val(),
            pass:                                       $("#login-form-password").val()
        };

        $.post( salones_obj.ajax_url, form ).always(function(data){
            if( data.status == 2 ){
                $("#login-status").html('<div class="alert alert-success">Success!</div>');
                location.href                       =   salones_obj.home_url;
            }else{
                $("#login-status").html(
                    '<div class="alert alert-danger">' +
                    'Unable to login. Please try again with a different username/password.' +
                    '</div>'
                );
                $("#login-form").show();
            }
        });
    });
});