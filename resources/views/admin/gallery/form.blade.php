
<form  id="form_save"  enctype="multipart/form-data">
<input name="identifier" type="hidden" value="{{app('request')->input('identifier')}}">
{{ csrf_field() }}
@if ($content->id > 0)
    <input name="_method" type="hidden" value="PUT">
@endif 
 <div class="modal-header">
     <button type="button" class="close" onclick="closePopup('true')">×</button>
     <h4 class="modal-title"><i class="fa fa-table" style="font-size:20px;"></i>&nbsp;Gallery</h4>
 </div>
 <div class="modal-body">
             <div id="success_message">
                 
             </div>          

             <div class="form-group">
                 <label for="name">
                     Title:</label>
                     
                     <input type="text" class="form-control"  name="title" id="title"  value="{{$content->title}}" required autofocus />

             </div>


             <div class="form-group" id="panel_category" style="display:{{($content->parent_id==0 )  ? '' :''}}">
                <label for="inputLastname">Category</label>
                    <select class="form-control" id="parent_id" name="parent_id" required > 
                    <option value="0">Category</option>
                    @foreach ($category as $cat)  

                        <option value="{{$cat->id}}" {{ ( $content->parent_id == $cat->id ) ? ' selected' : '' }}>
                            {{$cat->title}}
                        </option>
                        <?php foreach($cat->childLevel1 as $sub){
                            if(isset($sub)){?>
                                    <option value="{{$sub->id}}" {{ ( $content->parent_id == $sub->id ) ? ' selected' : '' }}>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$sub->title}}
                                    </option>
                                <?php }  ?>

                                <?php foreach($sub->childLevel2 as $sub2){?>
                                    <option value="{{$sub2->id}}" {{ ( $content->parent_id == $sub2->id ) ? ' selected' : '' }}>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$sub2->title}}
                                    </option>
                                <?php } 
                        } ?>



                        
                    @endforeach
                 </select>
             </div> 

             <div class="form-group" id="panel_I" style="display:{{($content->identifier!='video' )  ? '' :'none'}}">
                <label for="inputLastname"> Icon Image</label>
                <input type="file" name="image"  id="image" placeholder="">
                <?php if($content->image){?>
                    <img src="{{asset('uploads/gallery/'.$content->image)}}" style="width:70px;">
                <?php } ?>   

             </div>


             <div class="form-group" id="panel_I" style="display:{{($content->identifier!='video' )  ? '' :'none'}}">
                <label for="inputLastname"> Large Image</label>
                <input type="file" name="large_image"  id="large_image" placeholder="">
                <?php if($content->image){?>
                    <img src="{{asset('uploads/gallery/'.$content->large_image)}}" style="width:70px;">
                <?php } ?>   

             </div>



             <div class="form-group" style="display:{{($content->identifier=='video' )  ? '' :'none'}}">
                 <label for="name">
                     Video Url:</label>
                     
                     <textarea class="form-control"  name="video_url" id="video_url"   required autofocus>{{$content->video_url}}</textarea>  

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



             




