
<form  id="form_save"  >
   {{ csrf_field() }}
   <input name="_method" type="hidden" value="PUT">
    <div class="modal-header">
        <button type="button" class="close" onclick="closePopup()">×</button>
        <h4 class="modal-title"><i class="fa fa-table" style="font-size:20px;"></i>&nbsp;Change Password</h4>
    </div>
    <div class="modal-body">
                

                
                <div class="form-group row">
                    <div class="col-sm-12">
                        <label for="inputFirstname">Current Password</label>
                        <input type="password" name="current_password" class="form-control" id="current_password" placeholder="Current Password">
                    </div>
                </div>
                <div class="form-group row">    
                    <div class="col-sm-12">
                        <label for="inputLastname">New Password</label>
                        <input type="password" name="new_password" class="form-control" id="new_password" placeholder="New Password">
                    </div>
                </div>
                <div class="form-group row">    
                    <div class="col-sm-12">
                        <label for="inputLastname">Confirm Password</label>
                        <input type="password" name="confirm_password" class="form-control" id="confirm_password" placeholder="Confirm Password">
                    </div>
                </div>
       
    </div>

    <div class="modal-footer">
                <button type="button" class="btn btn-success"  id="btn_save" data-href="{{ url('admin/'.app('request')->input('controller').'/password') }}" data-pkey="" data-reload="false"><i class="fa fa-save"></i> Save</button>
                <button type="reset" class="btn btn-danger" onclick="closePopup()"><i class="fa fa-close"></i> Cancel</button>
    </div>

</form>



<script>
function validateForm(){
   var current_password=$("#current_password").val();
   var new_password=$("#new_password").val();
   var confirm_password=$("#confirm_password").val();


    if(current_password==""){
        errorMessage("Please enter current password");
        $("#current_password").focus();
        return false;
    }

    if(new_password==""){
        errorMessage("Please enter new password");
        $("#new_password").focus();
        return false;
    }

    if(confirm_password==""){
        errorMessage("Please enter confirm password");
        $("#confirm_password").focus();
        return false;
    }

    if(new_password!=confirm_password){
        errorMessage("New password and confirm password should be matched");
        $("#confirm_password").focus();
        return false;
    }

    
    return true;
}
</script>

     




