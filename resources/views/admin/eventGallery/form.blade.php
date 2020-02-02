
<form  id="form_save"  enctype="multipart/form-data">
{{ csrf_field() }}
@if ($content->id > 0)
    <input name="_method" type="hidden" value="PUT">
@endif 
 <div class="modal-header">
     <button type="button" class="close" onclick="closePopup('true')">×</button>
     <h4 class="modal-title"><i class="fa fa-table" style="font-size:20px;"></i>&nbsp;Images</h4>
 </div>
 <div class="modal-body">
             <div id="success_message">
                 
             </div>

          

             <div class="form-group">
                 <label for="name">
                     Title:</label>
                     
                     <textarea class="form-control"  name="title" id="title"   required autofocus>{{$content->title}}</textarea>  

             </div>
<!--
             <div class="form-group">
             <label for="inputLastname">Type</label>    
                <label class="radio-inline"><input type="radio" name="type" value="I"  onclick="updatePanel('I')"  {{($content->type!='V' ? 'checked' : '') }} >Image</label>
                <label class="radio-inline"><input type="radio" name="type" value="V"  onclick="updatePanel('V')"   {{($content->type=='V' ? 'checked' : '') }} >Video</label>
                
             </div>-->

             <div class="form-group" id="panel_I" style="display:{{($content->type!='V' )  ? '' :'none'}}">
                <label for="inputLastname"> Image</label>
                <input type="file" name="image"  id="image" placeholder="">
                <?php if($content->image){?>
                    <img src="{{asset('uploads/eventgallery/'.$content->image)}}" style="width:70px;">
                <?php } ?>   

             </div>

             <div class="form-group" id="panel_V" style="display:{{($content->type=='V' )  ? '' :'none'}}">
                <label for="name">
                Video Link:</label>
                <textarea class="form-control"  name="video" id="video"   required autofocus>{{$content->video}}</textarea>  

             </div>
         
               
 
    
 </div>

 <div class="modal-footer">
             <button type="button" class="btn btn-success"  id="btn_save" data-href="{{ url('admin/'.app('request')->input('controller').'/'.$content->id) }}" data-pkey="{{$content->id}}" data-reload="true"><i class="fa fa-save"></i> Save</button>
             <button type="reset" class="btn btn-danger" onclick="closePopup('true')" ><i class="fa fa-close"></i> Cancel</button>
 </div>
 <input name="parent_id" type="hidden" value="<?php echo app('request')->input('row_id')?>">

</form>



<script type="text/javascript">
function validateForm(){
    var title=$("#title").val();   
    
    

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
        case 'I':           
            $('#panel_V').hide();
            $('#panel_I').show();
        break;
        case 'V':
           
            $('#panel_I').hide();
            $('#panel_V').show();
        break;       
    }
}

</script>    



             




