

 $('.login_btn').on('click', function(e) {
    var login_email=$('#login_email').val();
    var login_password=$('#login_password').val();

    if(login_email==""){
        alert("Please enter email");
        return false;
    }

    if(login_password==""){
        alert("Please enter password");
        return false;
    }


    $('#frm_login').submit();
});

