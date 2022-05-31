function login(form){
    $('#message').removeClass();
    $('#message').html('Sending data to login...');
    $('#message').addClass('alert alert-info');
    $('#message').slideDown();
    form.btnLogin.disabled = true;

    $.ajax({
        type: 'post',
        url: '/radius?login',
        dataType: 'json',
        data: {
            user: form.user.value,
            pass: form.pass.value
        },
        success: function(res){
            console.log(res);
            if(res.message != 'OK'){
                $('#message').html(res.message);
                $('#message').addClass('alert alert-danger');

                setTimeout(function(){
                    $('#message').slideUp();
                    form.reset();
                    form.btnLogin.disabled = false;
                }, 2000);
            }

            else {
                $('#message').html('Successfully logged in!');
                $('#message').addClass('alert alert-success');
                window.location = "/radius";
            }
        }
    });
    

    return false;
}