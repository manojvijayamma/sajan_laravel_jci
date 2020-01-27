
<form  id="form_save"  enctype="multipart/form-data" method="POST">
   {{ csrf_field() }}
  
    <div class="modal-header">
        <button type="button" class="close" onclick="closePopup()">×</button>
        <h4 class="modal-title"><i class="fa fa-table" style="font-size:20px;"></i>&nbsp;Import Products</h4>
    </div>
    <div class="modal-body">
                

                
                <div class="form-group row">
                    <div class="col-sm-12">
                        <label for="inputFirstname">Browse a excel file</label>
                        <input type="file"  name="file" id="file" value="" placeholder="File">
                    </div>                 


                </div> 
    
       
    </div>

    <div class="modal-footer">
                <button type="button" class="btn btn-success"  id="btn_save" data-href="{{ url('admin/'.app('request')->input('controller').'/import') }}"  data-reload="false"><i class="fa fa-save"></i> Import</button>
                <button type="reset" class="btn btn-danger" onclick="closePopup()"> <i class="fa fa-close"></i> Cancel</button>
    </div>

</form>



<script>
function validateForm(){
   var file=$("#file").val();
   
   


    if(file==""){
        errorMessage("Please select a file");
        $("#file").focus();
        return false;
    }

    

    return true;
}
</script>


                




