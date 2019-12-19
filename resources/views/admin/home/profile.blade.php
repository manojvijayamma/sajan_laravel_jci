
<form  id="form_save"  >
   {{ csrf_field() }}
   @if ($content->id > 0)
       <input name="_method" type="hidden" value="PUT">
   @endif 
    <div class="modal-header">
        <button type="button" class="close" onclick="closePopup()">×</button>
        <h4 class="modal-title"><i class="fa fa-table" style="font-size:20px;"></i>&nbsp;Profile</h4>
    </div>
    <div class="modal-body">
                

                
                <div class="form-group row">
                    <div class="col-sm-12">
                        <label for="inputFirstname">Name</label>
                        <input type="text" name="name" class="form-control" id="firstname" placeholder="Name" value="{{$content->name}}">
                    </div>
                </div>
                <div class="form-group row">    
                    <div class="col-sm-12">
                        <label for="inputLastname">Email</label>
                        <input type="text" name="email" class="form-control" id="lastname" placeholder="Email" value="{{$content->email}}">
                    </div>
                </div>
       
    </div>

    <div class="modal-footer">
                <button type="button" class="btn btn-success"  id="btn_save" data-href="{{ url('admin/'.app('request')->input('controller').'/profile') }}" data-pkey="{{$content->id}}" data-reload="false"> <i class="fa fa-save"></i> Save</button>
                <button type="reset" class="btn btn-danger" onclick="closePopup()"><i class="fa fa-close"></i> Cancel</button>
    </div>

</form>



<script>
function validateForm(){
   var Firstname=$("#firstname").val();
   var Lastname=$("#lastname").val();
   var Email=$("#email").val();
   var Password=$("#password").val();
   var Address=$("#address").val();
   var Description=$("#description").val();
   var Phone=$("#phone").val();
   var Allowedips=$("#allowedips").val();

    if(Firstname==""){
        errorMessage("Please Enter Firstname");
        $("#firstname").focus();
        return false;
    }

    if(Lastname==""){
        errorMessage("Please Enter Lastname");
        $("#lastname").focus();
        return false;
    }

    if(Email==""){
        errorMessage("Please Enter Email");
        $("#email").focus();
        return false;
    }

    if(Password==""){
        errorMessage("Please Enter Password");
        $("#password").focus();
        return false;
    }

    if(Address==""){
    
        errorMessage("Please Enter Address");
        $("#address").focus();
        return false;
    }

     if(Description==""){
        errorMessage("Please Enter Description");
        $("#description").focus();
        return false;
    }

    if(Phone==""){
        errorMessage("Please Enter Phone");
        $("#phone").focus();
        return false;
    }

    if(Allowedips==""){
        errorMessage("Please Enter Allowedips");
        $("#allowedips").focus();
        return false;
    }
    return true;
}
</script>

     




