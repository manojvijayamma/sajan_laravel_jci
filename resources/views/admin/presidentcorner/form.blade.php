
<style>
body {
    overflow:auto;
}
</style>
<div class="row" id="page-header" >
        <div class="col-lg-12" style="padding:0px;">
            <h2 class="page-header" style="padding:0px;margin:39px 0px 8px 30px;border:0px;font-size:22px;color:#0a3984"><i class="fa fa-table" style="font-size:20px;"></i>&nbsp;President Corner
                <div style="float:right">
                 </div>
            </h2>
            
        </div>
        <!-- /.col-lg-12 -->
</div>


<form  id="form_save"  enctype="multipart/form-data">
<input name="identifier" type="hidden" value="{{app('request')->input('identifier')}}">
{{ csrf_field() }}
@if ($content->id > 0)
    <input name="_method" type="hidden" value="PUT">
@endif 

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
                 Sub Title:</label>
                 <input class="form-control" type="text"  name="sub_title" id="sub_title"  value="{{$content->sub_title}}"  required autofocus>

         </div>    


             <div class="form-group" id="panel_I" >
                <label for="inputLastname">  Photo</label>
                <input type="file" name="image"  id="image" placeholder="">
                <?php if($content->image){?>
                    <img src="{{asset('uploads/president/'.$content->image)}}" style="width:70px;">
                <?php } ?>   

             </div>


             <div class="form-group" id="panel_I" >
                <label for="inputLastname">  Logo</label>
                <input type="file" name="logo"  id="image" placeholder="">
                <?php if($content->image){?>
                    <img src="{{asset('uploads/president/'.$content->logo)}}" style="width:70px;">
                <?php } ?>   

             </div>



             <div class="form-group" >
                <label for="inputFirstname">Short Description (For showing in home page )</label>    <br>            
                <textarea id="short_description" name="short_description"  class="form-control">{{$content->short_description}}</textarea>
             </div> 


             <div class="form-group" >
                <label for="inputFirstname">Details</label>
                <textarea name="details1" class="summernote">{{$content->details}}</textarea>
                <textarea id="details" name="details" style="display:none;" >{{$content->details}}</textarea>
             </div> 


             <div class="form-group" >
                <label for="inputFirstname">Message</label>
                <textarea name="message1" class="summernote">{{$content->message}}</textarea>
                <textarea id="message" name="message" style="display:none;" >{{$content->message}}</textarea>
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
    $('#message').val($('.summernote').summernote('code'));

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



             




