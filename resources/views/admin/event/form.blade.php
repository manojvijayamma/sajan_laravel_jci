<style>
body {
    overflow:auto;
}
</style>


<form  id="form_save"  enctype="multipart/form-data">
<input name="identifier" type="hidden" value="{{app('request')->input('identifier')}}">
{{ csrf_field() }}
@if ($content->id > 0)
    <input name="_method" type="hidden" value="PUT">
@endif 

<div class="row" id="page-header" >
        <div class="col-lg-12" style="padding:0px;">
            <h2 class="page-header" style="padding:0px;margin:39px 0px 8px 30px;border:0px;font-size:22px;color:#0a3984"><i class="fa fa-table" style="font-size:20px;"></i>&nbsp;Events
                <div style="float:right">
                 </div>
            </h2>
            
        </div>
        <!-- /.col-lg-12 -->
</div>


 <div class="modal-body">
             <div id="success_message">
                 
             </div>          

             <div class="form-group">
             <label for="name">
                 Title:</label>
                 <input class="form-control" type="text"  name="title" id="title"  value="{{$content->title}}"  required autofocus>

            </div>  
            
            <div class="form-group">
                <label for="name">
                    Location:</label>
                    <input class="form-control" type="text"  name="location" id="location"  value="{{$content->location}}"  required autofocus>

            </div>  

            <div class="form-group">
                <label for="name">
                    Date:</label>
                    <input class="form-control datepicker" type="text"  name="event_date" id="event_date"  value="{{$content->event_date>'1970-01-01' ? date('d-m-Y',strtotime($content->event_date)): ''}}"  required autofocus>

            </div> 


            <div class="form-group">
                <label for="name">
                    Time:</label>
                    <input class="form-control" type="text"  name="time" id="time"  value="{{$content->time}}"  required autofocus>

            </div>            

             <div class="form-group" id="panel_I" style="display:{{($content->type!='V' )  ? '' :'none'}}">
                <label for="inputLastname">  Image</label>
                <input type="file" name="image"  id="image" placeholder="">
                <?php if($content->image){?>
                    <img src="{{asset('uploads/event/'.$content->image)}}" style="width:70px;">
                <?php } ?>   

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


            <div class="form-group">
                 <label for="name">
                     Show in home page:</label>
                     <input class="form-control" type="checkbox"  name="featured" id="featured"  value="1"  <?php echo ($content->featured==1 ? 'checked' : '' )?> style="width:40px;">

             </div> 


             <div class="form-group">
                 <label for="name">
                     Short Description (for listing page):</label>
                     <textarea class="form-control" type="text"  name="short_description" id="short_description"   >{{$content->short_description}}</textarea>

             </div>  



               <div class="form-group" id="panel_C" >
                <label for="inputFirstname">Details</label>
                <textarea name="details1" class="summernote">{{$content->details}}</textarea>
                <textarea id="details" name="details" style="display:none;" >{{$content->details}}</textarea>
             </div>          



            
             

  

                 
 
    
 </div>

 <div class="modal-footer">
             <button type="button" class="btn btn-success"  id="btn_save" data-href="{{ url('admin/'.app('request')->input('controller').'/'.$content->id) }}" data-pkey="{{$content->id}}" data-reload="true" data-popup="0"><i class="fa fa-save"></i> Save</button>
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


<script type="text/javascript">
            // When the document is ready
            $(document).ready(function () {
                
                $('.datepicker').datepicker({
                    format: "dd-mm-yyyy"
                });  
            
            });
        </script>   



             




