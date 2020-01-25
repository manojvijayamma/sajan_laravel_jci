

 $('.register_btn').on('click', function(e) {
    var register_name=$('#register_name').val();
    var register_email=$('#register_email').val();
    var register_password=$('#register_password').val();
    var register_cmpassword=$('#register_cmpassword').val();

    if(register_name==""){
        alert("Please enter name");
        return false;
    }

    if(register_email==""){
        alert("Please enter email");
        return false;
    }

    if(register_password==""){
        alert("Please enter password");
        return false;
    }

    if(register_cmpassword==""){
        alert("Please enter confirm password");
        return false;
    }


    if(register_password != register_cmpassword) {
        alert("Password and Confirm Password don't match");
        return false;
    }
    

    $('#frm_register').submit();
});

