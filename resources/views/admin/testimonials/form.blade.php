
<form  id="form_save"  enctype="multipart/form-data">
{{ csrf_field() }}
@if ($content->id > 0)
    <input name="_method" type="hidden" value="PUT">
@endif 
 <div class="modal-header">
     <button type="button" class="close" onclick="closePopup('true')">×</button>
     <h4 class="modal-title"><i class="fa fa-table" style="font-size:20px;"></i>&nbsp;Testimonial</h4>
 </div>
 <div class="modal-body">
             <div id="success_message">
                 
             </div>          

             <div class="form-group">
                 <label for="name">
                     Name:</label>
                     <input class="form-control" type="text"  name="title" id="title"  value="{{$content->title}}"  required autofocus>

             </div>             

    



         
             <div class="form-group">
                <label for="inputLastname"> Image</label>
                <input type="file" name="image"  id="image" placeholder="">
                <?php if($content->image){?>
                    <img src="{{asset('uploads/testimonials/'.$content->image)}}" style="width:70px;">
                <?php } ?>   

             </div>           

       
            
             <div class="form-group" >
                <label for="inputFirstname">Details</label>
                <textarea name="details1" class="summernote">{{$content->details}}</textarea>
                <textarea id="details" name="details" style="display:none;" >{{$content->details}}</textarea>
             </div> 

  

                 
 
    
 </div>

 <div class="modal-footer">
             <button type="button" class="btn btn-success"  id="btn_save" data-href="{{ url('admin/'.app('request')->input('controller').'/'.$content->id) }}" data-pkey="{{$content->id}}" data-reload="true" data-popup="1"><i class="fa fa-save"></i> Save</button>
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



             




