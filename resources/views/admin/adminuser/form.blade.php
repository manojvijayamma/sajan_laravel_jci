
<form  id="form_save"  enctype="multipart/form-data">

{{ csrf_field() }}
@if ($content->id > 0)
    <input name="_method" type="hidden" value="PUT">
@endif 
 <div class="modal-header">
     <button type="button" class="close" onclick="closePopup('true')">×</button>
     <h4 class="modal-title"><i class="fa fa-table" style="font-size:20px;"></i>&nbsp;Users</h4>
 </div>
 <div class="modal-body">
             <div id="success_message">
                 
             </div>          

             <div class="form-group">
             <label for="name">
                 Name:</label>
                 <input class="form-control" type="text"  name="name" id="name"  value="{{$content->name}}"  required autofocus>

         </div>   
         
         <div class="form-group">
             <label for="name">
                 Email:</label>
                 <input class="form-control" type="text"  name="email" id="email"  value="{{$content->email}}"  required autofocus>

         </div>   


         <div class="form-group">
             <label for="name">
                 Password:</label>
                 <input class="form-control" type="password"  name="password" id="password"  value=""  required autofocus>

         </div>   



             <div class="form-group" id="panel_I" style="display:{{($content->type!='V' )  ? '' :'none'}}">
                <label for="inputLastname">  Image</label>
                <input type="file" name="image"  id="image" placeholder="">
                <?php if($content->image){?>
                    <img src="uploads/adminuser/{{$content->image}}" style="width:70px;">
                <?php } ?>   

             </div>



             


             <div class="form-group" id="panel_show" >
                <label for="inputLastname">User Permission</label>
                    <select class="form-control" id="user_group_id" name="user_group_id" required  > 
                    <option value="">Select</option>
                    @foreach ($usergroups as $cat)                        
                        <option value="{{$cat->id}}" {{ ( $cat->id==$content->user_group_id ) ? ' selected' : '' }} data-level="{{$cat->level}}">
                            {{$cat->title}}
                        </option>
                    @endforeach
                 </select>
             </div> 



             <div class="form-group" id="panel_show" >
                <label for="inputLastname">Zone</label>
                    <select class="form-control" id="zone_id" name="zone_id" required  > 
                    <option value="">Select</option>
                    @foreach ($zones as $cat)                        
                        <option value="{{$cat->id}}" {{ ( $cat->id==$content->zone_id ) ? ' selected' : '' }}>
                            {{$cat->title}}
                        </option>
                    @endforeach
                 </select>
             </div> 

            



            
             

  

                 
 
    
 </div>

 <div class="modal-footer">
             <button type="button" class="btn btn-success"  id="btn_save" data-href="{{ url('admin/'.app('request')->input('controller').'/'.$content->id) }}" data-pkey="{{$content->id}}" data-reload="true"><i class="fa fa-save"></i> Save</button>
             <button type="reset" class="btn btn-danger" onclick="closePopup('true')" ><i class="fa fa-close"></i> Cancel</button>
 </div>

</form>



<script type="text/javascript">
function validateForm(){
    var title=$("#title").val(); 
  
    
    //convert to code
    $('#details').val($('.summernote').summernote('code'));

    if(title==""){
        errorMessage("Please Enter title");
        $("#title").focus();
        return false;
    }
     
    
 return true;
}


</script>
<script>
$(document).ready(function() {
    $('.summernote').summernote({disableResizeEditor: true,height: 250,});
});

function updatePanel(id){
    switch(id){
        case '0':           
            $('#panel_sku').show();
            $('#panel_category').show();
            $('#panel_brand').show();
        break;
        default:
            $('#panel_sku').hide();
            $('#panel_category').hide();
            $('#panel_brand').hide();
        break;       
    }
}

</script>    



             




